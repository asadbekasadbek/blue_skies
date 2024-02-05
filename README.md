<p align="center"><a href="https://packagist.org/packages/blue_skies/telegram-bot-helper" target="_blank"><img src="https://th.bing.com/th/id/OIG1.MiCjSKP4d_YPKvgp.NoE?pid=ImgGn" style="width: 100%; height: 100%"></a></p>


# package blue skies telegram-bot-helper

<p align="center">
<a href="https://packagist.org/packages/blue_skies/telegram-bot-helper"><img alt="Static Badge" src="https://img.shields.io/badge/%20telegram-bot-helper"></a>
<a href="https://packagist.org/packages/blue_skies/telegram-bot-helper"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
<a href="https://packagist.org/packages/blue_skies/telegram-bot-helper">
<img src="https://img.shields.io/packagist/dt/blue_skies/telegram-bot-helper?style=flat-square" alt="Загрузки">
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
        self::SendTelegramMessage('chat_id','Test');
    }
}



```
```php
Route::post('/telegram/message',[\App\Http\Controllers\TestController::class,'index']);
```

<a style="font-size: 14pt " href="#sendmessage">#sendMessag</a><br/>
<a style="font-size: 14pt " href="#forwardmessage">#forwardMessag</a><br/>
<a style="font-size: 14pt " href="#forwardmessages">#forwardMessage</a><br/>
<a style="font-size: 14pt " href="#copymessage">#copyMessag</a><br/>
<a style="font-size: 14pt " href="#copymessages">#copyMessage</a><br/>
<a style="font-size: 14pt " href="#sendphoto">#sendPhot</a><br/>
<a style="font-size: 14pt " href="#sendaudio">#sendAudi</a><br/>
<a style="font-size: 14pt " href="#senddocument">#sendDocumen</a><br/>
<a style="font-size: 14pt " href="#sendvideo">#sendVide</a><br/>
<a style="font-size: 14pt " href="#sendanimation">#sendAnimatio</a><br/>
<a style="font-size: 14pt " href="#sendvoice">#sendVoic</a><br/>
<a style="font-size: 14pt " href="#sendvideonote">#sendVideoNot</a><br/>
<a style="font-size: 14pt " href="#sendmediagroup">#sendMediaGrou</a><br/>
<a style="font-size: 14pt " href="#sendlocation">#sendLocatio</a><br/>
<a style="font-size: 14pt " href="#sendvenue">#sendVenu</a><br/>
<a style="font-size: 14pt " href="#sendcontact">#sendContac</a><br/>
<a style="font-size: 14pt " href="#sendpoll">#sendPol</a><br/>
<a style="font-size: 14pt " href="#senddice">#sendDic</a><br/>
<a style="font-size: 14pt " href="#sendchataction">#sendChatActio</a><br/>
<a style="font-size: 14pt " href="#setmessagereaction">#setMessageReactio</a><br/>
<a style="font-size: 14pt " href="#getuserprofilephotos">#getUserProfilePhoto</a><br/>
<a style="font-size: 14pt " href="#getfile">#getFil</a><br/>
<a style="font-size: 14pt " href="#banchatmember">#banChatMembe</a><br/>
<a style="font-size: 14pt " href="#unbanchatmember">#unbanChatMembe</a><br/>
<a style="font-size: 14pt " href="#restrictchatmember">#restrictChatMembe</a><br/>
<a style="font-size: 14pt " href="#promotechatmember">#promoteChatMembe</a><br/>
<a style="font-size: 14pt " href="#setchatadministratorcustomTitle">#setChatAdministratorCustomTitl</a><br/>
<a style="font-size: 14pt " href="#banchatsenderchat">#banChatSenderCha</a><br/>
<a style="font-size: 14pt " href="#unbanchatsenderchat">#unbanChatSenderCha</a><br/>
<a style="font-size: 14pt " href="#setchatpermissions">#setChatPermission</a><br/>
<a style="font-size: 14pt " href="#exportchattnvitelink">#exportChatInviteLin</a><br/>
<a style="font-size: 14pt " href="#createchattnvitelink">#createChatInviteLin</a><br/>
<a style="font-size: 14pt " href="#editchatinvitelink">#editChatInviteLin</a><br/>
<a style="font-size: 14pt " href="#revokechatinvitelink">#revokeChatInviteLin</a><br/>
<a style="font-size: 14pt " href="#approvechatjoinrequest">#approveChatJoinReques</a><br/>
<a style="font-size: 14pt " href="#declinechatjoinrequest">#declineChatJoinReques</a><br/>
<a style="font-size: 14pt " href="#setchatphoto">#setChatPhot</a><br/>
<a style="font-size: 14pt " href="#deletechatphoto">#deleteChatPhot</a><br/>
<a style="font-size: 14pt " href="#setchattitle">#setChatTitl</a><br/>
<a style="font-size: 14pt " href="#setchatdescription">#setChatDescriptio</a><br/>
<a style="font-size: 14pt " href="#pinchatmessage">#pinChatMessag</a><br/>
<a style="font-size: 14pt " href="#unpinchatmessage">#unpinChatMessag</a><br/>
<a style="font-size: 14pt " href="#unpinallchatmessages">#unpinAllChatMessage</a><br/>
<a style="font-size: 14pt " href="#leavechat">#leaveCha</a><br/>
<a style="font-size: 14pt " href="#getchat">#getCha</a><br/>
<a style="font-size: 14pt " href="#getchatadministrators">#getChatAdministrator</a><br/>
<a style="font-size: 14pt " href="#getchatmembercount">#getChatMemberCoun</a><br/>
<a style="font-size: 14pt " href="#getchatmember">#getChatMembe</a><br/>
<a style="font-size: 14pt " href="#setchatstickerset">#setChatStickerSe</a><br/>
<a style="font-size: 14pt " href="#deletechatstickerset">#deleteChatStickerSe</a><br/>
<a style="font-size: 14pt " href="#getforumtopicIconstickers">#getForumTopicIconSticker</a><br/>
<a style="font-size: 14pt " href="#createforumtopic">#createForumTopi</a><br/>
<a style="font-size: 14pt " href="#editforumtopic">#editForumTopi</a><br/>
<a style="font-size: 14pt " href="#closeforumtopic">#closeForumTopi</a><br/>
<a style="font-size: 14pt " href="#reopenforumtopic">#reopenForumTopi</a><br/>
<a style="font-size: 14pt " href="#deleteforumtopic">#deleteForumTopi</a><br/>
<a style="font-size: 14pt " href="#unpinallforumtopicmessages">#unpinAllForumTopicMessage</a><br/>
<a style="font-size: 14pt " href="#editgeneralforumtopic">#editGeneralForumTopi</a><br/>
<a style="font-size: 14pt " href="#closegeneralforumtopic">#closeGeneralForumTopi</a><br/>
<a style="font-size: 14pt " href="#reopengeneralforumtopic">#reopenGeneralForumTopi</a><br/>
<a style="font-size: 14pt " href="#hidegeneralforumtopic">#hideGeneralForumTopi</a><br/>
<a style="font-size: 14pt " href="#unhidegeneralforumtopic">#unhideGeneralForumTopi</a><br/>
<a style="font-size: 14pt " href="#unpinallgeneralforumtopicmessages">#unpinAllGeneralForumTopicMessage</a><br/>
<a style="font-size: 14pt " href="#answercallbackquery">#answerCallbackQuer</a><br/>
<a style="font-size: 14pt " href="#getuserchatboosts">#getUserChatBoost</a><br/>
<a style="font-size: 14pt " href="#setmycommands">#setMyCommand</a><br/>
<a style="font-size: 14pt " href="#deletemycommands">#deleteMyCommand</a><br/>
<a style="font-size: 14pt " href="#getmycommands">#getMyCommand</a><br/>
<a style="font-size: 14pt " href="#setmyName">#setMyNam</a><br/>
<a style="font-size: 14pt " href="#getmyName">#getMyNam</a><br/>
<a style="font-size: 14pt " href="#setmydescription">#setMyDescriptio</a><br/>
<a style="font-size: 14pt " href="#getmydescription">#getMyDescriptio</a><br/>
<a style="font-size: 14pt " href="#setmyshortdescription">#setMyShortDescriptio</a><br/>
<a style="font-size: 14pt " href="#getmyshortdescription">#getMyShortDescriptio</a><br/>
<a style="font-size: 14pt " href="#setchatmenubutton">#setChatMenuButto</a><br/>
<a style="font-size: 14pt " href="#getchatMenubutton">#getChatMenuButto</a><br/>
<a style="font-size: 14pt " href="#setmydefaultadministratorrights">#setMyDefaultAdministratorRight</a><br/>
<a style="font-size: 14pt " href="#getmydefaultadministratorrights">#getMyDefaultAdministratorRight</a><br/>
<a style="font-size: 14pt " href="#editmessagetext">#editMessageText</a><br/>
<a style="font-size: 14pt " href="#editmessagecaption">#editMessageCaption</a><br/>
<a style="font-size: 14pt " href="#editmessagemedia">#editMessageMedia</a><br/>
<a style="font-size: 14pt " href="#editmessagelivelocation">#editMessageLiveLocation</a><br/>
<a style="font-size: 14pt " href="#stopmessageliveLocation">#stopMessageLiveLocation</a><br/>
<a style="font-size: 14pt " href="#editmessagereplymarkup">#editMessageReplyMarkup</a><br/>
<a style="font-size: 14pt " href="#stoppoll">#stopPoll</a><br/>
<a style="font-size: 14pt " href="#deletemessage">#deleteMessage</a><br/>
<a style="font-size: 14pt " href="#deletemessages">#deleteMessages</a><br/>
<a style="font-size: 14pt " href="#webhooks">#Webhooks</a><br/>



<div id="sendmessage"></div>

https://core.telegram.org/bots/api#sendmessage `sendMessage`
<br/>
SendTelegramMessage Parameters:

```php
   public static function SendTelegramMessage(
        int|string $chatId,
        string     $text,
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

<div id="forwardmessage"></div>

https://core.telegram.org/bots/api#forwardmessage `forwardMessage`
<br/>
SendTelegramMessage SendTelegramForwardMessage:

```php
 public static function SendTelegramForwardMessage(
        int|string $chatId,
        int        $messageThreadId = null,
        int|string $fromChatId = null,
        ?bool      $disableNotification = null,
        ?bool      $protectContent = null,
        int        $messageId
    ): JsonResponse
```

<div id="forwardmessages"></div>

https://core.telegram.org/bots/api#forwardmessages `forwardMessages`
<br/>
SendTelegramMessage SendTelegramForwardMessages:

```php
    public static function SendTelegramForwardMessages(
        int|string $chatId,
        int        $messageThreadId,
        int|string $fromChatId,
        array|int  $messageIds,
        bool       $disable_notification = false,
        bool       $protectContent = false
    ): JsonResponse
```

<div id="copymessage"></div>


https://core.telegram.org/bots/api#copymessage `copyMessage`
<br/>
SendTelegramMessage SendTelegramCopyMessage:

```php
      public static function SendTelegramCopyMessage(
        int|string $chatId,
        int        $messageThreadId,
        int|string $fromChatId,
        array|int  $messageIds,
        ?bool      $disable_notification = null,
        ?bool      $protectContent = null,
        ?bool      $removeCaption = null
    ): JsonResponse
```

<div id="copymessages"></div>

https://core.telegram.org/bots/api#copymessages `copyMessages`
<br/>
SendTelegramMessage SendTelegramCopyMessages:

```php
      public static function SendTelegramCopyMessages(
        int|string $chatId,
        int        $messageThreadId,
        int|string $fromChatId,
        array|int  $messageIds,
        ?bool      $disable_notification = null,
        ?bool      $protectContent = null,
        ?bool      $removeCaption = null
    ): JsonResponse
```

<div id="sendphoto"></div>


https://core.telegram.org/bots/api#sendphoto `sendPhoto`
<br/>
SendTelegramMessage SendTelegramPhoto:

```php
   public function SendTelegramPhoto(
        int|string $chatId,
        ?int       $messageThreadId = null,
        string     $photo,
        ?string    $caption = null,
        ?string    $parseMode = 'HTML',
        ?array     $captionEntities = null,
        bool       $hasSpoiler = null,
        bool       $disableNotification = null,
        ?bool      $protectContent = null,
                   $replyParameters = null,
                   $replyMarkup = null
    ): JsonResponse
```

<div id="sendaudio"></div>

https://core.telegram.org/bots/api#sendaudio `sendAudio`
<br/>
SendTelegramMessage SendTelegramAudio:

```php
      public static function SendTelegramAudio(
        int|string $chatId,
        ?int       $messageThreadId = null,
        string     $audio,
        ?string    $caption = null,
        ?string    $parseMode = 'HTML',
        ?array     $captionEntities = null,
        ?int       $duration = null,
        ?string    $performer = null,
        ?string    $title = null,
        ?string    $thumbnail = null,
        ?bool      $disableNotification = null,
        ?bool      $protectContent = null,
                   $replyParameters = null,
                   $replyMarkup = null
    ): JsonResponse
```

<div id="senddocument"></div>

https://core.telegram.org/bots/api#senddocument `sendDocument`
<br/>
SendTelegramDocument Parameters:

```php
      public static function SendTelegramDocument(
        int|string $chatId,
        ?int       $messageThreadId = null,
        string     $document,
        ?string    $thumbnail = null,
        ?string    $caption = null,
        ?string    $parseMode = 'HTML',
        ?array     $captionEntities = null,
        ?bool      $disableContentTypeDetection = null,
        ?bool      $disableNotification = null,
        ?bool      $protectContent = null,
        ?string    $title = null,


                   $replyParameters = null,
                   $replyMarkup = null
    ): JsonResponse
```
<div id="sendvideo"></div>

https://core.telegram.org/bots/api#sendvideo `sendVideo`
<br/>
SendTelegramVideo Parameters:

```php
    public static function SendTelegramVideo(
        int|string $chatId,
        ?int       $messageThreadId = null,
        string     $video,
        ?int       $duration = null,
        ?int       $width = null,
        ?int       $height = null,
        ?string    $thumbnail = null,
        ?string    $caption = null,
        ?string    $parseMode = 'HTML',
        ?array     $captionEntities = null,
        ?bool      $hasSpoiler = null,
        ?bool      $supportsStreaming = null,
        ?bool      $disableNotification = null,
        ?bool      $protectContent = null,
                   $replyParameters = null,
                   $replyMarkup = null,

    ): JsonResponse
```

<div id="sendanimation"></div>

https://core.telegram.org/bots/api#sendanimation `sendAnimation`
<br/>
SendTelegramAnimation Parameters:

```php
    public static function SendTelegramAnimation(
        int|string $chatId,
        ?int       $messageThreadId = null,
        string     $animation,
        ?int       $duration = null,
        ?int       $width = null,
        ?int       $height = null,
        ?string    $thumbnail = null,
        ?string    $caption = null,
        ?string    $parseMode = 'HTML',
        ?array     $captionEntities = null,
        ?bool      $hasSpoiler = null,
        ?bool      $disableNotification = null,
        ?bool      $protectContent = null,
                   $replyParameters = null,
                   $replyMarkup = null
    ): JsonResponse
```

<div id="sendvoice"></div>

https://core.telegram.org/bots/api#sendvoice `sendVoice`
<br/>
SendTelegramVoice Parameters:


```php
    public static function SendTelegramVoice(
        int|string $chatId,
        ?int       $messageThreadId = null,
        string     $voice,
        ?string    $caption = null,
        ?string    $parseMode = 'HTML',
        ?array     $captionEntities = null,
        ?int       $duration = null,
        ?bool      $disableNotification = null,
        ?bool      $protectContent = null,
                   $replyParameters = null,
                   $replyMarkup = null
    ): JsonResponse
```

<div id="sendvideoNote"></div>

https://core.telegram.org/bots/api#sendvideoNote `sendVideoNote`
<br/>
SendTelegramVideoNote Parameters:

```php
    public static function SendTelegramVideoNote(
        int|string $chatId,
        ?int       $messageThreadId = null,
        string     $videoNote,
        ?int       $duration = null,
        ?int       $length = null,
        ?int       $thumbnail = null,
        ?bool      $disableNotification = null,
        ?bool      $protectContent = null,
                   $replyParameters = null,
                   $replyMarkup = null
    ): JsonResponse
```

<div id="sendmediagroup"></div>

https://core.telegram.org/bots/api#sendmediagroup `sendMediaGroup`
<br/>
SendTelegramMediaGroup Parameters:

```php
    public static function SendTelegramMediaGroup(
        int|string $chatId,
        ?int       $messageThreadId = null,
        array      $media,
        ?bool      $disableNotification = null,
        ?bool      $protectContent = null,
        ?array     $captionEntities = null,
        ?bool      $supportsStreaming = null,
                   $replyParameters = null,
                   $replyMarkup = null,

    ): JsonResponse
```
<div id="sendlocation"></div>

https://core.telegram.org/bots/api#sendlocation `sendLocation`
<br/>
SendTelegramLocation Parameters:

```php
    public static function SendTelegramLocation(
        int|string $chatId,
        ?int       $messageThreadId = null,
        float      $latitude,
        float      $longitude,
        float      $horizontalAccuracy = null,
        float      $livePeriod = null,
        float      $heading = null,
        float      $proximityAlertRadius = null,
        ?bool      $disableNotification = null,
        ?bool      $protectContent = null,
                   $replyParameters = null,
                   $replyMarkup = null,
    ): JsonResponse
```
<div id="sendvenue"></div>


https://core.telegram.org/bots/api#sendvenue `sendVenue`
<br/>
SendTelegramVenue Parameters:

```php
    public static function SendTelegramVenue(
        int|string $chatId,
        ?int       $messageThreadId = null,
        float      $latitude,
        float      $longitude,
        string     $title,
        string     $address,

        ?string    $foursquareId = null,
        ?string    $foursquareType = null,
        ?string    $googlePlaceId = null,
        ?string    $googlePlaceType = null,
        ?bool      $disableNotification = null,
        ?bool      $protectContent = null,
                   $replyParameters = null,
                   $replyMarkup = null
    ): JsonResponse
```

<div id="sendcontact"></div>

https://core.telegram.org/bots/api#sendcontact `sendContact`
<br/>
SendTelegramContact Parameters:

```php
    public static function SendTelegramContact(
        int|string $chatId,
        ?int       $messageThreadId = null,
        string     $phoneNumber,
        string     $firstName,
        ?string    $lastName = null,
        ?string    $vcard = null,
        ?bool      $disableNotification = null,
        ?bool      $protectContent = null,
                   $replyParameters = null,
                   $replyMarkup = null
    ): JsonResponse
```

<div id="sendpoll"></div>
    
https://core.telegram.org/bots/api#sendpoll `sendPoll`
<br/>
SendTelegramPoll Parameters:

```php
    public static function SendTelegramPoll(
        int|string $chatId,
        ?int       $messageThreadId = null,
        string     $question,
        array      $options,
        ?bool      $isAnonymous = null,
        ?string    $type = null,
        ?bool      $allowsMultipleAnswers = null,
        ?int       $correctOptionId = null,
        ?string    $explanation = null,
        ?string    $explanationParseMode = null,
        ?array     $explanationEntities = null,
        ?int       $openPeriod = null,
        ?int       $closeDate = null,
        ?bool      $isClosed = null,
        ?bool      $disableNotification = null,
        ?bool      $protectContent = null,
                   $replyParameters = null,
                   $replyMarkup = null
    ): JsonResponse
```

<div id="senddice"></div>
    
https://core.telegram.org/bots/api#senddice `sendDice`
<br/>
SendTelegramDice Parameters:

```php
    public static function SendTelegramDice(
        int|string $chatId,
        ?int       $messageThreadId = null,
        string     $emoji,
        ?bool      $disableNotification = null,
        ?bool      $protectContent = null,
                   $replyParameters = null,
                   $replyMarkup = null
    ): JsonResponse
```

<div id="sendchataction"></div>
    
https://core.telegram.org/bots/api#sendchataction `sendChatAction`
<br/>
SendTelegramChatAction Parameters:

```php
    public static function SendTelegramChatAction(
        int|string $chatId,
        ?int       $messageThreadId = null,
        string     $action
    ): JsonResponse
```

<div id="setmessagereaction"></div>
    
https://core.telegram.org/bots/api#setmessagereaction `setMessageReaction`
<br/>
SendTelegramMessageReaction Parameters:
```php
    public static function SendTelegramMessageReaction(
        int|string $chatId,
        int        $messageId,
        ?array     $reaction = null,
        ?bool      $isBig = null,

    ): JsonResponse
```

<div id="getuserprofilephotos"></div>
    
https://core.telegram.org/bots/api#getuserprofilephotos `getUserProfilePhotos`
<br/>
getTelegramUserProfilePhotos Parameters:

```php
    public static function getTelegramUserProfilePhotos(
        int  $userId,
        ?int $offset = null,
        ?int $limit = null
    ): JsonResponse
```

<div id="getfile"></div>
   
https://core.telegram.org/bots/api#getfile `getFile`
<br/>
getTelegramFile Parameters:

```php
    public static function getTelegramFile(
        string $fileId,
    ): JsonResponse
```

<div id="banchatmember"></div>
    
https://core.telegram.org/bots/api#banchatmember `banChatMember`
<br/>
banTelegramChatMember Parameters:

```php
    public static function banTelegramChatMember(
        int|string $chatId,
        int        $userId,
        ?int       $untilDate = null,
        ?bool      $revokeMessages = null
    ): JsonResponse
```

<div id="unbanchatmember"></div>
   
https://core.telegram.org/bots/api#unbanchatmember `unbanChatMember`
<br/>
unbanTelegramChatMember Parameters:

```php
    public static function unbanTelegramChatMember(
        int|string $chatId,
        int        $userId,
        ?bool      $onlyIfBanned = null
    ): JsonResponse
```

<div id="restrictchatmember"></div>

https://core.telegram.org/bots/api#restrictchatmember `restrictChatMember`
<br/>
restrictTelegramChatMember Parameters:

```php
    public static function restrictTelegramChatMember(
        int|string $chatId,
        int        $userId,
        array      $permissions,
        ?bool      $useIndependentChatPermissions = null,
        ?int       $untilDate = null
    ): JsonResponse
```

<div id="promotechatmember"></div>
    
https://core.telegram.org/bots/api#promotechatmember `promoteChatMember`
<br/>
promoteTelegramChatMember Parameters:

```php
    public static function promoteTelegramChatMember(
        int|string $chatId,
        int        $userId,
        ?bool      $isAnonymous = null,
        ?bool      $canManageChat = null,
        ?bool      $canPostMessages = null,
        ?bool      $canEditMessages = null,
        ?bool      $canDeleteMessages = null,
        ?bool      $canManageVoiceChats = null,
        ?bool      $canRestrictMembers = null,
        ?bool      $canPromoteMembers = null,
        ?bool      $canChangeInfo = null,
        ?bool      $canInviteUsers = null,
        ?bool      $canPinMessages = null,
        ?bool      $canPostStories = null,
        ?bool      $canEditStories = null,
        ?bool      $canDeleteStories = null,
        ?bool      $canManageTopics = null,
    ): JsonResponse
```

<div id="setchatadministratorcustomtitle"></div>

https://core.telegram.org/bots/api#setchatadministratorcustomtitle `setChatAdministratorCustomTitle`
<br/>
setTelegramChatAdministratorCustomTitle Parameters:

```php
    public static function setTelegramChatAdministratorCustomTitle(
        int|string $chatId,
        int        $userId,
        string     $customTitle,
    ): JsonResponse
```

<div id="banchatsenderchat"></div>
   
https://core.telegram.org/bots/api#banchatsenderchat `banChatSenderChat`
<br/>
banTelegramChatSenderChat Parameters:

```php
    public static function banTelegramChatSenderChat(
        int|string $chatId,
        int        $senderChatId,
    ): JsonResponse
```

<div id="unbanchatsenderchat"></div>
    
https://core.telegram.org/bots/api#unbanchatsenderchat `unbanChatSenderChat`
<br/>
unbanTelegramChatSenderChat Parameters:
```php
    public static function unbanTelegramChatSenderChat(
        int|string $chatId,
        int        $senderChatId
    ): JsonResponse
```

<div id="setchatpermissions"></div>
   
https://core.telegram.org/bots/api#setchatpermissions `setChatPermissions`
<br/>
setTelegramChatPermissions Parameters:

```php
    public static function setTelegramChatPermissions(
        int|string $chatId,
        array      $permissions,
        ?bool      $useIndependentChatPermissions = null
    ): JsonResponse
```

<div id="exportchatinvitelink"></div>
   

https://core.telegram.org/bots/api#exportchatinvitelink `exportChatInviteLink`
<br/>
exportTelegramChatInviteLink Parameters:

```php
    public static function exportTelegramChatInviteLink(
        int|string $chatId,
    ): JsonResponse
```

<div id="createchatinvitelink"></div>
   
https://core.telegram.org/bots/api#createchatinvitelink `createChatInviteLink`
<br/>
createTelegramChatInviteLink Parameters:

```php
    public static function createTelegramChatInviteLink(
        int|string $chatId,
        ?string    $name = null,
        ?int       $expireDate = null,
        ?int       $memberLimit = null,
        ?bool      $createsJoinRequest = null
    ): JsonResponse
```

<div id="editchatinvitelink"></div>
   
https://core.telegram.org/bots/api#editchatinvitelink `editChatInviteLink`
<br/>
editTelegramChatInviteLink Parameters:

```php
    public static function editTelegramChatInviteLink(
        int|string $chatId,
        string     $inviteLink,
        ?string    $name = null,
        ?int       $expireDate = null,
        ?int       $memberLimit = null,
        ?bool      $createsJoinRequest = null
    ): JsonResponse
```

<div id="revokechatinvitelink"></div>
    
https://core.telegram.org/bots/api#revokechatinvitelink `revokeChatInviteLink`
<br/>
revokeTelegramChatInviteLink Parameters:

```php
    public static function revokeTelegramChatInviteLink(
        int|string $chatId,
        string     $inviteLink
    ): JsonResponse
```

<div id="approvechatjoinrequest"></div>
    

https://core.telegram.org/bots/api#approvechatjoinrequest `approveChatJoinRequest`
<br/>
approveTelegramChatJoinRequest Parameters:

```php
    public static function approveTelegramChatJoinRequest(
        int|string $chatId,
        int        $userId,
    ): JsonResponse
```

<div id="declinechatjoinrequest"></div>
    
https://core.telegram.org/bots/api#declinechatjoinrequest `declineChatJoinRequest`
<br/>
declineTelegramChatJoinRequest Parameters:

```php
    public static function declineTelegramChatJoinRequest(
        int|string $chatId,
        int        $userId,
    ): JsonResponse
```

<div id="setchatphoto"></div>
    

https://core.telegram.org/bots/api#setchatphoto `setChatPhoto`
<br/>
setTelegramChatPhoto Parameters:

```php
    public static function setTelegramChatPhoto(
        int|string $chatId,
        string     $photo,
    ): JsonResponse
```

<div id="deletechatphoto"></div>
   
https://core.telegram.org/bots/api#deletechatphoto `deleteChatPhoto`
<br/>
deleteTelegramChatPhoto Parameters:

```php
    public static function deleteTelegramChatPhoto(
        int|string $chatId,
    ): JsonResponse
```

<div id="setchattitle"></div>
    

https://core.telegram.org/bots/api#setchattitle `setChatTitle`
<br/>
setTelegramChatTitle Parameters:

```php
    public static function setTelegramChatTitle(
        int|string $chatId,
        string     $title,
    ): JsonResponse
```

<div id="setchatdescription"></div>
    

https://core.telegram.org/bots/api#setchatdescription `setChatDescription`
<br/>
setTelegramChatDescription Parameters:

```php
    public static function setTelegramChatDescription(
        int|string $chatId,
        string     $description,
    ): JsonResponse
```

<div id="pinchatmessage"></div>
    
https://core.telegram.org/bots/api#pinchatmessage `pinChatMessage`
<br/>
pinTelegramChatMessage Parameters:

```php
    public static function pinTelegramChatMessage(
        int|string $chatId,
        int        $messageId,
        ?bool      $disableNotification = null,
    ): JsonResponse
```

<div id="unpinchatmessage"></div>
   
https://core.telegram.org/bots/api#unpinchatmessage `unpinChatMessage`
<br/>
unpinTelegramChatMessage Parameters:

```php
    public static function unpinTelegramChatMessage(
        int|string $chatId,
        ?int       $messageId = null,
    ): JsonResponse
```

<div id="unpinallchatmessages"></div>
   

https://core.telegram.org/bots/api#unpinallchatmessages `unpinAllChatMessages`
<br/>
unpinAllTelegramChatMessages Parameters:

```php
    public static function unpinAllTelegramChatMessages(
        int|string $chatId,

    ): JsonResponse
```

<div id="leavechat"></div>
    
https://core.telegram.org/bots/api#leavechat `leaveChat`
<br/>
leaveTelegramChat Parameters:

```php
    public static function leaveTelegramChat(
        int|string $chatId,

    ): JsonResponse
```

<div id="getchat"></div>
    

https://core.telegram.org/bots/api#getchat `getChat`
<br/>
getTelegramChat Parameters:

```php
    public static function getTelegramChat(
        int|string $chatId,

    ): JsonResponse
```

<div id="getchatadministrators"></div>
    
https://core.telegram.org/bots/api#getchatadministrators `getChatAdministrators`
<br/>
getTelegramChatAdministrators Parameters:

```php
    public static function getTelegramChatAdministrators(
        int|string $chatId,

    ): JsonResponse
```

<div id="getchatmembercount"></div>
    
https://core.telegram.org/bots/api#getchatmembercount `getChatMemberCount`
<br/>
getTelegramChatMemberCount Parameters:

```php
    public static function getTelegramChatMemberCount(
        int|string $chatId,

    ): JsonResponse
```

<div id="getchatmember"></div>
    
https://core.telegram.org/bots/api#getchatmember `getChatMember`
<br/>
getTelegramChatMember Parameters:

```php
    public static function getTelegramChatMember(
        int|string $chatId,
        int        $userId

    ): JsonResponse
```

<div id="setchatstickerset"></div>
    
https://core.telegram.org/bots/api#setchatstickerset `setChatStickerSet`
<br/>
setTelegramChatStickerSet Parameters:

```php
    public static function setTelegramChatStickerSet(
        int|string $chatId,
        string     $stickerSetName

    ): JsonResponse
```

<div id="deletechatstickerset"></div>
   
https://core.telegram.org/bots/api#deletechatstickerset `deleteChatStickerSet`
<br/>
deleteTelegramChatStickerSet Parameters:

```php
    public static function deleteTelegramChatStickerSet(
        int|string $chatId,

    ): JsonResponse
```

<div id="createforumtopic"></div>
    
https://core.telegram.org/bots/api#createforumtopic `createForumTopic`
<br/>
createTelegramForumTopic Parameters:

```php
    public static function createTelegramForumTopic(
        int|string $chatId,
        string     $name,
        ?int       $iconColor = null,
        ?string    $iconCustomEmojiId = null
    ): JsonResponse
```

<div id="editforumtopic"></div>

https://core.telegram.org/bots/api#editforumtopic `editForumTopic`
<br/>
editTelegramForumTopic Parameters:

```php
    public static function editTelegramForumTopic(
        int|string $chatId,
        string     $name,
        int        $messageThreadId,
        ?int       $iconColor = null,
        ?string    $iconCustomEmojiId = null
    ): JsonResponse
```

<div id="closeforumtopic"></div>
    
https://core.telegram.org/bots/api#closeforumtopic `closeForumTopic`
<br/>
closeTelegramForumTopic Parameters:

```php
    public static function closeTelegramForumTopic(
        int|string $chatId,
        int        $messageThreadId
    ): JsonResponse
```

<div id="reopenforumtopic"></div>
   
https://core.telegram.org/bots/api#reopenforumtopic `reopenForumTopic`
<br/>
reopenTelegramForumTopic Parameters:

```php
    public static function reopenTelegramForumTopic(
        int|string $chatId,
        int        $messageThreadId
    ): JsonResponse
```

<div id="deleteforumtopic"></div>
    
https://core.telegram.org/bots/api#deleteforumtopic `deleteForumTopic`
<br/>
deleteTelegramForumTopic Parameters:

```php
    public static function deleteTelegramForumTopic(
        int|string $chatId,
        int        $messageThreadId
    ): JsonResponse
```

<div id="unpinallforumTopicmessages"></div>
   

https://core.telegram.org/bots/api#unpinallforumTopicmessages `unpinAllForumTopicMessages`
<br/>
unpinAllTelegramForumTopicMessages Parameters:

```php
    public static function unpinAllTelegramForumTopicMessages(
        int|string $chatId,
        int        $messageThreadId
    ): JsonResponse
```

<div id="editgeneralforumtopic"></div>
   
https://core.telegram.org/bots/api#editgeneralforumtopic `editGeneralForumTopic`
<br/>
editTelegramGeneralForumTopic Parameters:

```php
    public static function editTelegramGeneralForumTopic(
        int|string $chatId,
        int        $name
    ): JsonResponse
```

<div id="closegeneralforumtopic"></div>
    

https://core.telegram.org/bots/api#closegeneralforumtopic `closeGeneralForumTopic`
<br/>
closeTelegramGeneralForumTopic Parameters:

```php
    public static function closeTelegramGeneralForumTopic(
        int|string $chatId,
    ): JsonResponse
```

<div id="reopengeneralforumtopic"></div>
    
https://core.telegram.org/bots/api#reopengeneralforumtopic `reopenGeneralForumTopic`
<br/>
reopenTelegramGeneralForumTopic Parameters:

```php
    public static function reopenTelegramGeneralForumTopic(
        int|string $chatId,
    ): JsonResponse
```

<div id="hidegeneralforumtopic"></div>
   

https://core.telegram.org/bots/api#hidegeneralforumtopic `hideGeneralForumTopic`
<br/>
hideTelegramGeneralForumTopic Parameters:

```php
    public static function hideTelegramGeneralForumTopic(
        int|string $chatId,
    ): JsonResponse
```

<div id="unhidegeneralforumtopic"></div>
   

https://core.telegram.org/bots/api#unhidegeneralforumtopic `unhideGeneralForumTopic`
<br/>
unhideTelegramGeneralForumTopic Parameters:

```php
    public static function unhideTelegramGeneralForumTopic(
        int|string $chatId,
    ): JsonResponse
```

<div id="unpinallgeneralforumtopicmessages"></div>
   
https://core.telegram.org/bots/api#unpinallgeneralforumtopicmessages `unpinAllGeneralForumTopicMessages`
<br/>
unpinAllTelegramGeneralForumTopicMessages Parameters:

```php
    public static function unpinAllTelegramGeneralForumTopicMessages(
        int|string $chatId,
    ): JsonResponse
```

<div id="answercallbackquery"></div>
    

https://core.telegram.org/bots/api#answercallbackquery `answerCallbackQuery`
<br/>
answerTelegramCallbackQuery Parameters:

```php
    public static function answerTelegramCallbackQuery(
        string  $callbackQueryId,
        ?string $text = null,
        ?bool   $showAlert = null,
        ?string $urlTG = null,
        ?int    $cacheTime = 0
    ): JsonResponse
```

<div id="getuserchatboosts"></div>
   

https://core.telegram.org/bots/api#getuserchatboosts `getUserChatBoosts`
<br/>
getTelegramUserChatBoosts Parameters:

```php
    public static function getTelegramUserChatBoosts(
        int|string $chatId,
        int        $userId
    ): JsonResponse
```

<div id="setmycommands"></div>
    

https://core.telegram.org/bots/api#setmycommands `setMyCommands`
<br/>
setTelegramMyCommands Parameters:

```php
    public static function setTelegramMyCommands(
        int|string $chatId,
        array      $commands,
                   $scope = null,
        ?string    $language_code = null
    ): JsonResponse
```

<div id="deletemycommands"></div>
   

https://core.telegram.org/bots/api#deletemycommands `deleteMyCommands`
<br/>
deleteTelegramMyCommands Parameters:

```php
    public static function deleteTelegramMyCommands(
        int|string $chatId,
                   $scope = null,
        ?string    $language_code = null
    ): JsonResponse
```

<div id="getmycommands"></div>
   

https://core.telegram.org/bots/api#getmycommands `getMyCommands`
<br/>
getTelegramMyCommands Parameters:

```php
    public static function getTelegramMyCommands(
        int|string $chatId,
                   $scope = null,
        ?string    $language_code = null
    ): JsonResponse
```

<div id="setmyname"></div>

    
https://core.telegram.org/bots/api#setmyname `setMyName`
<br/>
setTelegramMyName Parameters:

```php
    public static function setTelegramMyName(
        int|string $chatId,
        ?string    $name = null,
        ?string    $language_code = null
    ): JsonResponse
```

<div id="getmyname"></div>
    

https://core.telegram.org/bots/api#getmyname `getMyName`
<br/>
getTelegramMyName Parameters:

```php
    public static function getTelegramMyName(
        int|string $chatId,
        ?string    $language_code = null
    ): JsonResponse
```


<div id="setmydescription"></div>
    

https://core.telegram.org/bots/api#setmydescription `setMyDescription`
<br/>
setTelegramMyDescription Parameters:

```php
    public static function setTelegramMyDescription(
        int|string $chatId,
        ?string    $description = null,
        ?string    $language_code = null
    ): JsonResponse
```

<div id="getmydescription"></div>
   
https://core.telegram.org/bots/api#getmydescription `getMyDescription`
<br/>
getTelegramMyDescription Parameters:

```php
    public static function getTelegramMyDescription(
        int|string $chatId,
        ?string    $language_code = null
    ): JsonResponse
```

<div id="setmyshortdescription"></div>
    
https://core.telegram.org/bots/api#setmyshortdescription `setMyShortDescription`
<br/>
setTelegramMyShortDescription Parameters:

```php
    public static function setTelegramMyShortDescription(
        int|string $chatId,
        ?string    $short_description = null,
        ?string    $language_code = null
    ): JsonResponse
```

<div id="getmyshortdescription"></div>
    

https://core.telegram.org/bots/api#getmyshortdescription `getMyShortDescription`
<br/>
getTelegramMyShortDescription Parameters:

```php
    public static function getTelegramMyShortDescription(
        int|string $chatId,
        ?string    $language_code = null
    ): JsonResponse
```

<div id="setchatmenubutton"></div>
    
https://core.telegram.org/bots/api#setchatmenubutton `setChatMenuButton`
<br/>
setTelegramChatMenuButton Parameters:

```php
    public static function setTelegramChatMenuButton(
        int|string $chatId,
        ?array     $menuButton = null,
        ?string    $language_code = null
    ): JsonResponse
```

<div id="setmydefaultadministratorrights"></div>
   
https://core.telegram.org/bots/api#setmydefaultadministratorrights `setMyDefaultAdministratorRights`
<br/>
setTelegramMyDefaultAdministratorRights Parameters:

```php
    public static function setTelegramMyDefaultAdministratorRights(
        int|string $chatId,
                   $rights = null,
        ?bool      $for_channels = null
    ): JsonResponse
```

<div id="getmydefaultadministratorrights"></div>

https://core.telegram.org/bots/api#getmydefaultadministratorrights `getMyDefaultAdministratorRights`
<br/>
getTelegramMyDefaultAdministratorRights Parameters:

```php
    public static function getTelegramMyDefaultAdministratorRights(
        int|string $chatId,
        ?bool      $for_channels = null
    ): JsonResponse
```

<div id="editmessagetext"></div>

https://core.telegram.org/bots/api#editmessagetext `editMessageText`
<br/>
editTelegramMessageText Parameters:

```php
    public static function editTelegramMessageText(
        int|string $chatId,
        ?int       $messageId = null,
        ?string    $inlineMessageId = null,
        string     $text,
        ?string    $parseMode = null,
        ?array     $entities = null,
                   $linkPreviewOptions = null,
                   $replyMarkup = null
    ): JsonResponse
```

<div id="editmessagecaption"></div>


https://core.telegram.org/bots/api#editmessagecaption `editMessageCaption`
<br/>
editTelegramMessageCaption Parameters:

```php
    public static function editTelegramMessageCaption(
        null|int|string $chatId = null,
        ?int            $messageId = null,
        ?string         $inlineMessageId = null,
        ?string         $caption = null,
        ?string         $parseMode = null,
        ?array          $captionEntities = null,
                        $replyMarkup = null
    ): JsonResponse
```

<div id="editmessagemedia"></div>
    
https://core.telegram.org/bots/api#editmessagemedia `editMessageMedia`
<br/>
editTelegramMessageMedia Parameters:

```php
    public static function editTelegramMessageMedia(
        int|string $chatId = null,
        ?int       $messageId = null,
        ?string    $inlineMessageId = null,
                   $media,
                   $replyMarkup = null
    ): JsonResponse
```

<div id="editmessagelivelocation"></div>
   
https://core.telegram.org/bots/api#editmessagelivelocation `editMessageLiveLocation`
<br/>
editTelegramMessageLiveLocation Parameters:

```php
    public static function editTelegramMessageLiveLocation(
        int|string $chatId = null,
        ?int       $messageId = null,
        ?string    $inlineMessageId = null,
        float      $latitude,
        float      $longitude,
        ?float     $horizontalAccuracy = null,
        ?int       $heading = null,
        ?int       $proximityAlertRadius = null,
                   $replyMarkup = null
    ): JsonResponse
```

<div id="stopmessagelivelocation"></div>
   

https://core.telegram.org/bots/api#stopmessagelivelocation `stopMessageLiveLocation`
<br/>
stopTelegramMessageLiveLocation Parameters:

```php
    public static function stopTelegramMessageLiveLocation(
        int|string $chatId = null,
        ?int       $messageId = null,
        ?string    $inlineMessageId = null,
                   $replyMarkup = null
    ): JsonResponse
```

<div id="editmessagereplymarkup"></div>
    
https://core.telegram.org/bots/api#editmessagereplymarkup `editMessageReplyMarkup`
<br/>
editTelegramMessageReplyMarkup Parameters:

```php
    public static function editTelegramMessageReplyMarkup(
        int|string $chatId = null,
        ?int       $messageId = null,
        ?string    $inlineMessageId = null,
                   $replyMarkup = null
    ): JsonResponse
```

<div id="stoppoll"></div>

    
https://core.telegram.org/bots/api#stoppoll `stopPoll`
<br/>
stopTelegramPoll Parameters:

```php
    public static function stopTelegramPoll(
        int|string $chatId = null,
        ?int       $messageId = null,
                   $replyMarkup = null
    ): JsonResponse
```

<div id="deletemessage"></div>
    
https://core.telegram.org/bots/api#deletemessage `deleteMessage`
<br/>
deleteTelegramMessage Parameters:

```php
    public static function deleteTelegramMessage(
        int|string $chatId,
        int        $messageId
    ): JsonResponse
```

<div id="deletemessages"></div>
   

https://core.telegram.org/bots/api#deletemessages `deleteMessages`
<br/>
deleteTelegramMessages Parameters:

```php
    public static function deleteTelegramMessages(
        int|string $chatId,
        array      $messageIds
    ): JsonResponse
```


<div id="sendmessage"></div>
   

https://core.telegram.org/bots/api#sendmessage `sendMessage`
<br/>
SendTelegramReply Parameters:

```php
    public static function SendTelegramReply(
    string $chatId, 
    string $message, 
    string $replyId, 
    string $parseMode = 'HTML'
    ): JsonResponse
```

<div id="deletemessage"></div>

https://core.telegram.org/bots/api#deletemessage `deleteMessage`
<br/>
SendDeleteTelegramMessage Parameters:

```php
    public static function SendDeleteTelegramMessage(
    string $chatId, 
    string $messageId, 
    ?int $seconds = 0
    ): JsonResponse
```

<div id="sendmessage"></div>
    
https://core.telegram.org/bots/api#sendmessage `sendMessage`
<br/>
SendTelegramMessageEntity Parameters:

```php
    public static function SendTelegramMessageEntity(
    string $chatId, 
    string $messageText, 
    array $entities
    ): JsonResponse
```

<div id="webhooks"></div>

# Webhooks

https://core.telegram.org/bots/webhooks
Telegram Bot API supports webhook. If you set webhook for your bot, Telegram will send updates to the specified url
## The fastest way
change it to yours `bot_token` `your_url`

putting this in the search bar

https://api.telegram.org/bot_token/setwebhook?url=your_url

#### example

`https://api.telegram.org/bot1310530208:AAHAKEpv_E9k3rWc09G7Z0rJVcKHGEBqo6c/setwebhook?url=https://example.com/api/telegram-bot/handle`

#### get the answer

```json
{"ok": true, "result" :true, "description": "Webhook is already set"}
```
#### create a controller

```bash
   php artisan make:controller TelegramWebhookController
```
#### add to `api.php` file
```php

Route::controller(\App\Http\Controllers\TelegramWebhookController::class)->group(function () {
    Route::post('/telegram-bot/handle', 'handle');
});
```
#### write in controller

```php
use BlueSkies\TelegramBotHelper\Traits\TelegramBotHelper;

class TelegramWebhookController extends Controller
{
    use TelegramBotHelper;
    public function handle(Request $request)
    {
        $bodyContent = $request->getContent();
        return self::SendTelegramMessage('chat_id',"<pre>$bodyContent</pre>");
    }
}
```

#### write a chat something








