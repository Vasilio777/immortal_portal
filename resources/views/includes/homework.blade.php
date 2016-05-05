<div>
    @foreach ($homeworks as $homework)
        @if ( $hiUsa->isPrepod >= 1 || $homework->name == $hiUsa->name)
            <ul style=" border: 1px solid #f00">
                <li>{{ $homework->name }}</li>
                <li>{{ $homework->homeworkdesc }}</li>
                <li>{{ $homework->created_at }}</li>
                <li><a href="{{URL::asset('gruntFiles/'.$chosencourse->ctitle.'/homework/'.$homework->homeworkfile)}}">{{ $homework->homeworkfile }}</a></li>
            </ul>
        @endif
    @endforeach

    <div style="display: flex">
        {!! $homeworks->render() !!}
    </div>

</div>