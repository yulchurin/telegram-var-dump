<?php

namespace Mactape\TgVarDumper\Facades;

use Illuminate\Support\Facades\Facade;
use Mactape\TgVarDumper\TelegramMessage;

/**
 * @method static void dump(mixed $variable)
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
