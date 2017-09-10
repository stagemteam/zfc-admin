$(document).on('click', '[data-toggle="ajax"]', function (e) {

    var elm = $(this);

    if (elm.hasClass('disabled')) {
        return false;
    }

    var url = elm.data('href');
    // TODO: Трохи говнокоду. Доводиться форматувати в такий вигляд id, бо на стороні контролера очикується саме на такий вигляд
    var $sentData = {
        'ids': {
            0: $(elm.data('select-to')).val()
        }
    };
    $.post(url, $sentData)
        .success(function(result) {
            switch (elm.data('set-received-value')) {
                case '1':
                    // Якщо треба встановити отримане з сервера значення, то не міняємо зміст $result
                    break;
                case '0':
                default:
                    // Перевіряємо, чи треба встановити якесь фіксоване значення
                    // Якщо цей параметр не встановлений, то $result отримає значення "undefined"
                    result = elm.data('set-fixed-value');
                    break;
            }
            // Якщо в $result щось є, то треба встановити це значення по елементах
            if (undefined != result) {
                $(elm.data('select-to')).val(result);
                // Можливо треба оновити також ще якісь елементи
                // Селектори мають бути перелічені у JSON форматі
                $.each(elm.data('refresh-also'), function(id, selector) {
                    $(selector).val(result);
                });
                // TODO: Говнокод!! Не знаю, як ще можна передати сюди id сутності, якщо trigger викликається не із модального вікна
                $(elm.data('refresh')).trigger('refresh', result);
            }
        });
    e.preventDefault();
});
