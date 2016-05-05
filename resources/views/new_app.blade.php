<!doctype html>
<!--
    Material Design Lite
    Copyright 2015 Google Inc. All rights reserved.

    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at

            https://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License
-->
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <title>Интерактивный образовательный портал</title>
    <link rel="shortcut icon" href="{{ URL::asset('images/unnamed.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ URL::asset('new_app/bower_components/material-design-lite/material.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('new_app/bower_components/flexboxgrid/dist/flexboxgrid.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('new_app/node_modules/roboto/roboto.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('new_app/styles.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('new_app/main-new_app.css') }}">
</head>

<body>
    <!-- Simple header with fixed tabs. -->
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-color--grey-100 {{!empty($onelection) ? 'mdl-layout--fixed-tabs' : ''}}">
        @if(!empty($section) && $section !== 'auth')
            @include('new_app.header')
            @include('new_app.drawer')

            <main class="mdl-layout__content">
                <div class="page-content">
                    @yield('index')
                    @yield('new_newcourse')
                    {{--@yield('new_lections_all')--}}
                    @yield('new_lections')
                    @yield('new_onelection')
                    @yield('new_changeCourse')
                @yield('new_grade')
                </div>
            </main>
        @else
            @yield('new_auth')
        @endif
    </div>

    <script src="{{ URL::asset('new_app/bower_components/material-design-lite/material.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery-1.12.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/spin.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/new_design.js') }}"></script>
</body>

</html>