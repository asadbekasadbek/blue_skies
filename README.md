<p align="center"><a href="https://packagist.org/packages/blue_skies/telegram-bot-helper" target="_blank"><img src="https://th.bing.com/th/id/OIG1.MiCjSKP4d_YPKvgp.NoE?pid=ImgGn" style="width: 100%; height: 100%"></a></p>


# package blue skies telegram-bot-helper

<p align="center">
<a href="https://packagist.org/packages/blue_skies/telegram-bot-helper"><img alt="Static Badge" src="https://img.shields.io/badge/%20telegram-bot-helper"></a>
<a href="https://packagist.org/packages/blue_skies/telegram-bot-helper"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
<a href="https://packagist.org/packages/blue_skies/telegram-bot-helper">
    <img alt="Github All Releases" src="https://img.shields.io/packagist/dt/blue_skies/telegram-bot-helper.svg?style=flat-square">
</a>
<a href="https://packagist.org/packages/blue_skies/telegram-bot-helper">
    <img alt="Latest Stable Version" src="https://img.shields.io/github/v/release/asadbekasadbek/blue_skies.svg">
</a>

# Installation

You can install the package via composer:

```bash
composer require blue_skies/telegram-bot-helper
```
# Quick start



open the `.env` file and add the Telegram bot token to it
```dotenv
TELEGRAM_BOT_TOKEN = telegram bot token 
```
```bash
 php artisan make:controller TestController 
```

```php
use BlueSkies\TelegramBotHelper\Traits\TelegramBotHelper;

class TestController extends Controller
{
    use TelegramBotHelper;
    public  function index()
    {
        self::SendTelegramMessage('991027867','Test');
    }
}



```
```php
Route::post('/telegram/message',[\App\Http\Controllers\TestController::class,'index']);
```


https://core.telegram.org/bots/api#sendmessage `sendMessage`
<br/>
SendTelegramMessage Parameters:
```php
public static function SendTelegramMessage(
        int|string $chatId,
        string     $message,
        ?string    $messageThreadId = null,
        string     $parseMode = 'HTML',
        ?array     $entities = null,
        ?bool      $disableNotification = null,
        ?bool      $protectContent = null,
                   $linkPreviewOptions = null,
                   $replyParameters = null,
                   $replyMarkup = null
    ): JsonResponse
```



## all methods are implemented

https://core.telegram.org/bots/api#available-methods

