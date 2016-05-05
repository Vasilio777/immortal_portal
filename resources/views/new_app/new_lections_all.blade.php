@extends('new_app')

@section('new_lections_all')

    <div class="row">
        @foreach($courses as $chosencourse)
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <img src="{{ URL::asset('gruntfiles/'.$chosencourse->ctitle.'/'.$chosencourse->image) }}" alt="Изображение отсутствует">
                    </div>
                    <div class="mdl-card__supporting-text">
                        @foreach($lections as $lection)
                            @if ( $lection->idcourse == $chosencourse->id)

                                <ul class="mdl-list">
                                    <li class="mdl-list__item">
                                        <a href="/course{{ $chosencourse->id }}/lections/{{$lection->id}}">{{ substr($lection->ltitle, 0, strripos($lection->ltitle, '.')) }}</a>
                                    </li>
                                </ul>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@stop