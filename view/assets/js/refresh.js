/**
 * Usage:
 * <div id="card-info" class="row row-buffer" data-href="/discount/card/5">some content here</div>
 * <script>
 * $('#card-info').trigger('refresh');
 * </script>
 */
// TODO: Говнокод!! Не знаю, як ще можна передати сюди id сутності, якщо trigger викликається не із модального вікна
$(document).on('refresh', function(e, extraParam) {

    var elm = $(e.target);
    var href = elm.data('href');
    if (undefined != extraParam) {
        href += '/' + extraParam;
    }

    var wildcard = [];
    $.each(elm.data('href-params'), function(key, value) {
        wildcard.push(key + '/' + value);
    });
    if (wildcard.length) {
        href += '/' + wildcard.join('/');
    }

    //console.log(href);
    // @todo Додати data-refresh-params щоб мати змогу передавати додаткові параметри
    // або навіть краще передавати урл поточної сторінки як context
    $.get(href, function(data) {
        elm.replaceWith(data);
    });
});