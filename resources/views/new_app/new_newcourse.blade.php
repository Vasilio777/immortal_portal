@extends('new_app')

@section('new_newcourse')
    <div id="course" class="row center-xs">
        <div class="col-xs-12 col-sm-10 col-md-8">
            <div class="mdl-card mdl-shadow--2dp">
                <form action="{{ action('CoursesController@store') }}" method="post" class="nCourse">
                    <div class="nCourseLogo col-xs-12 col-sm-8 col-md-6">
                        <div class="mdl-card middle-xs">
                            <div class="onliOneCourse">
                                <div class="plate">
                                    <img src="" alt="Изображение не доступно">
                                    <div class="bottom"></div>
                                </div>
                            </div>

                            <div id="add_logo">
                                <input name="logofile" type="file" accept="image/*" required>
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect newcourse-btn" type="submit">Добавить изображение курса</button>
                            </div>
                        </div>
                    </div>
                    <div class="nCourseContent">
                        <div class="newcoursecontent">
                            <div>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <ul class="mdl-list">
                                    <li class="mdl-list__item">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="text" name="ctitle" required>
                                            <label class="mdl-textfield__label">Название курса</label>
                                        </div>
                                    </li>
                                    <li class="mdl-list__item">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <textarea class="mdl-textfield__input" rows="5" name="cdesc" required></textarea>
                                            <label class="mdl-textfield__label">Описание курса</label>
                                        </div>
                                    </li>

                                    <li class="mdl-list__item">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <textarea class="mdl-textfield__input" rows="5" name="requirements" required></textarea>
                                            <label class="mdl-textfield__label">Требования к слушателю</label>
                                        </div>
                                    </li>

                                    <li class="mdl-list__item">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <textarea class="mdl-textfield__input" rows="5" name="forWhom" required></textarea>
                                            <label class="mdl-textfield__label">Для кого предназначен курс</label>
                                        </div>
                                    </li>

                                    <li class="mdl-list__item">
                                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="submit">Добавить курс</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>

                @if (Session::has('message'))
                    <div>{{ Session::get('message') }}</div>
                @endif
            </div>
        </div>
    </div>
@stop