let updaterComments;
$(document).ready(_ => {
    updaterComments = updateComments($('.listComments'))
    updaterComments(true)
    setInterval(updaterComments, 1000)

    formAjax($('.formComment'))

});

function updateComments(container) {
    const block = container
    let request
    return function (toBottom = false) {
        if (request) request.abort()
        request = $.ajax({
            dataType: 'html',
            type: 'POST',
            url: '/',
        })

        request.done(function (response, textStatus, jqXHR) {
            block.html(response)
            if (toBottom) block.animate({scrollTop: block.prop("scrollHeight")}, 1000)
        })

        request.fail(function (response, textStatus, jqXHR) {
            block.html(block.innerHTML + '<p style="line-height: 2;background: #dd5555; color: white">Проверьте подключение к интернету</p>')
        })
    }
}

function formAjax(toggle) {
    let request
    toggle.submit(function (event) {
        event.preventDefault()
        if (request) request.abort()

        const method = $(this).attr('method')
        const serializeData = $(this).serialize()
        const url = $(this).attr('action')

        request = $.ajax({
            dataType: 'json',
            type: method,
            url: url,
            data: serializeData
        })

        request.done(function (response, textStatus, jqXHR) {
            if (updaterComments) updaterComments(true)
            if (response.status) {
                $('.formComment__btnWrap')
                    .html('<div class="form__item form__item_success" style="margin-right: 15px;">' +
                        response.message +'</div>' + $('.formComment__btn', toggle)[0].outerHTML)
            } else {
                $('.formComment__btnWrap')
                    .html('<div class="form__item form__item_error" style="margin-right: 15px;" >' +
                        response.message + '</div>' + $('.formComment__btn', toggle)[0].outerHTML)
            }


        })

        request.fail(function (jqXHR, textStatus, errorThrown) {
            $('.formComment__btnWrap')
                .html('<div class="form__item form__item_error" style="margin-right: 15px;">' +
                    'Ошибка!</div>' + $('.formComment__btn', toggle)[0].outerHTML)
        })
    })
}