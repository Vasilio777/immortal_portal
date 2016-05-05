@extends('new_app')

@section('new_auth')

    <div id="auth" class="row center-xs middle-xs">
        <div class="col-xs">
            <form id="auth_form" action="{{ action('UserController@postLogin') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" name="name" id="login">
                    <label class="mdl-textfield__label" for="login">Логин</label>
                </div>

                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="password" name="password" id="password">
                    <label class="mdl-textfield__label" for="password">Пароль</label>
                </div>

                @if(Session::has('message'))
                    <div class="mdl-textfield__error">{!!Session::get('message')!!}</div>
                @endif

                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                    Войти
                </button>
            </form>
        </div>
    </div>
@stop