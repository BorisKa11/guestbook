<div class="enter answerDialog {{ isset($message) ? 'open' : null }}" data-form="{{ isset($message) ? $message->id : null }}">
    <div class="enter__fon"></div>
    <a href="javascript:;" class="enter__close closeAnswer"></a>
    <div class="enter__form">
        <h3 class="enter__h3">Комментарий</h3>
        <form action="" method="post" id="form-answer" enctype="multipart/form-data">
            @if (isset($message))
                <input type="hidden" value="{{ $message->id }}" name="id" id="id" />
            @endif
            <input type="hidden" value="{{ isset($message) ? $message->parent_id : 0 }}" name="parent_id" id="answer_parent_id" />
            <div class="form-group">
                <label for="emaile">Ваш комментарий</label>
                <textarea name="message" class="form-control" aria-describedby="answerHelp">{{ isset($message) ? $message->message : '' }}</textarea>
                <small id="answerHelp" class="form-text"></small>
            </div>
            <div class="form-group">
                <input type="file" name="picture" id="filemessage" />
                <div class="file_loader">
                    Выберите изображение, чтоб прикрепить к сообщению
                    <div class="file_preview">
                        {!! isset($message)&&file_exists(public_path('images/pics/' . $message->id . '.jpg'))
                            ? '<img src="/images/pics/' . $message->id .'.jpg" />'
                            : ''
                        !!}
                    </div>
                </div>

            </div>
            <div class="bottom text-right">
                <button type="submit" class="btn btn-primary">{{ isset($message) ? 'Редактировать' : 'Добавить' }} комментарий</button>
            </div>
            @csrf
        </form>
    </div>
</div>