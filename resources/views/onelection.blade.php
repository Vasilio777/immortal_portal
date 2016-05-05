@extends('app')

@section('onelection')

    <header>
            <span>
                Интерактивный образовательный портал/
            </span>

        <a href="{{ action('UserController@logout') }}">
            @if ( Auth::check() )
                {{ $usaName }}
            @endif
        </a>
        <a href="{{ action('CoursesController@index') }}">Курсы</a>
        <a href="/course{{ $chosencourse->id }}/lections/">Лекции</a>
        <span>{{ substr($lection->ltitle, 0, strripos($lection->ltitle, '.')) }}</span>
    </header>

    <div class="spinner-wrapper">
        <div class="spinner"></div>
    </div>

    <div class="backDiv">
        <div class="lections">
        <div class="lightGrayLine"> Видеоуроки:</div>

        @if( $lection->idcourse == $chosencourse->id)
            <div class="lectionInCourse">
                <video controls>
                    <source src="{{ URL::asset('gruntFiles/'.$chosencourse->ctitle.'/videos/'.$lection->ltitle) }}"
                            type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                    <source src="{{ URL::asset('gruntFiles/'.$chosencourse->ctitle.'/videos/'.$lection->ltitle) }}"
                            type='video/ogg; codecs="theora, vorbis"'>
                    <source src="{{ URL::asset('gruntFiles/'.$chosencourse->ctitle.'/videos/'.$lection->ltitle) }}"
                            type='video/webm; codecs="vp8, vorbis"'>
                </video>

                <div class="lectionContent">
                    <span class="darkGrayLine">{{ $lection->ldesc }}</span>

                    <div class="underGrayLine">
                        <div>
                            @if ($hiUsa->isPrepod == 2)
                                <div>
                                    <button class="button buttonchange" type="submit">Редактирование
                                        описания видеоурока
                                    </button>
                                    <form class="changeForm"
                                          action="{{ action('LectionsController@edit', ['id' => $lection->id]) }}"
                                          method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <textarea name="comment" rows="5">{{ $lection->ldesc }}</textarea>
                                        <button class="button" type="submit">Изменить описание</button>
                                    </form>
                                </div>
                            @endif
                        </div>

                        @foreach($addmats as $addmat)
                            <div class="addmat">
                                <a href="{{URL::asset('gruntFiles/'.$chosencourse->ctitle.'/addmats/'.$addmat->addtitle)}}">{{ substr($addmat->addtitle, 0, strripos($addmat->addtitle, '.'))  }}</a>

                                @if ($hiUsa->isPrepod == 2)
                                    <form onsubmit="return confirm('Файл будет безвозвратно удалён. Вы уверены?')"
                                          action="{{ action('GuidesController@destroy', ['id' => $addmat->id, 'cid' => $chosencourse->id]) }}"
                                          method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="name"
                                               value="{{ $addmat->addtitle }}">
                                        <button class="button" type="submit">Удалить документ</button>
                                    </form>
                                @endif
                            </div>
                        @endforeach

                        @if ($hiUsa->isPrepod == 1 || $hiUsa->isPrepod == 2)
                            <div>
                                <form class="add_method"
                                      action="{{ action('GuidesController@store', ['id' => $lection->id, 'cid' => $chosencourse->id]) }}"
                                      method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input multiple="multiple" name="userfile" type="file">
                                    <button class="button" type="submit">Добавить новый документ</button>
                                </form>
                            </div>
                        @endif

                        @if ($hiUsa->isPrepod == 2)
                            <form onsubmit="return confirm('Видеурок будет безвозвратно удалён. Вы уверены?')"
                                  action="{{ action('LectionsController@destroy', ['id' => $lection->id, 'cid' => $chosencourse->id]) }}"
                                  method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="name" value="{{ $lection->ltitle }}">
                                <button class="button" type="submit">Удалить видеурок</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endif
        </div>
    </div>
    @if(Session::has('message'))
        <div class="alertMessaga">
            {!!Session::get('message')!!}
        </div>
    @endif

    @include('includes.messages')
    @include('includes.homework')

    @if ($hiUsa->isPrepod == 0)
        <div>
            <form id="add_homework" action="{{ action('HomeworkController@store', ['id' => $lection->id, 'email' => $hiUsa->email, 'cid' => $chosencourse->id]) }}" method="post" enctype="multipart/form-data" style="display: flex; flex-direction: column; width: 60%; margin: 0 auto" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <textarea rows="5" name="homework" placeholder="Пояснялочка" required></textarea>
                <input name="homeworkfile" type="file">
                <button type="submit" class="greenButton">Отправить домашнее задание</button>
            </form>
        </div>
    @endif

    @include('includes.courseliked')
@stop