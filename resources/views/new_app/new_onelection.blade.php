@extends('new_app')

@section('new_onelection')

<section class="mdl-layout__tab-panel is-active" id="lection_material">
    <div class="lection-material row">
        <div class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1 col-sm-offset-0 col-xs-offet-0">
            <div class="mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-shadow--2dp mdl-color--blue-500 mdl-color-text--grey-100">
                    <h3>{{ substr($onelection->ltitle, 0, strripos($onelection->ltitle, '.')) }}</h3>
                </div>
                <div class="mdl-card__supporting-text">
                    <div class="row middle-xs">
                        <div class="lection-material__video col-xs-12 col-sm-8 col-md-8">
                            <video controls>
                                <source src="{{ URL::asset('gruntFiles/'.rawurlencode($chosencourse->ctitle).'/videos/'.rawurlencode($onelection->ltitle)) }}"
                                        type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                                <source src="{{ URL::asset('gruntFiles/'.rawurlencode($chosencourse->ctitle).'/videos/'.rawurlencode($onelection->ltitle)) }}"
                                        type='video/ogg; codecs="theora, vorbis"'>
                                <source src="{{ URL::asset('gruntFiles/'.rawurlencode($chosencourse->ctitle).'/videos/'.rawurlencode($onelection->ltitle)) }}"
                                        type='video/webm; codecs="vp8, vorbis"'>
                            </video>
                        </div>
                        <div class="lection-material__list col-xs-12 col-sm-4 col-md-4">
                            <h3 class="mdl-color-text--black">Список лекций</h3>
                            <ul class="mdl-list">
                                @foreach($lections as $lection)
                                    <li class="mdl-list__item {{ ($onelection->id == $lection->id) ? 'disabled' : ''}}"><a href="/course{{ $chosencourse->id }}/lections/{{$lection->id}}">{{ substr($lection->ltitle, 0, strripos($lection->ltitle, '.')) }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                            <div class="lection-material__list col-xs-12 col-sm-4 col-md-12">
                                <div class="mdl-card__title mdl-color-text--grey-100">
                                    <h3 class="mdl-color-text--black">Методические указания</h3>
                                </div>
                                <ul class="mdl-list">
                                    @foreach($addmats as $addmat)
                                        <li class="mdl-list__item">
                                            <a class="col-xs-12 col-sm-6 col-md-10" href="{{URL::asset('gruntFiles/'.rawurlencode($chosencourse->ctitle).'/addmats/'.rawurlencode($addmat->addtitle))}}" target="_blank">{{ substr($addmat->addtitle, 0, strripos($addmat->addtitle, '.'))  }}</a>
                                            @if ($hiUsa->isPrepod == 2)
                                                <form class="guide-delete col-xs-12 col-sm-4 col-md-2" onsubmit="return confirm('Файл будет безвозвратно удалён. Вы уверены?')"
                                                      action="{{ action('GuidesController@destroy', ['id' => $addmat->id, 'cid' => $chosencourse->id]) }}"
                                                      method="post">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="name"
                                                           value="{{ $addmat->addtitle }}">
                                                    <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab" type="submit">
                                                        <i class="material-icons">delete</i>
                                                    </button>
                                                </form>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                                @if ($hiUsa->isPrepod == 1 || $hiUsa->isPrepod == 2)
                                    <div>
                                        <form class="add_method"
                                              action="{{ action('GuidesController@store', ['lid' => $onelection->id, 'cid' => $chosencourse->id]) }}"
                                              method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input multiple="multiple" name="userfile" type="file">
                                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="submit">Добавить новый документ</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mdl-layout__tab-panel" id="lection_comments">
    <form id="add_message" action="{{ action('MessagesController@store', ['id' => $onelection->id, 'email' => $hiUsa->email]) }}" method="post">
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-md-8 col-md-offset-2 col-sm-offset-1 col-xs-offset-0">
                <div class="lection-comments__textfield mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <textarea class="mdl-textfield__input" type="text" rows= "3" name="message" id="lection_comments_textfield" required></textarea>
                    <label class="mdl-textfield__label" for="lection_comments_textfield">Ваш комментарий</label>
                </div>
            </div>
        </div>
        <div class="row center-xs">
            <div class="col-xs">
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent" type="submit">
                    Отправить комментарий
                </button>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-md-8 col-md-offset-2 col-sm-offset-1 col-xs-offset-0">
            @foreach ($messages as $message)
                <div class="lection-comments__card mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        {{ $message->name }} написал {{ $message->created_at }}
                    </div>
                    <div class="mdl-card__supporting-text">
                        {{ $message->message }}
                    </div>
                </div>
            @endforeach
        </div>
        {{--{!! $messages->render() !!}--}}
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-md-8 col-md-offset-2 col-sm-offset-1 col-xs-offset-0">
            @include('new_app.pagination', ['paginator' => $messages])
        </div>
    </div>
</section>
<section class="mdl-layout__tab-panel" id="lection_homeworks">
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-md-8 col-md-offset-2 col-sm-offset-1 col-xs-offset-0">
            @foreach ($homeworks as $homework)
                @if ( $hiUsa->isPrepod >= 1 || $homework->name == $hiUsa->name)
                    <div class="lection-comments__card mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title">
                            {{ $homework->name }} отправил {{ $homework->created_at }}
                        </div>
                        <div class="mdl-card__supporting-text">
                        <a href="{{URL::asset('gruntFiles/'.rawurlencode($chosencourse->ctitle).'/homework/'.rawurlencode($homework->homeworkfile))}}" target="_blank">{{ $homework->homeworkfile }}</a>
                    </div>
                    </div>
                @endif
            @endforeach
        </div>
        {{--{!! $homeworks->render() !!}--}}
    </div>
</section>
@stop