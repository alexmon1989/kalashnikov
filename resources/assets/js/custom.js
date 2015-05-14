/* Write here your custom javascript codes */

$(function() {
    $.backstretch([
        "img/bg.jpg"
    ]);


    // Отправка запроса на прайс-лист
    $("#request_price_btn").click(function() {
        $('#loading-div').fadeIn();
        $('#errors-price-div').hide();
        $('#success-price-div').hide();

        $.ajax({
            url: 'main/price-request',
            method: 'POST',
            data: { email : $('#email_for_price').val() },
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                    return xhr.setRequestHeader('X-XSRF-TOKEN', token);
                }
            }
        })
        .done(function() {
            $('#success-price-div').fadeIn();
        })
        .fail(function(data) {
            // Выводим ошибки
            $('#errors-text').html('');
            if (data.responseJSON && data.responseJSON.email) {
                $.each(data.responseJSON.email, function (key, value) {
                    $('#errors-text').html($('#errors-text').html() + value + '<br/>');
                });
                $('#errors-price-div').fadeIn();
            } else {
                $('#errors-text').html('Извините, произошла неизвестная ошибка. Отправить запрос не удалось.');
                $('#errors-price-div').fadeIn();
            }
        }).
        always(function(){
            $('#loading-div').hide();
        });
    });
});