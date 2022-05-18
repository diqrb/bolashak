@extends('voyager::master')
@section('content')
    <h1 class="main_title"> Создание теста</h1>
    <div class="main_block">
        @if(isset($category))
            <form role="form"
                  class="form-edit-add"
                  method="POST"
                  enctype="multipart/form-data"
                  action="{{  env('APP_URL')  . '/admin/main-subjects/' . $category->id}}">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="category_id" value="{{$category->id}}">
                <input type="hidden" name="main" value="{{$mainSubject['id']}}">
                @else
                    <form role="form"
                          class="form-edit-add"
                          method="POST"
                          enctype="multipart/form-data"
                          action="{{env('APP_URL') . '/admin/main-subjects'}}">
                        @endif
                        @csrf

                        <h4>Название</h4>
                        <input type="text" class="form-control" name="title"
                               placeholder="Название"
                               required
                               value="{{(isset($category) ? $category->title : 'Название')}}">

                        <h4>Язык</h4>
                        <input type="text" class="form-control" name="language"
                               placeholder="Язык"
                               required
                               value="{{(isset($category->language) ? $category->language : 'ru/kz')}}">

                        {{--        Первый вопрос--}}
                        <h4>1. Вопрос</h4>
                        <input type="text" class="form-control" name="array[0][question]"
                               placeholder="Вопрос"
                               required
                               value="{{(isset($category) ? $questions[0]->question : 'Вопрос 1')}}">

                        <div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[0][0][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[0]->answers[0]->answer : 'Ответ 1.1')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[0][0][]" class="answer_block_input"
                                       @if(isset($category) && $questions[0]->answers[0]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[0][1][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[0]->answers[1]->answer : 'Ответ 1.2')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[0][1][]" class="answer_block_input"
                                       @if(isset($category) && $questions[0]->answers[1]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[0][2][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[0]->answers[2]->answer : 'Ответ 1.3')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[0][2][]" class="answer_block_input"
                                       @if(isset($category) && $questions[0]->answers[2]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[0][3][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[0]->answers[3]->answer : 'Ответ 1.4')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[0][3][]" class="answer_block_input"
                                       @if(isset($category) && $questions[0]->answers[3]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[0][4][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[0]->answers[4]->answer : 'Ответ 1.5')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[0][4][]" class="answer_block_input"
                                       @if(isset($category) && $questions[0]->answers[4]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                        </div>
                        {{--        Конец первый вопрос--}}

                        {{--Второй вопрос--}}
                        <h4>2. Вопрос</h4>
                        <input type="text" class="form-control" name="array[1][question]"
                               placeholder="Вопрос"
                               required
                               value="{{(isset($category) ? $questions[1]->question : 'Ответ 2')}}">

                        <div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[1][0][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[1]->answers[0]->answer : 'Ответ 2.1')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[1][0][]" class="answer_block_input"
                                       @if(isset($category) && $questions[1]->answers[0]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[1][1][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[1]->answers[1]->answer : 'Ответ 2.2')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[1][1][]" class="answer_block_input"
                                       @if(isset($category) && $questions[1]->answers[1]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[1][2][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[1]->answers[2]->answer : 'Ответ 2.3')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[1][2][]" class="answer_block_input"
                                       @if(isset($category) && $questions[1]->answers[2]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[1][3][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[1]->answers[3]->answer : 'Ответ 2.4')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[1][3][]" class="answer_block_input"
                                       @if(isset($category) && $questions[1]->answers[3]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[1][4][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[1]->answers[4]->answer : 'Ответ 2.5')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[1][4][]" class="answer_block_input"
                                       @if(isset($category) && $questions[1]->answers[4]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>

                        </div>
                        {{--Конец второго вопроса--}}

                        {{--Три вопрос--}}
                        <h4>3. Вопрос</h4>
                        <input type="text" class="form-control" name="array[2][question]"
                               placeholder="Вопрос"
                               required
                               value="{{(isset($category) ? $questions[2]->question : 'Ответ 3')}}">

                        <div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[2][0][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[2]->answers[0]->answer : 'Ответ 3.1')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[2][0][]" class="answer_block_input"
                                       @if(isset($category) && $questions[2]->answers[0]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[2][1][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[2]->answers[1]->answer : 'Ответ 3.2')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[2][1][]" class="answer_block_input"
                                       @if(isset($category) && $questions[2]->answers[1]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[2][2][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[2]->answers[2]->answer : 'Ответ 3.3')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[2][2][]" class="answer_block_input"
                                       @if(isset($category) && $questions[2]->answers[2]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[2][3][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[2]->answers[3]->answer : 'Ответ 3.4')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[2][3][]" class="answer_block_input"
                                       @if(isset($category) && $questions[2]->answers[3]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[2][4][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[2]->answers[4]->answer : 'Ответ 3.5')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[2][4][]" class="answer_block_input"
                                       @if(isset($category) && $questions[2]->answers[4]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>

                        </div>
                        {{--Три конец вопрос--}}

                        {{--4 вопрос--}}
                        <h4>4. Вопрос</h4>
                        <input type="text" class="form-control" name="array[3][question]"
                               placeholder="Вопрос"
                               required
                               value="{{(isset($category) ? $questions[3]->question : 'Ответ 4')}}">

                        <div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[3][0][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[3]->answers[0]->answer : 'Ответ 4.1')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[3][0][]" class="answer_block_input"
                                       @if(isset($category) && $questions[3]->answers[0]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[3][1][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[3]->answers[1]->answer : 'Ответ 4.2')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[3][1][]" class="answer_block_input"
                                       @if(isset($category) && $questions[3]->answers[1]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[3][2][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[3]->answers[2]->answer : 'Ответ 4.3')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[3][2][]" class="answer_block_input"
                                       @if(isset($category) && $questions[3]->answers[2]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[3][3][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[3]->answers[3]->answer : 'Ответ 4.4')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[3][3][]" class="answer_block_input"
                                       @if(isset($category) && $questions[3]->answers[3]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[3][4][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[3]->answers[4]->answer : 'Ответ 4.5')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[3][4][]" class="answer_block_input"
                                       @if(isset($category) && $questions[3]->answers[4]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>

                        </div>
                        {{--4 конец вопрос--}}

                        {{--5 вопрос--}}
                        <h4>5. Вопрос</h4>
                        <input type="text" class="form-control" name="array[4][question]"
                               placeholder="Вопрос"
                               required
                               value="{{(isset($category) ? $questions[4]->question : 'Вопрос 5')}}">

                        <div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[4][0][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[4]->answers[0]->answer : 'Ответ 5.1')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[4][0][]" class="answer_block_input"
                                       @if(isset($category) && $questions[4]->answers[0]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[4][1][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[4]->answers[1]->answer : 'Ответ 5.2')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[4][1][]" class="answer_block_input"
                                       @if(isset($category) && $questions[4]->answers[1]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[4][2][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[4]->answers[2]->answer : 'Ответ 5.3')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[4][2][]" class="answer_block_input"
                                       @if(isset($category) && $questions[4]->answers[2]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[4][3][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[4]->answers[3]->answer : 'Ответ 5.4')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[4][3][]" class="answer_block_input"
                                       @if(isset($category) && $questions[4]->answers[3]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[4][4][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[4]->answers[4]->answer : 'Ответ 5.5')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[4][4][]" class="answer_block_input"
                                       @if(isset($category) && $questions[4]->answers[4]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>

                        </div>
                        {{--5 конец вопрос--}}

                        {{--6 вопрос--}}
                        <h4>6. Вопрос</h4>
                        <input type="text" class="form-control" name="array[5][question]"
                               placeholder="Вопрос"
                               required
                               value="{{(isset($category) ? $questions[5]->question : 'Вопрос 6')}}">

                        <div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[5][0][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[5]->answers[0]->answer : 'Ответ 6.1')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[5][0][]" class="answer_block_input"
                                       @if(isset($category) && $questions[5]->answers[0]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[5][1][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[5]->answers[1]->answer : 'Ответ 6.2')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[5][1][]" class="answer_block_input"
                                       @if(isset($category) && $questions[5]->answers[1]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[5][2][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[5]->answers[2]->answer : 'Ответ 6.3')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[5][2][]" class="answer_block_input"
                                       @if(isset($category) && $questions[5]->answers[2]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[5][3][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[5]->answers[3]->answer : 'Ответ 6.4')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[5][3][]" class="answer_block_input"
                                       @if(isset($category) && $questions[5]->answers[3]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[5][4][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[5]->answers[4]->answer : 'Ответ 6.5')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[5][4][]" class="answer_block_input"
                                       @if(isset($category) && $questions[5]->answers[4]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>

                        </div>
                        {{--6 конец вопрос--}}

                        {{--7 вопрос--}}
                        <h4>7. Вопрос</h4>
                        <input type="text" class="form-control" name="array[6][question]"
                               placeholder="Вопрос"
                               required
                               value="{{(isset($category) ? $questions[6]->question : 'Вопрос 7.')}}">

                        <div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[6][0][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[6]->answers[0]->answer : 'Ответ 7.1')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[6][0][]" class="answer_block_input"
                                       @if(isset($category) && $questions[6]->answers[0]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[6][1][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[6]->answers[1]->answer : 'Ответ 7.2')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[6][1][]" class="answer_block_input"
                                       @if(isset($category) && $questions[6]->answers[1]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[6][2][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[6]->answers[2]->answer : 'Ответ 7.3')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[6][2][]" class="answer_block_input"
                                       @if(isset($category) && $questions[6]->answers[2]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[6][3][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[6]->answers[3]->answer : 'Ответ 7.4')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[6][3][]" class="answer_block_input"
                                       @if(isset($category) && $questions[6]->answers[3]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[6][4][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[6]->answers[4]->answer : 'Ответ 7.5')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[6][4][]" class="answer_block_input"
                                       @if(isset($category) && $questions[6]->answers[4]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>

                        </div>
                        {{--7 конец вопрос--}}

                        {{--8 вопрос--}}
                        <h4>8. Вопрос</h4>
                        <input type="text" class="form-control" name="array[7][question]"
                               placeholder="Вопрос"
                               required
                               value="{{(isset($category) ? $questions[7]->question : 'Вопрос 8.')}}">

                        <div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[7][0][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[7]->answers[0]->answer : 'Ответ 8.1')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[7][0][]" class="answer_block_input"
                                       @if(isset($category) && $questions[7]->answers[0]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[7][1][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[7]->answers[1]->answer : 'Ответ 8.2')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[7][1][]" class="answer_block_input"
                                       @if(isset($category) && $questions[7]->answers[1]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[7][2][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[7]->answers[2]->answer : 'Ответ 8.3')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[7][2][]" class="answer_block_input"
                                       @if(isset($category) && $questions[7]->answers[2]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[7][3][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[7]->answers[3]->answer : 'Ответ 8.4')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[7][3][]" class="answer_block_input"
                                       @if(isset($category) && $questions[7]->answers[3]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[7][4][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[7]->answers[4]->answer : 'Ответ 8.5')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[7][4][]" class="answer_block_input"
                                       @if(isset($category) && $questions[7]->answers[4]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>

                        </div>
                        {{--8 конец вопрос--}}

                        {{--9 вопрос--}}
                        <h4>9. Вопрос</h4>
                        <input type="text" class="form-control" name="array[8][question]"
                               placeholder="Вопрос"
                               required
                               value="{{(isset($category) ? $questions[8]->question : 'Вопрос 9.')}}">

                        <div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[8][0][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[8]->answers[0]->answer : 'Ответ 9.1')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[8][0][]" class="answer_block_input"
                                       @if(isset($category) && $questions[8]->answers[0]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[8][1][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[8]->answers[1]->answer : 'Ответ 9.2')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[8][1][]" class="answer_block_input"
                                       @if(isset($category) && $questions[8]->answers[1]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[8][2][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[8]->answers[2]->answer : 'Ответ 9.3')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[8][2][]" class="answer_block_input"
                                       @if(isset($category) && $questions[8]->answers[2]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[8][3][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[8]->answers[3]->answer : 'Ответ 9.4')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[8][3][]" class="answer_block_input"
                                       @if(isset($category) && $questions[8]->answers[3]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[8][4][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[8]->answers[4]->answer : 'Ответ 9.5')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[8][4][]" class="answer_block_input"
                                       @if(isset($category) && $questions[8]->answers[4]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                        </div>
                        {{--9 конец вопрос--}}

                        {{--10 вопрос--}}
                        <h4>10. Вопрос</h4>
                        <input type="text" class="form-control" name="array[9][question]"
                               placeholder="Вопрос"
                               required
                               value="{{(isset($category) ? $questions[9]->question : 'Вопрос 10.')}}">

                        <div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[9][0][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[9]->answers[0]->answer : 'Ответ 10.1')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[9][0][]" class="answer_block_input"
                                       @if(isset($category) && $questions[9]->answers[0]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[9][1][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[9]->answers[1]->answer : 'Ответ 10.2')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[9][1][]" class="answer_block_input"
                                       @if(isset($category) && $questions[9]->answers[1]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[9][2][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[9]->answers[2]->answer : 'Ответ 10.3')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[9][2][]" class="answer_block_input"
                                       @if(isset($category) && $questions[9]->answers[2]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[9][3][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[9]->answers[3]->answer : 'Ответ 10.4')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[9][3][]" class="answer_block_input"
                                       @if(isset($category) && $questions[9]->answers[3]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[9][4][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[9]->answers[4]->answer : 'Ответ 10.5')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[9][4][]" class="answer_block_input"
                                       @if(isset($category) && $questions[9]->answers[4]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>

                        </div>
                        {{--10 конец вопрос--}}

                        {{--11 вопрос--}}
                        <h4>11. Вопрос</h4>
                        <input type="text" class="form-control" name="array[10][question]"
                               placeholder="Вопрос"
                               required
                               value="{{(isset($category) ? $questions[10]->question : 'Вопрос 11.')}}">

                        <div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[10][0][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[10]->answers[0]->answer : 'Ответ 11.1')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[10][0][]" class="answer_block_input"
                                       @if(isset($category) && $questions[10]->answers[3]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[10][1][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[10]->answers[1]->answer : 'Ответ 11.2')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[10][1][]" class="answer_block_input"
                                       @if(isset($category) && $questions[10]->answers[1]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[10][2][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[10]->answers[2]->answer : 'Ответ 11.3')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[10][2][]" class="answer_block_input"
                                       @if(isset($category) && $questions[10]->answers[2]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[10][3][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[10]->answers[3]->answer : 'Ответ 11.4')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[10][3][]" class="answer_block_input"
                                       @if(isset($category) && $questions[10]->answers[3]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[10][4][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[10]->answers[4]->answer : 'Ответ 11.5')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[10][4][]" class="answer_block_input"
                                       @if(isset($category) && $questions[10]->answers[4]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>

                        </div>
                        {{--11 конец вопрос--}}

                        {{--12 вопрос--}}
                        <h4>12. Вопрос</h4>
                        <input type="text" class="form-control" name="array[11][question]"
                               placeholder="Вопрос"
                               required
                               value="{{(isset($category) ? $questions[11]->question : 'Вопрос 12')}}">

                        <div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[11][0][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[11]->answers[0]->answer : 'Ответ 12.1')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[11][0][]" class="answer_block_input"
                                       @if(isset($category) && $questions[11]->answers[0]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[11][1][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[11]->answers[1]->answer : 'Ответ 12.2')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[11][1][]" class="answer_block_input"
                                       @if(isset($category) && $questions[11]->answers[1]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
                <textarea class="form-control answer_block_textarea" name="array[11][2][]"
                          placeholder="Ответ"
                          required
                          rows="3">{{(isset($category) ? $questions[11]->answers[2]->answer : 'Ответ 12.3')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[11][2][]" class="answer_block_input"
                                       @if(isset($category) && $questions[11]->answers[2]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[11][3][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[11]->answers[3]->answer : 'Ответ 12.4')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[11][3][]" class="answer_block_input"
                                       @if(isset($category) && $questions[11]->answers[3]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[11][4][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[11]->answers[4]->answer : 'Ответ 12.5')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[11][4][]" class="answer_block_input"
                                       @if(isset($category) && $questions[11]->answers[4]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>

                        </div>
                        {{--12 конец вопрос--}}

                        {{--13 вопрос--}}
                        <h4>13. Вопрос</h4>
                        <input type="text" class="form-control" name="array[12][question]"
                               placeholder="Вопрос"
                               required
                               value="{{(isset($category) ? $questions[12]->question : 'Вопрос 13.')}}">

                        <div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[12][0][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[12]->answers[0]->answer : 'Ответ 13.1')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[12][0][]" class="answer_block_input"
                                       @if(isset($category) && $questions[12]->answers[0]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[12][1][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[12]->answers[1]->answer : 'Ответ 13.2')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[12][1][]" class="answer_block_input"
                                       @if(isset($category) && $questions[12]->answers[1]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
                <textarea class="form-control answer_block_textarea" name="array[12][2][]"
                          placeholder="Ответ"
                          required
                          rows="3">{{(isset($category) ? $questions[12]->answers[2]->answer : 'Ответ 13.3')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[12][2][]" class="answer_block_input"
                                       @if(isset($category) && $questions[12]->answers[2]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[12][3][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[12]->answers[3]->answer : 'Ответ 13.4')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[12][3][]" class="answer_block_input"
                                       @if(isset($category) && $questions[12]->answers[3]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[12][4][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[12]->answers[4]->answer : 'Ответ 13.5')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[12][4][]" class="answer_block_input"
                                       @if(isset($category) && $questions[12]->answers[4]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                        </div>
                        {{--13 конец вопрос--}}

                        {{--14 вопрос--}}
                        <h4>14. Вопрос</h4>
                        <input type="text" class="form-control" name="array[13][question]"
                               placeholder="Вопрос"
                               required
                               value="{{(isset($category) ? $questions[13]->question : 'Вопрос 14.')}}">

                        <div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[13][0][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[13]->answers[0]->answer : 'Ответ 14.1')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[13][0][]" class="answer_block_input"
                                       @if(isset($category) && $questions[13]->answers[0]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[13][1][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[13]->answers[1]->answer : 'Ответ 14.2')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[13][1][]" class="answer_block_input"
                                       @if(isset($category) && $questions[13]->answers[1]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
                <textarea class="form-control answer_block_textarea" name="array[13][2][]"
                          placeholder="Ответ"
                          required
                          rows="3">{{(isset($category) ? $questions[13]->answers[2]->answer : 'Ответ 14.3')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[13][2][]" class="answer_block_input"
                                       @if(isset($category) && $questions[13]->answers[2]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[13][3][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[13]->answers[3]->answer : 'Ответ 14.4')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[13][3][]" class="answer_block_input"
                                       @if(isset($category) && $questions[13]->answers[3]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[13][4][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[13]->answers[4]->answer : 'Ответ 14.5')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[13][4][]" class="answer_block_input"
                                       @if(isset($category) && $questions[13]->answers[4]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                        </div>
                        {{--14 конец вопрос--}}

                        {{--15 вопрос--}}
                        <h4>15. Вопрос</h4>
                        <input type="text" class="form-control" name="array[14][question]"
                               placeholder="Вопрос"
                               required
                               value="{{(isset($category) ? $questions[14]->question : 'Вопрос 15.')}}">

                        <div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[14][0][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[14]->answers[0]->answer : 'Ответ 15.1')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[14][0][]" class="answer_block_input"
                                       @if(isset($category) && $questions[14]->answers[0]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[14][1][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[14]->answers[1]->answer : 'Ответ 15.2')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[14][1][]" class="answer_block_input"
                                       @if(isset($category) && $questions[14]->answers[1]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
                <textarea class="form-control answer_block_textarea" name="array[14][2][]"
                          placeholder="Ответ"
                          required
                          rows="3">{{(isset($category) ? $questions[14]->answers[2]->answer : 'Ответ 15.3')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[14][2][]" class="answer_block_input"
                                       @if(isset($category) && $questions[14]->answers[2]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[14][3][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[14]->answers[3]->answer : 'Ответ 15.4')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[14][3][]" class="answer_block_input"
                                       @if(isset($category) && $questions[14]->answers[3]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[14][4][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[14]->answers[4]->answer : 'Ответ 15.5')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[14][4][]" class="answer_block_input"
                                       @if(isset($category) && $questions[14]->answers[4]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>

                        </div>
                        {{--15 конец вопрос--}}

                        {{--16 вопрос--}}
                        <h4>16. Вопрос</h4>
                        <input type="text" class="form-control" name="array[15][question]"
                               placeholder="Вопрос"
                               required
                               value="{{(isset($category) ? $questions[15]->question : 'Вопрос 16.')}}">

                        <div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[15][0][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[15]->answers[0]->answer : 'Ответ 16.1')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[15][0][]" class="answer_block_input"
                                       @if(isset($category) && $questions[15]->answers[0]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[15][1][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[15]->answers[1]->answer : 'Ответ 16.2')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[15][1][]" class="answer_block_input"
                                       @if(isset($category) && $questions[15]->answers[1]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
                <textarea class="form-control answer_block_textarea" name="array[15][2][]"
                          placeholder="Ответ"
                          required
                          rows="3">{{(isset($category) ? $questions[15]->answers[2]->answer : 'Ответ 16.3')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[15][2][]" class="answer_block_input"
                                       @if(isset($category) && $questions[15]->answers[2]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[15][3][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[15]->answers[3]->answer : 'Ответ 16.4')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[15][3][]" class="answer_block_input"
                                       @if(isset($category) && $questions[15]->answers[3]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[15][4][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[15]->answers[4]->answer : 'Ответ 16.5')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[15][4][]" class="answer_block_input"
                                       @if(isset($category) && $questions[15]->answers[4]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>

                        </div>
                        {{--16 конец вопрос--}}

                        {{--17 вопрос--}}
                        <h4>17. Вопрос</h4>
                        <input type="text" class="form-control" name="array[16][question]"
                               placeholder="Вопрос"
                               required
                               value="{{(isset($category) ? $questions[16]->question : 'Вопрос 17.')}}">

                        <div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[16][0][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[16]->answers[0]->answer : 'Ответ 17.1')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[16][0][]" class="answer_block_input"
                                       @if(isset($category) && $questions[16]->answers[0]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[16][1][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[16]->answers[1]->answer : 'Ответ 17.2')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[16][1][]" class="answer_block_input"
                                       @if(isset($category) && $questions[16]->answers[1]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
                <textarea class="form-control answer_block_textarea" name="array[16][2][]"
                          placeholder="Ответ"
                          required
                          rows="3">{{(isset($category) ? $questions[16]->answers[2]->answer : 'Ответ 17.3')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[16][2][]" class="answer_block_input"
                                       @if(isset($category) && $questions[16]->answers[2]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[16][3][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[16]->answers[3]->answer : 'Ответ 17.4')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[16][3][]" class="answer_block_input"
                                       @if(isset($category) && $questions[16]->answers[3]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[16][4][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[16]->answers[4]->answer : 'Ответ 17.5')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[16][4][]" class="answer_block_input"
                                       @if(isset($category) && $questions[16]->answers[4]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>

                        </div>
                        {{--17 конец вопрос--}}

                        {{--18 вопрос--}}
                        <h4>18. Вопрос</h4>
                        <input type="text" class="form-control" name="array[17][question]"
                               placeholder="Вопрос"
                               required
                               value="{{(isset($category) ? $questions[17]->question : 'Вопрос 18.')}}">

                        <div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[17][0][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[17]->answers[0]->answer : 'Ответ 18.1')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[17][0][]" class="answer_block_input"
                                       @if(isset($category) && $questions[17]->answers[0]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[17][1][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[17]->answers[1]->answer : 'Ответ 18.2')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[17][1][]" class="answer_block_input"
                                       @if(isset($category) && $questions[17]->answers[1]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
                <textarea class="form-control answer_block_textarea" name="array[17][2][]"
                          placeholder="Ответ"
                          required
                          rows="3">{{(isset($category) ? $questions[17]->answers[2]->answer : 'Ответ 18.3')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[17][2][]" class="answer_block_input"
                                       @if(isset($category) && $questions[17]->answers[2]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[17][3][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[17]->answers[3]->answer : 'Ответ 18.4')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[17][3][]" class="answer_block_input"
                                       @if(isset($category) && $questions[17]->answers[3]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[17][4][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[17]->answers[4]->answer : 'Ответ 18.5')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[17][4][]" class="answer_block_input"
                                       @if(isset($category) && $questions[17]->answers[4]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                        </div>
                        {{--18 конец вопрос--}}

                        {{--19 вопрос--}}
                        <h4>19. Вопрос</h4>
                        <input type="text" class="form-control" name="array[18][question]"
                               placeholder="Вопрос"
                               required
                               value="{{(isset($category) ? $questions[18]->question : 'Вопрос 19.')}}">

                        <div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[18][0][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[18]->answers[0]->answer : 'Ответ 19.1')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[18][0][]" class="answer_block_input"
                                       @if(isset($category) && $questions[18]->answers[0]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[18][1][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[18]->answers[1]->answer : 'Ответ 19.2')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[18][1][]" class="answer_block_input"
                                       @if(isset($category) && $questions[18]->answers[1]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
                <textarea class="form-control answer_block_textarea" name="array[18][2][]"
                          placeholder="Ответ"
                          required
                          rows="3">{{(isset($category) ? $questions[18]->answers[2]->answer : 'Ответ 19.3')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[18][2][]" class="answer_block_input"
                                       @if(isset($category) && $questions[18]->answers[2]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[18][3][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[18]->answers[3]->answer : 'Ответ 19.4')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[18][3][]" class="answer_block_input"
                                       @if(isset($category) && $questions[18]->answers[3]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[18][4][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[18]->answers[4]->answer : 'Ответ 19.5')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[18][4][]" class="answer_block_input"
                                       @if(isset($category) && $questions[18]->answers[4]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                        </div>
                        {{--19 конец вопрос--}}

                        {{--20 вопрос--}}
                        <h4>20. Вопрос</h4>
                        <input type="text" class="form-control" name="array[19][question]"
                               placeholder="Вопрос"
                               required
                               value="{{(isset($category) ? $questions[19]->question : 'Вопрос 20.')}}">

                        <div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[19][0][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[19]->answers[0]->answer : 'Ответ 20.1')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[19][0][]" class="answer_block_input"
                                       @if(isset($category) && $questions[19]->answers[0]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[19][1][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[19]->answers[1]->answer : 'Ответ 20.2')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[19][1][]" class="answer_block_input"
                                       @if(isset($category) && $questions[19]->answers[1]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
                <textarea class="form-control answer_block_textarea" name="array[19][2][]"
                          placeholder="Ответ"
                          required
                          rows="3">{{(isset($category) ? $questions[19]->answers[2]->answer : 'Ответ 20.3')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[19][2][]" class="answer_block_input"
                                       @if(isset($category) && $questions[19]->answers[2]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[19][3][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[19]->answers[3]->answer : 'Ответ 20.4')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[19][3][]" class="answer_block_input"
                                       @if(isset($category) && $questions[19]->answers[3]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[19][4][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[19]->answers[4]->answer : 'Ответ 20.5')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[19][4][]" class="answer_block_input"
                                       @if(isset($category) && $questions[19]->answers[4]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                        </div>
                        {{--20 конец вопрос--}}

                        {{--21 вопрос--}}
                        <h4>21. Вопрос</h4>
                        <input type="text" class="form-control" name="array[20][question]"
                               placeholder="Вопрос"
                               required
                               value="{{(isset($category) ? $questions[20]->question : 'Вопрос 21.')}}">

                        <div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[20][0][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[20]->answers[0]->answer : 'Ответ 21.1')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[20][0][]" class="answer_block_input"
                                       @if(isset($category) && $questions[20]->answers[0]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[20][1][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[20]->answers[1]->answer : 'Ответ 21.2')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[20][1][]" class="answer_block_input"
                                       @if(isset($category) && $questions[20]->answers[1]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
                <textarea class="form-control answer_block_textarea" name="array[20][2][]"
                          placeholder="Ответ"
                          required
                          rows="3">{{(isset($category) ? $questions[20]->answers[2]->answer : 'Ответ 21.3')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[20][2][]" class="answer_block_input"
                                       @if(isset($category) && $questions[20]->answers[2]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[20][3][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[20]->answers[3]->answer : 'Ответ 21.4')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[20][3][]" class="answer_block_input"
                                       @if(isset($category) && $questions[20]->answers[3]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[20][4][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[20]->answers[4]->answer : 'Ответ 21.5')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[20][4][]" class="answer_block_input"
                                       @if(isset($category) && $questions[20]->answers[4]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[20][5][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[20]->answers[5]->answer : 'Ответ 21.6')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[20][5][]" class="answer_block_input"
                                       @if(isset($category) && $questions[20]->answers[5]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[20][6][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[20]->answers[6]->answer : 'Ответ 21.7')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[20][6][]" class="answer_block_input"
                                       @if(isset($category) && $questions[20]->answers[6]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[20][7][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[20]->answers[7]->answer : 'Ответ 21.8')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[20][7][]" class="answer_block_input"
                                       @if(isset($category) && $questions[20]->answers[7]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                        </div>
                        {{--21 конец вопрос--}}

                        {{--22 вопрос--}}
                        <h4>22. Вопрос</h4>
                        <input type="text" class="form-control" name="array[21][question]"
                               placeholder="Вопрос"
                               required
                               value="{{(isset($category) ? $questions[21]->question : 'Вопрос 22.')}}">

                        <div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[21][0][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[21]->answers[0]->answer : 'Ответ 22.1')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[21][0][]" class="answer_block_input"
                                       @if(isset($category) && $questions[20]->answers[0]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[21][1][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[21]->answers[1]->answer : 'Ответ 22.2')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[21][1][]" class="answer_block_input"
                                       @if(isset($category) && $questions[21]->answers[1]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
                <textarea class="form-control answer_block_textarea" name="array[21][2][]"
                          placeholder="Ответ"
                          required
                          rows="3">{{(isset($category) ? $questions[21]->answers[2]->answer : 'Ответ 22.3')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[21][2][]" class="answer_block_input"
                                       @if(isset($category) && $questions[21]->answers[2]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[21][3][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[21]->answers[3]->answer : 'Ответ 22.4')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[21][3][]" class="answer_block_input"
                                       @if(isset($category) && $questions[21]->answers[3]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[21][4][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[21]->answers[4]->answer : 'Ответ 22.5')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[21][4][]" class="answer_block_input"
                                       @if(isset($category) && $questions[21]->answers[4]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[21][5][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[21]->answers[5]->answer : 'Ответ 22.6')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[21][5][]" class="answer_block_input"
                                       @if(isset($category) && $questions[21]->answers[5]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[21][6][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[21]->answers[6]->answer : 'Ответ 22.7')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[21][6][]" class="answer_block_input"
                                       @if(isset($category) && $questions[21]->answers[6]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[21][7][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[21]->answers[7]->answer : 'Ответ 22.8')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[21][7][]" class="answer_block_input"
                                       @if(isset($category) && $questions[21]->answers[7]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                        </div>
                        {{--22 конец вопрос--}}

                        {{--23 вопрос--}}
                        <h4>23. Вопрос</h4>
                        <input type="text" class="form-control" name="array[22][question]"
                               placeholder="Вопрос"
                               required
                               value="{{(isset($category) ? $questions[22]->question : 'Вопрос 23.')}}">

                        <div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[22][0][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[22]->answers[0]->answer : 'Ответ 23.1')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[22][0][]" class="answer_block_input"
                                       @if(isset($category) && $questions[22]->answers[0]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[22][1][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[22]->answers[1]->answer : 'Ответ 23.2')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[22][1][]" class="answer_block_input"
                                       @if(isset($category) && $questions[22]->answers[1]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
                <textarea class="form-control answer_block_textarea" name="array[22][2][]"
                          placeholder="Ответ"
                          required
                          rows="3">{{(isset($category) ? $questions[22]->answers[2]->answer : 'Ответ 23.3')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[22][2][]" class="answer_block_input"
                                       @if(isset($category) && $questions[22]->answers[2]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[22][3][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[22]->answers[3]->answer : 'Ответ 23.4')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[22][3][]" class="answer_block_input"
                                       @if(isset($category) && $questions[22]->answers[3]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[22][4][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[22]->answers[4]->answer : 'Ответ 23.5')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[22][4][]" class="answer_block_input"
                                       @if(isset($category) && $questions[22]->answers[4]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[22][5][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[22]->answers[5]->answer : 'Ответ 23.6')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[22][5][]" class="answer_block_input"
                                       @if(isset($category) && $questions[22]->answers[5]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[22][6][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[22]->answers[6]->answer : 'Ответ 23.7')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[22][6][]" class="answer_block_input"
                                       @if(isset($category) && $questions[22]->answers[6]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[22][7][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[22]->answers[7]->answer : 'Ответ 23.8')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[22][7][]" class="answer_block_input"
                                       @if(isset($category) && $questions[22]->answers[7]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                        </div>
                        {{--23 конец вопрос--}}

                        {{--24 вопрос--}}
                        <h4>24. Вопрос</h4>
                        <input type="text" class="form-control" name="array[23][question]"
                               placeholder="Вопрос"
                               required
                               value="{{(isset($category) ? $questions[23]->question : 'Вопрос 24.')}}">

                        <div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[23][0][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[23]->answers[0]->answer : 'Ответ 24.1')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[23][0][]" class="answer_block_input"
                                       @if(isset($category) && $questions[23]->answers[0]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[23][1][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[23]->answers[1]->answer : 'Ответ 24.2')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[23][1][]" class="answer_block_input"
                                       @if(isset($category) && $questions[23]->answers[1]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
                <textarea class="form-control answer_block_textarea" name="array[23][2][]"
                          placeholder="Ответ"
                          required
                          rows="3">{{(isset($category) ? $questions[23]->answers[2]->answer : 'Ответ 24.3')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[23][2][]" class="answer_block_input"
                                       @if(isset($category) && $questions[23]->answers[2]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[23][3][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[23]->answers[3]->answer : 'Ответ 24.4')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[23][3][]" class="answer_block_input"
                                       @if(isset($category) && $questions[23]->answers[3]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[23][4][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[23]->answers[4]->answer : 'Ответ 24.5')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[23][4][]" class="answer_block_input"
                                       @if(isset($category) && $questions[23]->answers[4]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[23][5][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[23]->answers[5]->answer : 'Ответ 24.6')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[23][5][]" class="answer_block_input"
                                       @if(isset($category) && $questions[23]->answers[5]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[23][6][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[23]->answers[6]->answer : 'Ответ 24.7')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[23][6][]" class="answer_block_input"
                                       @if(isset($category) && $questions[23]->answers[6]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[23][7][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[23]->answers[7]->answer : 'Ответ 24.8')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[23][7][]" class="answer_block_input"
                                       @if(isset($category) && $questions[23]->answers[7]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                        </div>
                        {{--24 конец вопрос--}}

                        {{--25 вопрос--}}
                        <h4>25. Вопрос</h4>
                        <input type="text" class="form-control" name="array[24][question]"
                               placeholder="Вопрос"
                               required
                               value="{{(isset($category) ? $questions[24]->question : 'Вопрос 25.')}}">

                        <div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[24][0][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[24]->answers[0]->answer : 'Ответ 25.1')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[24][0][]" class="answer_block_input"
                                       @if(isset($category) && $questions[24]->answers[0]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[24][1][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[24]->answers[1]->answer : 'Ответ 25.2')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[24][1][]" class="answer_block_input"
                                       @if(isset($category) && $questions[24]->answers[1]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
                <textarea class="form-control answer_block_textarea" name="array[24][2][]"
                          placeholder="Ответ"
                          required
                          rows="3">{{(isset($category) ? $questions[24]->answers[2]->answer : 'Ответ 25.3')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[24][2][]" class="answer_block_input"
                                       @if(isset($category) && $questions[24]->answers[2]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[24][3][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[24]->answers[3]->answer : 'Ответ 25.4')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[24][3][]" class="answer_block_input"
                                       @if(isset($category) && $questions[24]->answers[3]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[24][4][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[24]->answers[4]->answer : 'Ответ 25.5')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[24][4][]" class="answer_block_input"
                                       @if(isset($category) && $questions[24]->answers[4]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[24][5][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[24]->answers[5]->answer : 'Ответ 25.6')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[24][5][]" class="answer_block_input"
                                       @if(isset($category) && $questions[24]->answers[5]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[24][6][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[24]->answers[6]->answer : 'Ответ 25.7')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[24][6][]" class="answer_block_input"
                                       @if(isset($category) && $questions[24]->answers[6]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[24][7][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[24]->answers[7]->answer : 'Ответ 25.8')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[24][7][]" class="answer_block_input"
                                       @if(isset($category) && $questions[24]->answers[7]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                        </div>
                        {{--25 конец вопрос--}}

                        {{--26 вопрос--}}
                        <h4>26. Вопрос</h4>
                        <input type="text" class="form-control" name="array[25][question]"
                               placeholder="Вопрос"
                               required
                               value="{{(isset($category) ? $questions[25]->question : 'Вопрос 26.')}}">

                        <div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[25][0][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[25]->answers[0]->answer : 'Ответ 26.1')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[25][0][]" class="answer_block_input"
                                       @if(isset($category) && $questions[25]->answers[0]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[25][1][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[25]->answers[1]->answer : 'Ответ 26.2')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[25][1][]" class="answer_block_input"
                                       @if(isset($category) && $questions[25]->answers[1]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
                <textarea class="form-control answer_block_textarea" name="array[25][2][]"
                          placeholder="Ответ"
                          required
                          rows="3">{{(isset($category) ? $questions[25]->answers[2]->answer : 'Ответ 26.3')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[25][2][]" class="answer_block_input"
                                       @if(isset($category) && $questions[25]->answers[2]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[25][3][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[25]->answers[3]->answer : 'Ответ 26.4')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[25][3][]" class="answer_block_input"
                                       @if(isset($category) && $questions[25]->answers[3]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[25][4][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[25]->answers[4]->answer : 'Ответ 26.5')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[25][4][]" class="answer_block_input"
                                       @if(isset($category) && $questions[25]->answers[4]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[25][5][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[25]->answers[5]->answer : 'Ответ 26.6')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[25][5][]" class="answer_block_input"
                                       @if(isset($category) && $questions[25]->answers[5]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[25][6][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[25]->answers[6]->answer : 'Ответ 26.7')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[25][6][]" class="answer_block_input"
                                       @if(isset($category) && $questions[25]->answers[6]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[25][7][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[25]->answers[7]->answer : 'Ответ 26.8')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[25][7][]" class="answer_block_input"
                                       @if(isset($category) && $questions[25]->answers[7]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                        </div>
                        {{--26 конец вопрос--}}

                        {{--27 вопрос--}}
                        <h4>27. Вопрос</h4>
                        <input type="text" class="form-control" name="array[26][question]"
                               placeholder="Вопрос"
                               required
                               value="{{(isset($category) ? $questions[26]->question : 'Вопрос 27.')}}">

                        <div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[26][0][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[26]->answers[0]->answer : 'Ответ 27.1')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[26][0][]" class="answer_block_input"
                                       @if(isset($category) && $questions[26]->answers[0]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[26][1][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[26]->answers[1]->answer : 'Ответ 27.2')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[26][1][]" class="answer_block_input"
                                       @if(isset($category) && $questions[26]->answers[1]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
                <textarea class="form-control answer_block_textarea" name="array[26][2][]"
                          placeholder="Ответ"
                          required
                          rows="3">{{(isset($category) ? $questions[26]->answers[2]->answer : 'Ответ 27.3')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[26][2][]" class="answer_block_input"
                                       @if(isset($category) && $questions[26]->answers[2]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[26][3][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[26]->answers[3]->answer : 'Ответ 27.4')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[26][3][]" class="answer_block_input"
                                       @if(isset($category) && $questions[26]->answers[3]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[26][4][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[26]->answers[4]->answer : 'Ответ 27.5')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[26][4][]" class="answer_block_input"
                                       @if(isset($category) && $questions[26]->answers[4]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[26][5][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[26]->answers[5]->answer : 'Ответ 27.6')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[26][5][]" class="answer_block_input"
                                       @if(isset($category) && $questions[26]->answers[5]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[26][6][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[26]->answers[6]->answer : 'Ответ 27.7')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[26][6][]" class="answer_block_input"
                                       @if(isset($category) && $questions[26]->answers[6]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[26][7][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[26]->answers[7]->answer : 'Ответ 27.8')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[26][7][]" class="answer_block_input"
                                       @if(isset($category) && $questions[26]->answers[7]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                        </div>
                        {{--27 конец вопрос--}}

                        {{--28 вопрос--}}
                        <h4>28. Вопрос</h4>
                        <input type="text" class="form-control" name="array[27][question]"
                               placeholder="Вопрос"
                               required
                               value="{{(isset($category) ? $questions[27]->question : 'Вопрос 28.')}}">

                        <div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[27][0][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[27]->answers[0]->answer : 'Ответ 28.1')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[27][0][]" class="answer_block_input"
                                       @if(isset($category) && $questions[27]->answers[0]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[27][1][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[27]->answers[1]->answer : 'Ответ 28.2')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[27][1][]" class="answer_block_input"
                                       @if(isset($category) && $questions[27]->answers[1]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
                <textarea class="form-control answer_block_textarea" name="array[27][2][]"
                          placeholder="Ответ"
                          required
                          rows="3">{{(isset($category) ? $questions[27]->answers[2]->answer : 'Ответ 28.3')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[27][2][]" class="answer_block_input"
                                       @if(isset($category) && $questions[27]->answers[2]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[27][3][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[27]->answers[3]->answer : 'Ответ 28.4')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[27][3][]" class="answer_block_input"
                                       @if(isset($category) && $questions[27]->answers[3]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[27][4][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[27]->answers[4]->answer : 'Ответ 28.5')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[27][4][]" class="answer_block_input"
                                       @if(isset($category) && $questions[27]->answers[4]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[27][5][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[27]->answers[5]->answer : 'Ответ 28.6')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[27][5][]" class="answer_block_input"
                                       @if(isset($category) && $questions[27]->answers[5]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[27][6][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[27]->answers[6]->answer : 'Ответ 28.7')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[27][6][]" class="answer_block_input"
                                       @if(isset($category) && $questions[27]->answers[6]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[27][7][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[27]->answers[7]->answer : 'Ответ 28.8')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[27][7][]" class="answer_block_input"
                                       @if(isset($category) && $questions[27]->answers[7]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                        </div>
                        {{--28 конец вопрос--}}

                        {{--29 вопрос--}}
                        <h4>29. Вопрос</h4>
                        <input type="text" class="form-control" name="array[28][question]"
                               placeholder="Вопрос"
                               required
                               value="{{(isset($category) ? $questions[28]->question : 'Вопрос 29.')}}">

                        <div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[28][0][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[28]->answers[0]->answer : 'Ответ 29.1')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[28][0][]" class="answer_block_input"
                                       @if(isset($category) && $questions[28]->answers[0]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[28][1][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[28]->answers[1]->answer : 'Ответ 29.2')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[28][1][]" class="answer_block_input"
                                       @if(isset($category) && $questions[28]->answers[1]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
                <textarea class="form-control answer_block_textarea" name="array[28][2][]"
                          placeholder="Ответ"
                          required
                          rows="3">{{(isset($category) ? $questions[28]->answers[2]->answer : 'Ответ 29.3')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[28][2][]" class="answer_block_input"
                                       @if(isset($category) && $questions[28]->answers[2]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[28][3][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[28]->answers[3]->answer : 'Ответ 29.4')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[28][3][]" class="answer_block_input"
                                       @if(isset($category) && $questions[28]->answers[3]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[28][4][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[28]->answers[4]->answer : 'Ответ 29.5')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[28][4][]" class="answer_block_input"
                                       @if(isset($category) && $questions[28]->answers[4]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[28][5][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[28]->answers[5]->answer : 'Ответ 29.6')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[28][5][]" class="answer_block_input"
                                       @if(isset($category) && $questions[28]->answers[5]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[28][6][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[28]->answers[6]->answer : 'Ответ 29.7')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[28][6][]" class="answer_block_input"
                                       @if(isset($category) && $questions[28]->answers[6]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[28][7][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[28]->answers[7]->answer : 'Ответ 29.8')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[28][7][]" class="answer_block_input"
                                       @if(isset($category) && $questions[28]->answers[7]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                        </div>
                        {{--29 конец вопрос--}}

                        {{--30 вопрос--}}
                        <h4>30. Вопрос</h4>
                        <input type="text" class="form-control" name="array[29][question]"
                               placeholder="Вопрос"
                               required
                               value="{{(isset($category) ? $questions[29]->question : 'Вопрос 30.')}}">

                        <div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[29][0][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[29]->answers[0]->answer : 'Ответ 30.1')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[29][0][]" class="answer_block_input"
                                       @if(isset($category) && $questions[29]->answers[0]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[29][1][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[29]->answers[1]->answer : 'Ответ 30.2')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[29][1][]" class="answer_block_input"
                                       @if(isset($category) && $questions[29]->answers[1]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
                <textarea class="form-control answer_block_textarea" name="array[29][2][]"
                          placeholder="Ответ"
                          required
                          rows="3">{{(isset($category) ? $questions[29]->answers[2]->answer : 'Ответ 30.3')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[29][2][]" class="answer_block_input"
                                       @if(isset($category) && $questions[29]->answers[2]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[29][3][]"
                      placeholder="Ответ"
                      required
                      rows="3">{{(isset($category) ? $questions[29]->answers[3]->answer : 'Ответ 30.4')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[29][3][]" class="answer_block_input"
                                       @if(isset($category) && $questions[29]->answers[3]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[29][4][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[29]->answers[4]->answer : 'Ответ 30.5')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[29][4][]" class="answer_block_input"
                                       @if(isset($category) && $questions[29]->answers[4]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[29][5][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[29]->answers[5]->answer : 'Ответ 30.6')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[29][5][]" class="answer_block_input"
                                       @if(isset($category) && $questions[29]->answers[5]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[29][6][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[29]->answers[6]->answer : 'Ответ 30.7')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[29][6][]" class="answer_block_input"
                                       @if(isset($category) && $questions[29]->answers[6]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                            <div class="answer_block">
            <textarea class="form-control answer_block_textarea" name="array[29][7][]"
                      placeholder="Ответ"
                      rows="3">{{(isset($category) ? $questions[29]->answers[7]->answer : 'Ответ 30.8')}}</textarea>
                                </textarea>
                                <input type="checkbox" name="array[29][7][]" class="answer_block_input"
                                       @if(isset($category) && $questions[29]->answers[7]->is_correct) checked @endif
                                       data-on="on"
                                       data-off="off">
                            </div>
                        </div>
                        {{--30 конец вопрос--}}
                        <button type="submit" class="btn btn-primary save">Сохранить
                        </button>
                    </form>
    </div>
@endsection

<style>
    .main_title {
        margin: 30px;
    }

    .main_block {
        margin: 0px 0px 20px 20px;
    }

    .answer_block {
        display: flex;
        margin:  20px 0px 20px 40px;
    }

    .answer_block_textarea {
        max-width:    60%;
        margin-right: 30px;
    }

    .answer_block_input {

    }
</style>
