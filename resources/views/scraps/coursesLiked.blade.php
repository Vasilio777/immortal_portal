@foreach($coursesLiked as $liked)
    <div class="course">
        <a class="plate"  href="/course{{ $liked->id }}/lections" style="width: 150px; height: 75px">
            <img src="{{ URL::asset('gruntFiles/'.$liked->ctitle.'/'.$liked->image) }}" alt="Пожалуйста, добавьте изображение" style="width: 150px; height: 75px">
        </a>
    </div>

    <a class="destroyLiked" data-destroy_id="{{ $liked->id }}" data-url="{{ URL::asset('') }}">Удалить из избранного</a>
@endforeach