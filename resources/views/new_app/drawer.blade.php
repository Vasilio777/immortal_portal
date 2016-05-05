<div class="mdl-layout__drawer">
    <header class="drawer-header mdl-color--green">
        {{--<img src="images/128.jpg" alt="" class="user-avatar">--}}
        <span class="user-name">{{ $usaName }}</span>
        <div class="mdl-layout-spacer"></div>
        {{--<span class="user-group">ЗБС-14-88</span>--}}
        <a class="user-logout" href="{{ action('UserController@logout') }}">Выйти</a>
    </header>
    <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
        <a class="mdl-navigation__link {{ (!empty($section) && $section == 'Курсы') ? 'active' : '' }}" href="{{ action('CoursesController@index') }}">
            <i class="mdl-color-text--white material-icons" role="presentation">list</i> Курсы
        </a>

        {{--<a class="mdl-navigation__link {{ (!empty($section) && $section == 'Лекции+') ? 'active' : '' }}" href="{{ action('LectionsController@showAll') }}">--}}
            {{--<i class="mdl-color-text--white material-icons" role="presentation">school</i> Лекции--}}
        {{--</a>--}}

        <a class="mdl-navigation__link {{ (!empty($section) && $section == 'Избранное') ? 'active' : '' }}" href="{{ action('CoursesController@showGrade') }}">
            <i class="mdl-color-text--white material-icons" role="presentation">grade</i> Избранное
        </a>
    </nav>
</div>