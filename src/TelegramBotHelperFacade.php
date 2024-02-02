<?php

namespace BlueSkies\TelegramBotHelper;

use Illuminate\Support\Facades\Facade;

/**
 * @see \BlueSkies\TelegramBotHelper\Skeleton\SkeletonClass
 */
class TelegramBotHelperFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'telegram-bot-helper';
    }
}
