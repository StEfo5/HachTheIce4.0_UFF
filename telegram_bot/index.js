const TelegramApi = require('node-telegram-bot-api')

const token = '5824203782:AAGfMMRUygCYl3hYL8-atmR9Y_1DqI4v95g'
const {someOptions} = require('./options.js')
const bot = new TelegramApi(token, { polling: true })


const start = () => {
    bot.setMyCommands([
        {
            command: '/start', description: 'Начать'
        },
        {
            command: '/info', description: 'Помощь'
        }
    ])

    bot.on('message', async msg => {
        const text = msg.text;
        const chatId = msg.chat.id;
        if (text === "/start") {
            await bot.sendMessage(chatId, 'Добро пожаловать в телеграм бот Lean Event!')
        }

        return bot.sendMessage(chatId, "Я тебя не понимать", someOptions)
    })

    bot.on('callback_query', msg => {
        const data = msg.data;
        const chatId = msg.message.chat.id;

        bot.sendMessage(chatId, "Спасибо за ответ!")
        return console.log(msg)
    })
}

start();