@extends('new_app')

@section('new_lections')
    <div id="course" class="row center-xs">
        <div class="col-xs-12 col-sm-10 col-md-8">
            <div class="mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <div class="row middle-xs">
                        <div class="col-sm-12 col-lg">
                            <img src="{{ URL::asset('gruntfiles/'.rawurlencode($chosencourse->ctitle).'/'.rawurlencode($chosencourse->image)) }}" alt="">
                        </div>
                        <div class="col-sm-12 col-lg">
                            <h4>{{ $chosencourse->cdesc }}</h4>
                        </div>
                    </div>
                </div>
                <div class="mdl-card__supporting-text">
                    <div class="row center-xs">
                        <div class="col-xs-12">
                            <h4>Требования к слушателю</h4>

                            <p>
                                {{ $chosencourse->requirements }}
                            </p>
                        </div>
                    </div>

                    <div class="row center-xs">
                        <div class="col-xs-12">
                            <h4>Для кого предназначен курс</h4>

                            <p>
                                {{ $chosencourse->forWhom }}
                            </p>
                        </div>
                    </div>

                    <div class="row center-xs">
                        <div class="col-xs-12">
                            <h4>Список лекций</h4>

                            <ul class="mdl-list">
                            @foreach($lections as $lection)
                                <li class="mdl-list__item"><a href="/course{{ $chosencourse->id }}/lections/{{$lection->id}}">{{ substr($lection->ltitle, 0, strripos($lection->ltitle, '.')) }}</a></li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                    @if ($hiUsa->isPrepod != 0)
                        <div class="row center-xs">
                            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="{{ action('CoursesController@show', ['id' => $chosencourse->id]) }}">
                                Редактировать курс
                            </a>
                        </div>
                        <div class="mdl-card__actions mdl-card--border">

                            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect buttonLecChange">
                                Добавить лекцию
                            </button>
                            <form id="add_video" class="changeLecForm " action="{{ action('LectionsController@store', ['id' => $chosencourse->id]) }}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" name="ltitle" required>
                                    <label class="mdl-textfield__label" for="ltitle">Название видеурока</label>
                                </div>

                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" name="ldesc" required>
                                    <label class="mdl-textfield__label" for="ldesc">Описание видеурока</label>
                                </div>
                                <input name="videofile" type="file" accept="video/*">
                                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                                    Добавить
                                </button>
                            </form>
                        </div>
                    @endif
                    @if (Session::has('message'))
                        <div>{{ Session::get('message') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop