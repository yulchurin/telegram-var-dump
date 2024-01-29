<?php

namespace Mactape\TgVarDumper;

use Illuminate\Contracts\Foundation\Application;
use JetBrains\PhpStorm\NoReturn;

class TelegramMessage
{
    #[NoReturn]
    public function dump(mixed $value, mixed ...$values): void
    {
        $backtrace = \debug_backtrace();
        $caller = \array_shift($backtrace);
        $file = $caller['file'];
        $line = $caller['line'];

        \ob_start();
        \var_dump($value, ...$values);
        $result = \ob_get_clean();
        $this->text("\nfile: _{$file}_ \nline: *$line* \n ```dump: \n$result \n```");

        exit('sent');
    }

    public function text(string $message): void
    {
        /** @var Application $app */
        $app = \app();

        $key  = $app['config']->get('tg-var-dump.key');
        $chat = $app['config']->get('tg-var-dump.chat');

        $params = [
            'chat_id' => (int) $chat,
            'text' => $message,
            'parse_mode' => 'markdown',
        ];

        $curl = curl_init("https://api.telegram.org/bot$key/sendMessage");

        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, ($params));
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_exec($curl);
        curl_close($curl);
    }
}
