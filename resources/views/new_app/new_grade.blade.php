@extends('new_app')

@section('new_grade')
    <div class="row center-xs">
        @foreach($coursesLiked as $liked)
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <form action="{{ action('CoursesController@destroyLiked', ['id' => $liked->id]) }}" method="post">
                    <div class="mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title">
                            <img src="{{ URL::asset('gruntFiles/'.rawurlencode($liked->ctitle).'/'.rawurlencode($liked->image)) }}" alt="Изображение отсутствует">
                        </div>
                        <div class="mdl-card__actions mdl-card--border">
                            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="{{ action('LectionsController@show', ['id' => $liked->id]) }}">
                                Перейти
                            </a>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" type="submit">
                                Удалить
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        @endforeach
    </div>
@stop