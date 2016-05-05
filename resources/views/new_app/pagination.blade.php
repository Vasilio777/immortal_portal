<div class="pagination">
    @if ($paginator->lastPage() > 1)
        @if ($paginator->currentPage() != 1)
            <a href="{{ $paginator->url(1) }}#lection_comments" class="mdl-button mdl-js-button mdl-button--raised">Предыдущая</a>
        @else
            <button class="mdl-button mdl-js-button mdl-button--raised" disabled>Предыдущая</button>
        @endif

        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            @if ($i != $paginator->currentPage())
                <a href="{{ $paginator->url($i) }}#lection_comments" class="mdl-button mdl-js-button mdl-button--raised">{{ $i }}</a>
            @else
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">{{ $i }}</button>
            @endif
        @endfor

        @if ($paginator->currentPage() != $paginator->lastPage())
            <a href="{{ $paginator->url($paginator->currentPage()+1) }}#lection_comments" class="mdl-button mdl-js-button mdl-button--raised">Следующая</a>
        @else
            <button class="mdl-button mdl-js-button mdl-button--raised" disabled>Следующая</button>
        @endif
    @endif
</div>