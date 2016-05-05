@extends('app')
@section('lections')
    <header>
        <span>
            Интерактивный образовательный портал/
        </span>
        <a href="{{ action('UserController@logout') }}">
            @if ( Auth::check() )
                {{ $usaName }}
            @endif
            <a href="{{ action('CoursesController@index') }}">Курсы</a>
            <span>Лекции</span>
        </a>
    </header>
    <div class="spinner-wrapper">
        <div class="spinner"></div>
    </div>
    <div class="topBlueLine">
        Ознакомьтесь с описанием курса и приступите к изучению материала
    </div>
    <div class="backDiv">
        <div class="oneCourseWrapper">
            <div class="courseDesc">
                <div class="onliOneCourse">
                    <div class="plate">
                        <img src="{{ URL::asset('gruntfiles/'.$chosencourse->ctitle.'/'.$chosencourse->image) }}" alt="Изображение отсутствует">
                    </div>
                </div>
                <div class="course_desc">
                    <div class="lightGrayLine">Описание курса:</div>
                    <div class="underGrayLine">
                        <div>{{ $chosencourse->cdesc }}</div>
                    </div>
                </div>
            </div>
            <span class="userLickedCourse">Добавить в избранное</span>
            <div>
                <div class="lightGrayLine">Требования к слушателю:</div>
                <div class="underGrayLine">
                    <div>{{ $chosencourse->requirements }}</div>
                </div>
            </div>
            <div>
                <div class="lightGrayLine">Для кого предназначен курс:</div>
                <div class="underGrayLine">
                    <div>{{ $chosencourse->forWhom }}</div>
                </div>
            </div>
        </div>
        @foreach($lections as $lection)
            <ul>
                <li><a href="/course{{ $chosencourse->id }}/lections/{{$lection->id}}">{{ substr($lection->ltitle, 0, strripos($lection->ltitle, '.')) }}</a></li>
            </ul>
        @endforeach
        <img class="toggleLiked" src="{{ URL::asset('images/'.$chosencourse->toggleLiked) }}" data-url="{{ URL::asset('') }}" data-id="{{ $chosencourse->id }}" alt="Изображение отсутствует">
        @if ($hiUsa->isPrepod == 2)
            <a href="{{ action('CoursesController@show', ['id' => $chosencourse->id]) }}">Редактировать курс</a>
            <button class="greenButton buttonLecChange" type="submit">Новый видеурок</button>
            <form id="add_video" class="changeLecForm"
                  action="{{ action('LectionsController@store', ['id' => $chosencourse->id]) }}" method="post"
                  enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <ul class="input-group form-control">
                    <li><input type="text" name="ltitle" placeholder="Название видеурока" required></li>
                    <li><textarea rows="5" name="ldesc" placeholder="Описание видеурока" required></textarea></li>
                </ul>
                <input name="videofile" type="file" accept="video/*">
                <button type="submit" class="greenButton">Добавить видеоурок</button>
            </form>
        @endif
        @include('includes.courseliked')
    </div>
@stop