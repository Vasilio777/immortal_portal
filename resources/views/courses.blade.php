@extends('app')

@section('courses')

    <header>
            <span>
                Интерактивный образовательный портал/
            </span>

        <a href="{{ action('UserController@logout') }}">
            @if ( Auth::check() )
                {{ $usaName }}
            @endif
        </a>

        <span>Курсы</span>
    </header>

    <div class="topBlueLine">
        Для начала работы выберите необходимый курс для изучения
    </div>
    <div class="backDivCourses">
        <div class="wrapper">
            @foreach($courses as $course)
                <div class="course">
                    <a class="plate"  href="/course{{ $course->id }}/lections">
                        <img src="{{ URL::asset('images/icon/'.$course->image) }}" alt="Пожалуйста, добавьте изображение">
                        <div data-title="{{ $course->cdesc }}" class="bottom"></div>
                    </a>
                </div>
            @endforeach
            @if ($usachek == 2)
                <div class="course">
                    <a class="plate" href="{{ action('CoursesController@create') }}">
                        <img src="{{ URL::asset('images/icon/AddCompomemt.png') }}" alt="Изображение отсутствует">
                        <div class="bottom"></div>
                    </a>
                </div>
            @endif
        </div>

        @include('includes.courseliked')
    </div>
@stop