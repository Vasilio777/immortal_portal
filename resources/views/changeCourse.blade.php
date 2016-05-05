@extends('app')

@section('changeCourse')
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
        <span>Редактирование</span>
    </header>
    <form action="{{ action('CoursesController@edit', ['id' => $chosencourse->id]) }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="nCourseLogo">
            <div class="onliOneCourse">
                <div class="plate">
                    <div class="bottom"></div>
                    <img class='img' src="{{ URL::asset('gruntFiles/'.$chosencourse->ctitle.'/'.$chosencourse->image) }}" alt="Пожалуйста, добавьте изображение">
                </div>
            </div>
            <div id="add_logo">
                <input name="logofile" type="file" accept="image/*">
                <button class="flatGreenButton" type="submit">Изменить изображение курса</button>
            </div>
        </div>
        <label for="cdesc">Описание:</label>
        <textarea name="cdesc" rows="5">{{ $chosencourse->cdesc }}</textarea>
        <label for="cdesc">Требования:</label>
        <textarea name="requirements" rows="5">{{ $chosencourse->requirements }}</textarea>
        <label for="cdesc">Рекомендуется для:</label>
        <textarea name="forWhom" rows="5">{{ $chosencourse->forWhom }}</textarea>
        <button class="button" type="submit">Применить изменения</button>
    </form>
@stop