<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Answer;
use App\Models\Client;
use App\Models\RegularCategoryTest;
use App\Models\RegularQuestion;
use App\Models\TestClient;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function user(UserRequest $request)
    {
        $data   = $request->validated();
        $client = Client::query()
                        ->create($data)
        ;

        return response()->json([
                                    'user_id' => $client->id,
                                ], 200);
    }

    public function categories()
    {
        $language = request()->input('language');

        if (!$language) {
            $language = 'ru';
        }

        $regularCategoryTests = RegularCategoryTest::query()
                                                   ->where('language', $language)
                                                   ->select('id', 'title')
                                                   ->get()
        ;


        return response()->json(
            $regularCategoryTests,
        );
    }

    public function tests(Request $request): JsonResponse
    {
        $quizzes = $request->quizzes;

        $quizzes = explode(',', $quizzes);

        $tests = RegularCategoryTest::query()
                                    ->whereIn('id', $quizzes)
                                    ->select('id', 'title')
                                    ->get()
        ;

        foreach ($tests as $test) {
            $questions = RegularQuestion::query()
                                        ->where('test_id', $test->id)
                                        ->select('id', 'question', 'type')
                                        ->get()
            ;

            foreach ($questions as $question) {
                $question->answers = Answer::query()
                                           ->where('question_id', $question->id)
                                           ->select('id', 'answer')
                                           ->get()
                ;
            }
            $test->questions = $questions;
        }

        return response()->json($tests);
    }

    public function results(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $examination = [];
        $result      = [];
        $tests       = $data['tests'];
        $total_right = 0;

        foreach ($tests as $test) {

            $answers = $test['answers'];
            foreach ($answers as $answer) {
                $question = RegularQuestion::query()
                                           ->select('id', 'question', 'type')
                                           ->find($answer['question'])
                ;

                if ($question->type == "common") {
                    $your_answer = Answer::query()
                                         ->where('id', $answer['answer'])
                                         ->select('id', 'answer')
                                         ->first()
                    ;

                    $correct_answer = Answer::query()
                                            ->where('question_id', $answer['question'])
                                            ->where('is_correct', true)
                                            ->select('id', 'answer')
                                            ->first()
                    ;
                    if ($your_answer != null) {
                        if ($your_answer->id == $correct_answer->id) {
                            $total_right++;
                        }
                        $examination[] = [
                            'question'       => $question,
                            'correct_answer' => $correct_answer,
                            'your_answer'    => $your_answer,
                            'right'          => $your_answer->id == $correct_answer->id,
                        ];
                    }
                } else {
                    $your_answers = Answer::query()
                                          ->whereIn('id', $answer['answer'])
                                          ->select('id', 'answer')
                                          ->get()
                    ;

                    $correct_answer = Answer::query()
                                            ->where('question_id', $answer['question'])
                                            ->where('is_correct', 1)
                                            ->select('id', 'answer')
                                            ->get()
                    ;
                    $sum            = 0;

                    foreach ($correct_answer as $item) {
                        foreach ($your_answers as $your_answer) {
                            if ($your_answer->id == $item->id) {
                                $sum++;
                            }
                            if ($your_answer->id != $item->id) {
                                $sum--;
                            }
                        }
                    }
                    if ($sum < 0) {
                        $sum = 0;
                    }
                    $examination[] = [
                        'question'       => $question,
                        'correct_answer' => $correct_answer,
                        'your_answer'    => $your_answers,
                        'right'          => $sum,
                    ];
                    $total_right   += $sum;
                }
            }
            TestClient::query()
                      ->create([
                                   'user_id' => $data['user_id'],
                                   'test_id' => $test['test_id'],
                                   'result'  => $total_right,
                               ])
            ;
            $result[]    = [
                'test_id'     => $test['test_id'],
                'result'      => $total_right,
                'examination' => $examination,
            ];
            $total_right = 0;
            $examination = [];
        }


        return response()->json([
                                    'data' => $result,
                                ]);
    }
}
