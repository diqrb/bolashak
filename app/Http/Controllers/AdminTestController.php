<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\RegularCategoryTest;
use App\Models\RegularQuestion;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class AdminTestController extends Controller
{
    public function create(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $test = $data['test'];

        try {
            DB::beginTransaction();
            $category = RegularCategoryTest::query()
                                           ->create([
                                                        'title'    => $data['title'],
                                                        'language' => $data['language'],
                                                    ])
            ;

            foreach ($test as $item) {
                $type     = $item['common'] ? 'common' : 'multiple_choice';
                $question = RegularQuestion::query()
                                           ->create([
                                                        'test_id'  => $category->id,
                                                        'question' => $item['question'],
                                                        'type'     => $type,
                                                    ])
                ;
                foreach ($item['answers'] as $answer) {
                    Answer::query()
                          ->create([
                                       'question_id' => $question->id,
                                       'answer'      => $answer['title'],
                                       'is_correct'  => $answer['right'],
                                   ])
                    ;
                }
            }
            DB::commit();

            return response()->json([
                                        'status'  => true,
                                        'message' => 'Тест успешно создан',
                                    ],
                                    Response::HTTP_OK
            );
        } catch (\Exception $exception) {
            DB::rollBack();

            return response()->json([
                                        'status'  => false,
                                        'message' => 'Что то не так',
                                    ],
                                    Response::HTTP_BAD_REQUEST
            );
        }
    }

    public function update($id, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $test = $data['test'] ?? null;
        try {
            DB::beginTransaction();
            RegularCategoryTest::query()
                               ->where('id', $id)
                               ->update([
                                            'title'    => $data['title'],
                                            'language' => $data['language'],
                                        ])
            ;
            if ($test != null) {
                foreach ($test as $item) {
                    $type = $item['common'] ? 'common' : 'multiple_choice';
                    RegularQuestion::query()
                                   ->where('id', $item['id'])
                                   ->update([
                                                'test_id'  => $id,
                                                'question' => $item['question'],
                                                'type'     => $type,
                                            ])
                    ;
                    if (isset($item['answers'])) {
                        foreach ($item['answers'] as $answer) {
                            Answer::query()
                                  ->where('id', $answer['id'])
                                  ->update([
                                               'answer'     => $answer['title'],
                                               'is_correct' => $answer['right'],
                                           ])
                            ;
                        }
                    }
                }
            }
            DB::commit();

            return response()->json([
                                        'status'  => true,
                                        'message' => 'Тест успешно обновлен',
                                    ],
                                    Response::HTTP_OK
            );
        } catch (\Exception $exception) {
            DB::rollBack();

            return response()->json([
                                        'status'  => false,
                                        'message' => 'Что то не так',
                                    ],
                                    Response::HTTP_BAD_REQUEST
            );
        }
    }
}
