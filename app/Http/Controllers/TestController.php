<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\RegularCategoryTest;
use App\Models\RegularQuestion;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function categories()
    {
        $language = request()->header('Accept-Language');

        if (!$language) {
            $language = 'ru';
        }
        if ($language == 'ru-RU,ru;q=0.9,en-US;q=0.8,en;q=0.7') {
            $language = 'ru';
        }

        $regularCategoryTests = RegularCategoryTest::query()
                                                   ->where('language', $language)
                                                   ->select('id', 'title')
                                                   ->get()
        ;

        return response()->json([
                                    'main_items'    => $regularCategoryTests,
                                    'profile_items' => [],
                                ]);
    }

    public function tests(int $id): JsonResponse
    {
        $questions = RegularQuestion::query()
                                    ->where('test_id', $id)
                                    ->select('id', 'question')
                                    ->get()
        ;
        foreach ($questions as $question) {
            $question->type    = 'common';
            $question->answers = Answer::query()
                                       ->where('question_id', $question->id)
                                       ->select('id', 'answer')
                                       ->get()
            ;
        }

        return response()->json($questions);
    }

    public function results(Request $request)
    {
        $data    = json_decode($request->getContent(), true);
        $answers = $data['answers'];
        $result  = [];
        $total_right = 0;
        foreach ($answers as $answer) {
            $question    = RegularQuestion::query()
                                          ->select('id', 'question')
                                          ->find($answer['question'])
            ;
            $your_answer = Answer::query()
                                 ->where('id', $answer['answer'])
                                 ->select('id', 'answer')
                                 ->first()
            ;

            $correct_answer = Answer::query()
                                    ->where('question_id', $answer['question'])
                                    ->where('is_correct', 1)
                                    ->select('id', 'answer')
                                    ->first()
            ;
            if ($your_answer->id == $correct_answer->id) {
                $total_right++;
            }
            $result[]       = [
                'question'       => $question,
                'correct_answer' => $correct_answer,
                'your_answer'    => $your_answer,
                'right'          => $your_answer->id == $correct_answer->id,
            ];
        }

        return response()->json([
            'total_right' => $total_right,
            'result' => $result
                                ]);
    }
}
