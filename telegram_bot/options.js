module.exports = {
    someOptions: {
        reply_markup: JSON.stringify({
            inline_keyboard: [
                [{text: 'Готов', callback_data: 'true'}],
                [{
                    text: 'Не готов', callback_data: 'false'
                }]
            ]
        })
    }
}