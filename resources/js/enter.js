$('body').on('click', '.closeEnter', function(e) {
    e.preventDefault();
    $('#form-enter')[0].reset();
    $('.enter').hide();
    $('body').removeClass('noscroll');
});
$('body').on('click', '.closeRegister', function(e) {
    e.preventDefault();
    $('#form-enter')[0].reset();
    $('.enter').hide();
    $('body').removeClass('noscroll');
});

$('body').on('click', '.enterLink', function(e) {
    e.preventDefault();
    $('.enter').hide();
    $('.enterDialog').css('display', 'flex');
    $('#form-enter input:first').focus();
    $('body').addClass('noscroll');
});
$('body').on('click', '.registerLink', function(e) {
    e.preventDefault();
    $('.enter').hide();
    $('.registerDialog').css('display', 'flex');
    $('#form-registr input:first').focus();
    $('body').addClass('noscroll');
});

$('body').on('submit', '#form-enter', function(e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: '/enter',
        dataType: 'JSON',
        data: $(this).serialize(),
        beforeSend: function(request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        },
        success: function(data) {
            window.location.reload();
        },
        error: function(data) {
            $('<div>Неверная пара логин / пароль</div>').dialog({
                'hide': 500,
                'title': 'Ошибка входа'
            });
        }
    });
});

$('body').on('submit', '#form-registr', function(e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: '/register',
        dataType: 'JSON',
        data: $(this).serialize(),
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
                'title': 'Ошибка ругистрации'
            });
        }
    });
});