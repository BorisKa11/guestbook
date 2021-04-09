<div class="guestbook">
    @if ($messages->count())
        @foreach ($messages as $message)
            @include('guestbook.item', ['message' => $message])
        @endforeach

        @include('layouts.pagination', ['pages' => $messages])

    @else
        <h4>Нет сообщений...</h4>
    @endif
</div>