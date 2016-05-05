<div>
    {{--<span>All messages: {{ $count }}</span>--}}

    <form id="add_message" action="{{ action('MessagesController@store', ['id' => $lection->id, 'email' => $hiUsa->email]) }}" method="post" enctype="multipart/form-data" style="display: flex; flex-direction: column; width: 60%; margin: 0 auto" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <textarea rows="5" name="message" placeholder="Поделись со мной своими мыс-с-с-слями" required></textarea>
        <button type="submit" class="greenButton">Отправить комментарий</button>
    </form>

    @foreach ($messages as $message)
        <ul style=" border: 1px solid #f00">
            <li>
                {{ $message->name }}
            </li>
            <li>{{ $message->message }}</li>
            <li>{{ $message->created_at }}</li>
        </ul>
    @endforeach


    <div style="display: flex">
        {!! $messages->render() !!}
    </div>
</div>