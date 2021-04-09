$('body').on('click', '.closeAnswer', function(){
    $('.enter').hide();
    $('body').removeClass('noscroll');
});

$('body').on('click', '.file_loader', function(e) {
    e.preventDefault();
    $('#filemessage').click();
});
$('body').on('click', '.answerLink', function(e) {
    e.preventDefault();
    let id = $(this).data('id');
    $('#answer_parent_id').val(id);
    $('.answerDialog').stop().css('display', 'flex');
    $('.answerDialog:last textarea:first').focus();
    $('body').addClass('noscroll');
});
$('body').on('submit', '#form-answer', function(e) {
    e.preventDefault();
    let url = '/answer';

    let datas = new FormData($(this)[0]);
    if ($('input').is('#id')) {
        url = '/update'
    }

    $.ajax({
        type: "post",
        url: url,
        dataType: 'JSON',
        cache: false,
        contentType: false,
        processData: false,
        data: datas,
        beforeSend: function(request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        },
        success: function(data) {
            window.location.reload();
        },
        error: function(data) {
            let errors = [];
            for(i in data.responseJSON.errors) {
                data.responseJSON.errors[i].forEach(a => {
                    errors.push('<div>' + a + '</div>')
                });
            }
            $('<div>' + errors.join('') + '</div>').dialog({
                'hide': 500,
                'title': 'Ошибка'
            });
        }
    });
});

$('body').on('click', '.btnopen', function(e) {
    e.preventDefault();
    if ($(this).parent().find('.subitem:first').css('display') == 'none') {
        $(this).parent().find('.subitem').stop().slideDown(150);
        $(this).html('свернуть ответы к комментарию').addClass('up');
    } else {
        $(this).parent().find('.subitem').stop().slideUp(150);
        $(this).html('посмотреть ответы на комментарий').removeClass('up');
    }
});

$('body').on('click', '.btnopenpic', function(e) {
    e.preventDefault();
    if ($(this).parent().find('.item__img:first').css('display') == 'none') {
        $(this).parent().find('.item__img').stop().slideDown(150);
        $(this).html('свернуть прикреплённое изображение').addClass('up');
    } else {
        $(this).parent().find('.item__img').stop().slideUp(150);
        $(this).html('посмотреть прикреплённое изображение').removeClass('up');
    }
});

$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});

$('body').on('click', '.editComment', function(e) {
    e.preventDefault();
    $(this).blur();
    $('body').addClass('noscroll');
    $.ajax({
        dataType: 'json',
        type: "get",
        url: "/edit/" + $(this).data('id'),
        success: function(data) {
            $('body').prepend(data.tpl);
            $('.answerDialog.open textarea:first').focus();
        },
        error: function(data) {
            let errors = [];
            for(i in data.responseJSON.errors) {
                data.responseJSON.errors[i].forEach(a => {
                    errors.push('<div>' + a + '</div>')
                });
            }
            $(errors.join('')).dialog({
                'hide': 500,
                'title': 'Ошибка'
            });
        }
    });
});

$('document').ready(function() {
    $('form[data-form="255"]').css('display', 'flex');
});