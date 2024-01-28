<?php

namespace Mactape\TgVarDumper\Facades;

use Illuminate\Support\Facades\Facade;
use Mactape\TgVarDumper\TelegramMessage;

/**
 * @method static void dump(mixed $value, mixed ...$values)
 * @method static void text(string $message)
 *
 * @see \Mactape\TgVarDumper\TelegramMessage
 */
class TgVarDump extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return TelegramMessage::class;
    }
}
