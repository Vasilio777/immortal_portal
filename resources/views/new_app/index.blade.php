@extends('new_app')

@section('index')
    <div class="row courses">
        @foreach($courses as $course)
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="courses-card mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <a href="/course{{ $course->id }}/lections">
                            <img src="{{ URL::asset('gruntFiles/'.rawurlencode($course->ctitle).'/'.rawurlencode($course->image)) }}" alt="Пожалуйста, добавьте изображение">
                        </a>
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="/course{{ $course->id }}/lections">
                            {{ $course->ctitle }}
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
        {{--@if ($usachek == 2)--}}
            {{--<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">--}}
                {{--<div class="courses-card mdl-card mdl-shadow--2dp">--}}
                    {{--<div class="mdl-card__title">--}}
                        {{--<img src="{{ URL::asset('gruntFiles/AddCompomemt.png') }}" alt="Изображение отсутствует">--}}
                    {{--</div>--}}
                    {{--<div class="mdl-card__actions mdl-card--border">--}}
                        {{--<a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="{{ action('CoursesController@create') }}">--}}
                            {{--Добавить--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--@endif--}}
    </div>
@stop