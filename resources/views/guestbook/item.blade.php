<div class="item {{ $subitem ?? null }}">
    <div class="item__top">
        <div class="item__user">{{ $message->user->email }}</div>
        <div class="item__date">{{ date('d.m.Y в H:i', strtotime($message->created_at)) }}</div>
        @if ($message->user_id == Auth::id())
            <div class="item__edit">
                <a href="javascript:;" class="item__link-edit editComment"
                   data-id="{{ $message->id }}" data-toggle="tooltip" title="редактировать комментарий"></a>
            </div>
        @endif
    </div>
    <div class="item__message">{{ $message->message }}</div>
    @if (file_exists(public_path('images/pics/' . $message->id . '.jpg')))
        <div class="item__picture">
            <div class="btnopenpic item__btn">прикреплённое изображение</div>
            <div class="item__img">
                <img src="/images/pics/{{ $message->id }}.jpg?{{ rand(1, 100) }}" />
            </div>
        </div>
    @endif
    @auth
    <div class="item-bottom">
        <a href="javascripot:;" class="item__answer answerLink" data-id="{{ $message->id }}">ответить</a>
    </div>
    @endauth
    @if ($message->childrens()->count())
        <div class="opensub">
            @if (!isset($subitem))
                <div class="btnopen item__btn">посмотреть ответы на комментарий</div>
            @endif
            @foreach ($message->childrens as $child)
                @include('guestbook.item', ['message' => $child, 'subitem' => 'subitem'])
            @endforeach
        </div>
    @endif
</div>