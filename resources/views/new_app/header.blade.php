<header class="mdl-layout__header mdl-color--green mdl-shadow--4dp">
    <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">{{ (!empty($section)) ? $section : ''}}</span>
        <div class="mdl-layout-spacer"></div>
        @if (!empty($onelection))
            <nav class="mdl-navigation">
                <form id="add_homework" action="{{ action('HomeworkController@store', ['id' => $onelection->id, 'email' => $hiUsa->email, 'cid' => $chosencourse->id]) }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input name="homeworkfile" type="file">
                </form>
                <a class="mdl-navigation__link homework_link" href="">
                    Отправить домашнее задание
                </a>
            </nav>
        @endif
        @if (!empty($coursesection))
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link toggleLiked {{ $isLiked ? 'active' : '' }}" href="#" data-url="{{ URL::asset('') }}" data-id="{{ $chosencourse->id }}" title="Добавить в избранное">
                    <i class="material-icons">grade</i>
                </a>
            </nav>
        @endif
        @if ($section == 'Курсы' && $usachek == 2)
            <nav class="mdl-navigation">
                <a href="{{ action('CoursesController@create') }}" class="mdl-navigation__link">Добавить новый курс</a>
            </nav>
        @endif
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
                <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
                <input class="mdl-textfield__input" type="text" id="search">
                <label class="mdl-textfield__label mdl-textfield-color--white" for="search">Что хотите найти?</label>
            </div>
        </div>
    </div>
    @if (!empty($onelection))
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect mdl-color--green">
            <a href="#lection_material" class="mdl-layout__tab is-active">Материал лекции</a>
            <a href="#lection_comments" class="mdl-layout__tab">Комментарии</a>
            <a href="#lection_homeworks" class="mdl-layout__tab">Домашние задания</a>
        </div>
    @endif
</header>