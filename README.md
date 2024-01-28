### var_dump to telegram for Laravel

### Installation and configuration

`composer require mactape/telegram-var-dump`

> In the .env file you need to add these parameters:
> ```
> TELEGRAM_VAR_DUMP_KEY=your-telegram-bot-key
> TELEGRAM_VAR_DUMP_CHAT=your-telegram-user-id
> ```

- Talk to [@BotFather](https://core.telegram.org/bots#6-botfather) and generate a Bot API Token.
- Then, add your Telegram Bot API Token to .env file: \
`TELEGRAM_VAR_DUMP_KEY=your-bot-key`
- Talk to [@userinfobot](https://t.me/userinfobot) and find your chat id

> **The output data will look as follows:**
> 
> @your_telegram_nickname \
> **Id: YOUR_USER_ID** <- you need this number \
> First: Your Tg First Name \
> Last: Your Tg Last Name \
> Lang: en
- Then add your Telegram chat_id to .env file \
`TELEGRAM_VAR_DUMP_CHAT=your_user_id`

### Usage

```
TgVarDump::dump($something)
```
