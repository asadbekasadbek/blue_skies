<?php

namespace BlueSkies\TelegramBotHelper\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

trait TelegramBotHelper
{
    private static function Url(string $type): string
    {
        $botToken = env('TELEGRAM_BOT_TOKEN');
        return "https://api.telegram.org/bot{$botToken}/$type";
    }


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
    {
        $params = [
            'chat_id' => $chatId,
            'text' => $message,
            'parse_mode' => $parseMode,
        ];

        // Add parameters if they are not null
        if (!is_null($messageThreadId)) {
            $params['message_thread_id'] = $messageThreadId;
        }

        if (!is_null($entities)) {
            $params['entities'] = $entities;
        }

        if (!is_null($disableNotification)) {
            $params['disable_notification'] = $disableNotification;
        }

        if (!is_null($protectContent)) {
            $params['protect_content'] = $protectContent;
        }

        if (!is_null($linkPreviewOptions)) {
            $params['link_preview_options'] = $linkPreviewOptions;
        }

        if (!is_null($replyParameters)) {
            $params['reply_parameters'] = $replyParameters;
        }

        if (!is_null($replyMarkup)) {
            $params['reply_markup'] = $replyMarkup;
        }

        $url = self::Url('sendMessage');
        $response = Http::post($url, $params)->json();
        return response()->json($response);
    }

    public static function SendTelegramForwardMessage(
        int|string $chatId,
        int        $messageThreadId = null,
        int|string $fromChatId = null,
        ?bool      $disableNotification = null,
        ?bool      $protectContent = null,
        int        $messageId
    ): JsonResponse
    {
        $url = self::Url('forwardMessage');
        $params = [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'from_chat_id' => $fromChatId
        ];

        // Add parameters if they are not null

        if ($disableNotification !== null) {
            $params['disable_notification'] = $disableNotification;
        }

        if ($protectContent !== null) {
            $params['protect_content'] = $protectContent;
        }

        if ($messageThreadId !== null) {
            $params['message_thread_id'] = $messageThreadId;
        }

        $response = Http::post($url, $params)->json();

        return response()->json($response);
    }


    public static function SendTelegramForwardMessages(
        int|string $chatId,
        int        $messageThreadId,
        int|string $fromChatId,
        array|int  $messageIds,
        bool       $disable_notification = false,
        bool       $protectContent = false
    ): JsonResponse
    {
        $url = self::Url('forwardMessages');
        $params = [
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
            'from_chat_id' => $fromChatId,
            'message_ids' => $messageIds,
            'disable_notification' => $disable_notification,
            'protect_content' => $protectContent
        ];

        $response = Http::post($url, $params)->json();

        return response()->json($response);
    }


    public static function SendTelegramCopyMessages(
        int|string $chatId,
        int        $messageThreadId,
        int|string $fromChatId,
        array|int  $messageIds,
        ?bool      $disable_notification = null,
        ?bool      $protectContent = null,
        ?bool      $removeCaption = null
    ): JsonResponse
    {
        $url = self::Url('copyMessages');
        $params = [
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
            'from_chat_id' => $fromChatId,
            'message_ids' => $messageIds,
        ];

        if ($disable_notification !== null) {
            $params['disable_notification'] = $disable_notification;
        }

        if ($protectContent !== null) {
            $params['protect_content'] = $protectContent;
        }

        if ($removeCaption !== null) {
            $params['remove_caption'] = $removeCaption;
        }

        $response = Http::post($url, $params)->json();

        return response()->json($response);
    }


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
    {
        $url = self::Url('sendPhoto');
        if (!filter_var($photo, FILTER_VALIDATE_URL)) {
            $photo = fopen($photo, 'r');
        }
        $params = [
            'chat_id' => $chatId,
            'parse_mode' => $parseMode,
            'photo' => $photo
        ];
        if ($caption !== null) {
            $params['caption'] = $caption;
        }
        if ($disableNotification !== null) {
            $params['disable_notification'] = $disableNotification;
        }

        if ($messageThreadId !== null) {
            $params['message_thread_id'] = $messageThreadId;
        }

        if ($protectContent !== null) {
            $params['protect_content'] = $protectContent;
        }

        if ($captionEntities !== null) {
            $params['caption_entities'] = json_encode($captionEntities);
        }

        if ($hasSpoiler !== null) {
            $params['has_spoiler'] = $hasSpoiler;
        }

        if ($replyParameters !== null) {
            $params['reply_parameters'] = $replyParameters;
        }

        if ($replyMarkup !== null) {
            $params['reply_markup'] = $replyMarkup;
        }

        $response = Http::asMultipart()->post($url, $params);


        return response()->json($response);
    }

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
    {
        $url = self::Url('sendAudio');

        if (!filter_var($audio, FILTER_VALIDATE_URL)) {
            $audio = fopen($audio, 'r');
        }

        $params = [
            'chat_id' => $chatId,
            'parse_mode' => $parseMode,
            'audio' => $audio,
        ];

        if ($caption !== null) {
            $params['caption'] = $caption;
        }

        if ($messageThreadId !== null) {
            $params['message_thread_id'] = $messageThreadId;
        }

        if ($captionEntities !== null) {
            $params['caption_entities'] = $captionEntities;
        }

        if ($duration !== null) {
            $params['duration'] = $duration;
        }

        if ($performer !== null) {
            $params['performer'] = $performer;
        }

        if ($title !== null) {
            $params['title'] = $title;
        }

        if ($thumbnail !== null) {
            if (!filter_var($thumbnail, FILTER_VALIDATE_URL)) {
                $thumbnail = fopen($thumbnail, 'r');
            }
            $params['thumbnail'] = $thumbnail;
        }

        if ($disableNotification !== null) {
            $params['disable_notification'] = $disableNotification;
        }

        if ($protectContent !== null) {
            $params['protect_content'] = $protectContent;
        }

        if ($replyParameters !== null) {
            $params['reply_parameters'] = $replyParameters;
        }

        if ($replyMarkup !== null) {
            $params['reply_markup'] = $replyMarkup;
        }

        $response = Http::asMultipart()->post($url, $params);


        return response()->json($response);

    }

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
    {
        $url = self::Url('sendDocument');

        if (!filter_var($document, FILTER_VALIDATE_URL)) {
            $document = fopen($document, 'r');
        }

        $params = [
            'chat_id' => $chatId,
            'parse_mode' => $parseMode,
            'document' => $document,
        ];

        if ($caption !== null) {
            $params['caption'] = $caption;
        }

        if ($messageThreadId !== null) {
            $params['message_thread_id'] = $messageThreadId;
        }

        if ($captionEntities !== null) {
            $params['caption_entities'] = $captionEntities;
        }

        if ($title !== null) {
            $params['title'] = $title;
        }

        if ($thumbnail !== null) {
            if (!filter_var($thumbnail, FILTER_VALIDATE_URL)) {
                $thumbnail = fopen($thumbnail, 'r');
            }
            $params['thumbnail'] = $thumbnail;
        }

        if ($disableNotification !== null) {
            $params['disable_notification'] = $disableNotification;
        }

        if ($protectContent !== null) {
            $params['protect_content'] = $protectContent;
        }

        if ($replyParameters !== null) {
            $params['reply_parameters'] = $replyParameters;
        }

        if ($replyMarkup !== null) {
            $params['reply_markup'] = $replyMarkup;
        }
        if ($disableContentTypeDetection !== null) {
            $params['disable_content_type_detection'] = $disableContentTypeDetection;
        }

        $response = Http::asMultipart()->post($url, $params);


        return response()->json($response);

    }

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
    {
        $url = self::Url('sendVideo');

        if (!filter_var($video, FILTER_VALIDATE_URL)) {
            $video = fopen($video, 'r');
        }

        $params = [
            'chat_id' => $chatId,
            'parse_mode' => $parseMode,
            'video' => $video,
        ];

        if ($caption !== null) {
            $params['caption'] = $caption;
        }

        if ($hasSpoiler !== null) {
            $params['has_spoiler'] = $hasSpoiler;
        }

        if ($supportsStreaming !== null) {
            $params['supports_streaming'] = $supportsStreaming;
        }


        if ($width !== null) {
            $params['width'] = $width;
        }

        if ($height !== null) {
            $params['caption'] = $height;
        }

        if ($messageThreadId !== null) {
            $params['message_thread_id'] = $messageThreadId;
        }

        if ($captionEntities !== null) {
            $params['caption_entities'] = $captionEntities;
        }

        if ($duration !== null) {
            $params['duration'] = $duration;
        }


        if ($thumbnail !== null) {
            if (!filter_var($thumbnail, FILTER_VALIDATE_URL)) {
                $thumbnail = fopen($thumbnail, 'r');
            }
            $params['thumbnail'] = $thumbnail;
        }

        if ($disableNotification !== null) {
            $params['disable_notification'] = $disableNotification;
        }

        if ($protectContent !== null) {
            $params['protect_content'] = $protectContent;
        }

        if ($replyParameters !== null) {
            $params['reply_parameters'] = $replyParameters;
        }

        if ($replyMarkup !== null) {
            $params['reply_markup'] = $replyMarkup;
        }

        $response = Http::asMultipart()->post($url, $params);


        return response()->json($response);

    }


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
    {
        $url = self::Url('sendVideo');

        if (!filter_var($animation, FILTER_VALIDATE_URL)) {
            $animation = fopen($animation, 'r');
        }

        $params = [
            'chat_id' => $chatId,
            'parse_mode' => $parseMode,
            'animation' => $animation,
        ];

        if ($caption !== null) {
            $params['caption'] = $caption;
        }

        if ($hasSpoiler !== null) {
            $params['has_spoiler'] = $hasSpoiler;
        }


        if ($width !== null) {
            $params['width'] = $width;
        }

        if ($height !== null) {
            $params['caption'] = $height;
        }

        if ($messageThreadId !== null) {
            $params['message_thread_id'] = $messageThreadId;
        }

        if ($captionEntities !== null) {
            $params['caption_entities'] = $captionEntities;
        }

        if ($duration !== null) {
            $params['duration'] = $duration;
        }

        if ($thumbnail !== null) {
            if (!filter_var($thumbnail, FILTER_VALIDATE_URL)) {
                $thumbnail = fopen($thumbnail, 'r');
            }
            $params['thumbnail'] = $thumbnail;
        }

        if ($disableNotification !== null) {
            $params['disable_notification'] = $disableNotification;
        }

        if ($protectContent !== null) {
            $params['protect_content'] = $protectContent;
        }

        if ($replyParameters !== null) {
            $params['reply_parameters'] = $replyParameters;
        }

        if ($replyMarkup !== null) {
            $params['reply_markup'] = $replyMarkup;
        }


        $response = Http::asMultipart()->post($url, $params);


        return response()->json($response);

    }


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
    {
        $url = self::Url('sendVoice');

        if (!filter_var($voice, FILTER_VALIDATE_URL)) {
            $voice = fopen($voice, 'r');
        }

        $params = [
            'chat_id' => $chatId,
            'parse_mode' => $parseMode,
            'voice' => $voice,
        ];

        if ($caption !== null) {
            $params['caption'] = $caption;
        }

        if ($messageThreadId !== null) {
            $params['message_thread_id'] = $messageThreadId;
        }

        if ($captionEntities !== null) {
            $params['caption_entities'] = $captionEntities;
        }

        if ($duration !== null) {
            $params['duration'] = $duration;
        }

        if ($disableNotification !== null) {
            $params['disable_notification'] = $disableNotification;
        }

        if ($protectContent !== null) {
            $params['protect_content'] = $protectContent;
        }

        if ($replyParameters !== null) {
            $params['reply_parameters'] = $replyParameters;
        }

        if ($replyMarkup !== null) {
            $params['reply_markup'] = $replyMarkup;
        }


        $response = Http::asMultipart()->post($url, $params);


        return response()->json($response);

    }


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
    {
        $url = self::Url('sendVideoNote');

        if (!filter_var($videoNote, FILTER_VALIDATE_URL)) {
            $videoNote = fopen($videoNote, 'r');
        }

        $params = [
            'chat_id' => $chatId,
            'video_note' => $videoNote,
        ];


        if ($length !== null) {
            $params['length'] = $length;
        }

        if ($thumbnail !== null) {
            if (!filter_var($thumbnail, FILTER_VALIDATE_URL)) {
                $thumbnail = fopen($thumbnail, 'r');
            }
            $params['thumbnail'] = $thumbnail;
        }

        if ($messageThreadId !== null) {
            $params['message_thread_id'] = $messageThreadId;
        }

        if ($duration !== null) {
            $params['duration'] = $duration;
        }

        if ($disableNotification !== null) {
            $params['disable_notification'] = $disableNotification;
        }

        if ($protectContent !== null) {
            $params['protect_content'] = $protectContent;
        }

        if ($replyParameters !== null) {
            $params['reply_parameters'] = $replyParameters;
        }

        if ($replyMarkup !== null) {
            $params['reply_markup'] = $replyMarkup;
        }


        $response = Http::asMultipart()->post($url, $params);


        return response()->json($response);

    }


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
    {
        $url = self::Url('sendMediaGroup');

        $params = [
            'chat_id' => $chatId,
            'media' => json_encode($media),
        ];

        if ($supportsStreaming !== null) {
            $params['supports_streaming'] = $supportsStreaming;
        }

        if ($messageThreadId !== null) {
            $params['message_thread_id'] = $messageThreadId;
        }

        if ($captionEntities !== null) {
            $params['caption_entities'] = $captionEntities;
        }

        if ($disableNotification !== null) {
            $params['disable_notification'] = $disableNotification;
        }

        if ($protectContent !== null) {
            $params['protect_content'] = $protectContent;
        }

        if ($replyParameters !== null) {
            $params['reply_parameters'] = $replyParameters;
        }

        if ($replyMarkup !== null) {
            $params['reply_markup'] = $replyMarkup;
        }

        $response = Http::asMultipart()->post($url, $params);


        return response()->json($response);

    }

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
    {
        $url = self::Url('sendMediaGroup');

        $params = [
            'chat_id' => $chatId,
            'latitude' => $latitude,
            'longitude' => $longitude,
        ];

        if ($messageThreadId !== null) {
            $params['message_thread_id'] = $messageThreadId;
        }

        if ($horizontalAccuracy !== null) {
            $params['horizontal_accuracy'] = $horizontalAccuracy;
        }

        if ($livePeriod !== null) {
            $params['live_period'] = $livePeriod;
        }

        if ($heading !== null) {
            $params['heading'] = $heading;
        }

        if ($proximityAlertRadius !== null) {
            $params['proximity_alert_radius'] = $proximityAlertRadius;
        }

        if ($disableNotification !== null) {
            $params['disable_notification'] = $disableNotification;
        }

        if ($protectContent !== null) {
            $params['protect_content'] = $protectContent;
        }

        if ($replyParameters !== null) {
            $params['reply_parameters'] = $replyParameters;
        }

        if ($replyMarkup !== null) {
            $params['reply_markup'] = $replyMarkup;
        }

        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }

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
    {
        $url = self::Url('sendVenue');
        $params = [
            'chat_id' => $chatId,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'title' => $title,
            'address' => $address
        ];

        if ($messageThreadId !== null) {
            $params['message_thread_id'] = $messageThreadId;
        }

        if ($foursquareId !== null) {
            $params['foursquare_id'] = $foursquareId;
        }

        if ($foursquareType !== null) {
            $params['foursquare_type'] = $foursquareType;
        }

        if ($googlePlaceId !== null) {
            $params['google_place_id'] = $googlePlaceId;
        }

        if ($googlePlaceType !== null) {
            $params['google_place_type'] = $googlePlaceType;
        }

        if ($disableNotification !== null) {
            $params['disable_notification'] = $disableNotification;
        }

        if ($protectContent !== null) {
            $params['protect_content'] = $protectContent;
        }

        if ($replyParameters !== null) {
            $params['reply_parameters'] = $replyParameters;
        }

        if ($replyMarkup !== null) {
            $params['reply_markup'] = $replyMarkup;
        }

        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }

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
    {
        $url = self::Url('sendContact');

        $params = [
            'chat_id' => $chatId,
            'phone_number' => $phoneNumber,
            'first_name' => $firstName
        ];

        if ($messageThreadId !== null) {
            $params['message_thread_id'] = $messageThreadId;
        }

        if ($lastName !== null) {
            $params['last_name'] = $lastName;
        }

        if ($vcard !== null) {
            $params['vcard'] = $vcard;
        }

        if ($disableNotification !== null) {
            $params['disable_notification'] = $disableNotification;
        }

        if ($protectContent !== null) {

            $params['protect_content'] = $protectContent;
        }

        if ($replyParameters !== null) {
            $params['reply_parameters'] = $replyParameters;
        }

        if ($replyMarkup !== null) {
            $params['reply_markup'] = $replyMarkup;
        }

        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }

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
    {

        // URL to send a poll
        $url = self::Url('sendPoll');

        // Parameters for sending a poll
        $params = [
            'chat_id' => $chatId,
            'question' => $question,
            'options' => $options,
            'is_anonymous' => $isAnonymous,
            'type' => $type,
            'allows_multiple_answers' => $allowsMultipleAnswers,
            'correct_option_id' => $correctOptionId,
        ];

        if ($messageThreadId !== null) {
            $params['message_thread_id'] = $messageThreadId;
        }

        if ($isAnonymous !== null) {
            $params['is_anonymous'] = $isAnonymous;
        }

        if ($type !== null) {
            $params['type'] = $type;
        }

        if ($allowsMultipleAnswers !== null) {
            $params['allows_multiple_answers'] = $allowsMultipleAnswers;
        }

        if ($correctOptionId !== null) {
            $params['correct_option_id'] = $correctOptionId;
        }

        if ($explanation !== null) {
            $params['explanation'] = $explanation;
        }

        if ($explanationParseMode !== null) {
            $params['explanation_parse_mode'] = $explanationParseMode;
        }

        if ($explanationEntities !== null) {
            $params['explanation_entities'] = $explanationEntities;
        }

        if ($openPeriod !== null) {
            $params['open_period'] = $openPeriod;
        }

        if ($closeDate !== null) {
            $params['close_date'] = $closeDate;
        }

        if ($isClosed !== null) {
            $params['is_closed'] = $isClosed;
        }

        if ($disableNotification !== null) {
            $params['disable_notification'] = $disableNotification;
        }

        if ($protectContent !== null) {
            $params['protect_content'] = $protectContent;
        }

        if ($replyParameters !== null) {
            $params['reply_parameters'] = $replyParameters;
        }

        if ($replyMarkup !== null) {
            $params['reply_markup'] = $replyMarkup;
        }

        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }

    public static function SendTelegramDice(
        int|string $chatId,
        ?int       $messageThreadId = null,
        string     $emoji,
        ?bool      $disableNotification = null,
        ?bool      $protectContent = null,
                   $replyParameters = null,
                   $replyMarkup = null
    ): JsonResponse
    {
        $url = self::Url('sendDice');
        $params = [
            'chat_id' => $chatId,
            'emoji' => $emoji
        ];

        if ($messageThreadId !== null) {
            $params['message_thread_id'] = $messageThreadId;
        }

        if ($disableNotification !== null) {
            $params['disable_notification'] = $disableNotification;
        }

        if ($protectContent !== null) {
            $params['protect_content'] = $protectContent;
        }

        if ($replyParameters !== null) {
            $params['reply_parameters'] = $replyParameters;
        }

        if ($replyMarkup !== null) {
            $params['reply_markup'] = $replyMarkup;
        }

        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }

    public static function SendTelegramChatAction(
        int|string $chatId,
        ?int       $messageThreadId = null,
        string     $action
    ): JsonResponse
    {
        $url = self::Url('sendChatAction');
        $params = [
            'chat_id' => $chatId,
            'action' => $action
        ];

        if ($messageThreadId !== null) {
            $params['message_thread_id'] = $messageThreadId;
        }

        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }

    public static function SendTelegramMessageReaction(
        int|string $chatId,
        int        $messageId,
        ?array     $reaction = null,
        ?bool      $isBig = null,

    ): JsonResponse
    {
        $url = self::Url('setMessageReaction');
        $params = [
            'chat_id' => $chatId,
            'message_id' => $messageId
        ];

        if ($reaction !== null) {
            $params['reaction'] = $reaction;
        }

        if ($isBig !== null) {
            $params['is_big'] = $isBig;
        }


        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }

    public static function getTelegramUserProfilePhotos(
        int  $userId,
        ?int $offset = null,
        ?int $limit = null
    ): JsonResponse
    {
        $url = self::Url('getUserProfilePhotos');
        $params = [
            'user_id' => $userId
        ];

        if ($offset !== null) {
            $params['offset'] = $offset;
        }

        if ($limit !== null) {
            if ($limit > 100) {
                $limit = 100;
            }
            $params['limit'] = $limit;
        }

        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }

    public static function getTelegramFile(
        string $fileId,
    ): JsonResponse
    {
        $url = self::Url('getFile');
        $params = [
            'file_id' => $fileId
        ];

        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }

    public static function banTelegramChatMember(
        int|string $chatId,
        int        $userId,
        ?int       $untilDate = null,
        ?bool      $revokeMessages = null
    ): JsonResponse
    {
        $url = self::Url('banChatMember');
        $params = [
            'chat_id' => $chatId,
            'user_id' => $userId
        ];

        if ($untilDate !== null) {
            $params['until_date'] = $untilDate;
        }

        if ($revokeMessages !== null) {
            $params['revoke_messages'] = $revokeMessages;
        }

        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }

    public static function unbanTelegramChatMember(
        int|string $chatId,
        int        $userId,
        ?bool      $onlyIfBanned = null
    ): JsonResponse
    {
        $url = self::Url('unbanChatMember');
        $params = [
            'chat_id' => $chatId,
            'user_id' => $userId
        ];

        if ($onlyIfBanned !== null) {
            $params['only_if_banned'] = $onlyIfBanned;
        }

        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }

    public static function restrictTelegramChatMember(
        int|string $chatId,
        int        $userId,
        array      $permissions,
        ?bool      $useIndependentChatPermissions = null,
        ?int       $untilDate = null
    ): JsonResponse
    {
        $url = self::Url('restrictChatMember');
        $params = [
            'chat_id' => $chatId,
            'user_id' => $userId,
            'permissions' => json_encode($permissions)
        ];

        if ($useIndependentChatPermissions !== null) {
            $params['use_independent_chat_permissions'] = filter_var($useIndependentChatPermissions, FILTER_VALIDATE_BOOLEAN);
        }

        if ($untilDate !== null) {
            if ($untilDate > time() + 30 && $untilDate < strtotime('+366 days', time())) {
                $params['until_date'] = filter_var($untilDate, FILTER_VALIDATE_INT);
            }
        }
        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }

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
    {
        $url = self::Url('promoteChatMember');
        $params = [
            'chat_id' => $chatId,
            'user_id' => $userId
        ];

        if ($isAnonymous !== null) {
            $params['is_anonymous'] = $isAnonymous;
        }

        if ($canManageChat !== null) {
            $params['can_manage_chat'] = $canManageChat;
        }

        if ($canPostMessages !== null) {
            $params['can_post_messages'] = $canPostMessages;
        }

        if ($canEditMessages !== null) {
            $params['can_edit_messages'] = $canEditMessages;
        }

        if ($canDeleteMessages !== null) {
            $params['can_delete_messages'] = $canDeleteMessages;
        }

        if ($canManageVoiceChats !== null) {
            $params['can_manage_voice_chats'] = $canManageVoiceChats;
        }

        if ($canRestrictMembers !== null) {
            $params['can_restrict_members'] = $canRestrictMembers;
        }

        if ($canPromoteMembers !== null) {
            $params['can_promote_members'] = $canPromoteMembers;
        }

        if ($canChangeInfo !== null) {
            $params['can_change_info'] = $canChangeInfo;
        }

        if ($canInviteUsers !== null) {
            $params['can_invite_users'] = $canInviteUsers;
        }

        if ($canPinMessages !== null) {
            $params['can_pin_messages'] = $canPinMessages;
        }

        if ($canPostStories !== null) {
            $params['can_post_stories'] = $canPostStories;
        }

        if ($canEditStories !== null) {
            $params['can_edit_stories'] = $canEditStories;
        }

        if ($canDeleteStories !== null) {
            $params['can_delete_stories'] = $canDeleteStories;
        }

        if ($canManageTopics !== null) {
            $params['can_manage_topics'] = $canManageTopics;
        }

        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }

    public static function setTelegramChatAdministratorCustomTitle(
        int|string $chatId,
        int        $userId,
        string     $customTitle,
    ): JsonResponse
    {
        $url = self::Url('setChatAdministratorCustomTitle');
        $params = [
            'chat_id' => $chatId,
            'user_id' => $userId,
            'custom_title' => $customTitle
        ];

        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }

    public static function banTelegramChatSenderChat(
        int|string $chatId,
        int        $senderChatId,
    ): JsonResponse
    {
        $url = self::Url('banChatSenderChat');
        $params = [
            'chat_id' => $chatId,
            'sender_chat_id' => $senderChatId
        ];


        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }

    public static function unbanTelegramChatSenderChat(
        int|string $chatId,
        int        $senderChatId
    ): JsonResponse
    {
        $url = self::Url('unbanChatSenderChat');
        $params = [
            'chat_id' => $chatId,
            'sender_chat_id' => $senderChatId
        ];

        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }

    public static function setTelegramChatPermissions(
        int|string $chatId,
        array      $permissions,
        ?bool      $useIndependentChatPermissions = null
    ): JsonResponse
    {
        $url = self::Url('setChatPermissions');
        $params = [
            'chat_id' => $chatId,
            'permissions' => json_encode($permissions)
        ];

        if ($useIndependentChatPermissions !== null) {
            $params['use_independent_chat_permissions'] = $useIndependentChatPermissions;
        }

        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }


    public static function exportTelegramChatInviteLink(
        int|string $chatId,
    ): JsonResponse
    {
        $url = self::Url('exportChatInviteLink');
        $params = [
            'chat_id' => $chatId,
        ];
        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }

    public static function createTelegramChatInviteLink(
        int|string $chatId,
        ?string    $name = null,
        ?int       $expireDate = null,
        ?int       $memberLimit = null,
        ?bool      $createsJoinRequest = null
    ): JsonResponse
    {
        $url = self::Url('createChatInviteLink');
        $params = [
            'chat_id' => $chatId
        ];

        if ($name !== null) {
            $params['name'] = $name;
        }

        if ($expireDate !== null) {
            $params['expire_date'] = $expireDate;
        }

        if ($memberLimit !== null) {
            if ($memberLimit > 99999) {
                $memberLimit = 99999;
            }
            $params['member_limit'] = $memberLimit;
        }

        if ($createsJoinRequest !== null) {

            $params['creates_join_request'] = $createsJoinRequest;
        }

        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }

    public static function editTelegramChatInviteLink(
        int|string $chatId,
        string     $inviteLink,
        ?string    $name = null,
        ?int       $expireDate = null,
        ?int       $memberLimit = null,
        ?bool      $createsJoinRequest = null
    ): JsonResponse
    {
        $url = self::Url('editChatInviteLink');
        $params = [
            'chat_id' => $chatId,
            'invite_link' => $inviteLink
        ];

        if ($name !== null) {
            $params['name'] = $name;
        }

        if ($expireDate !== null) {
            $params['expire_date'] = $expireDate;
        }

        if ($memberLimit !== null) {
            if ($memberLimit > 99999) {
                $memberLimit = 99999;
            }
            $params['member_limit'] = $memberLimit;
        }

        if ($createsJoinRequest !== null) {
            $params['creates_join_request'] = $createsJoinRequest;
        }

        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }

    public static function revokeTelegramChatInviteLink(
        int|string $chatId,
        string     $inviteLink
    ): JsonResponse
    {
        $url = self::Url('revokeChatInviteLink');
        $params = [
            'chat_id' => $chatId,
            'invite_link' => $inviteLink
        ];

        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }


    public static function approveTelegramChatJoinRequest(
        int|string $chatId,
        int        $userId,
    ): JsonResponse
    {
        $url = self::Url('approveChatJoinRequest');
        $params = [
            'chat_id' => $chatId,
            'user_id' => $userId
        ];

        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }

    public static function declineTelegramChatJoinRequest(
        int|string $chatId,
        int        $userId,
    ): JsonResponse
    {
        $url = self::Url('declineChatJoinRequest');
        $params = [
            'chat_id' => $chatId,
            'user_id' => $userId
        ];


        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }


    public static function setTelegramChatPhoto(
        int|string $chatId,
        string     $photo,
    ): JsonResponse
    {
        $url = self::Url('setChatPhoto');
        $photo = fopen($photo, 'r');
        $params = [
            'chat_id' => $chatId,
            'photo' => $photo
        ];


        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }

    public static function deleteTelegramChatPhoto(
        int|string $chatId,
    ): JsonResponse
    {
        $url = self::Url('deleteChatPhoto');
        $params = [
            'chat_id' => $chatId
        ];

        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }


    public static function setTelegramChatTitle(
        int|string $chatId,
        string     $title,
    ): JsonResponse
    {
        $url = self::Url('setChatTitle');
        $params = [
            'chat_id' => $chatId,
            'title' => $title
        ];


        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }


    public static function setTelegramChatDescription(
        int|string $chatId,
        string     $description,
    ): JsonResponse
    {
        $url = self::Url('setChatDescription');
        $params = [
            'chat_id' => $chatId,
            'description' => $description
        ];

        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }

    public static function pinTelegramChatMessage(
        int|string $chatId,
        int        $messageId,
        ?bool      $disableNotification = null,
    ): JsonResponse
    {
        $url = self::Url('pinChatMessage');
        $params = [
            'chat_id' => $chatId,
            'message_id' => $messageId
        ];

        if ($disableNotification !== null) {
            $params['disable_notification'] = $disableNotification;
        }

        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }

    public static function unpinTelegramChatMessage(
        int|string $chatId,
        ?int       $messageId = null,
    ): JsonResponse
    {
        $url = self::Url('unpinChatMessage');
        $params = [
            'chat_id' => $chatId
        ];

        if ($messageId !== null) {
            $params['message_id'] = $messageId;
        }


        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }


    public static function unpinAllTelegramChatMessages(
        int|string $chatId,

    ): JsonResponse
    {
        $url = self::Url('unpinAllChatMessages');
        $params = [
            'chat_id' => $chatId
        ];

        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }

    public static function leaveTelegramChat(
        int|string $chatId,

    ): JsonResponse
    {
        $url = self::Url('leaveChat');
        $params = [
            'chat_id' => $chatId
        ];


        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }


    public static function getTelegramChat(
        int|string $chatId,

    ): JsonResponse
    {
        $url = self::Url('getChat');
        $params = [
            'chat_id' => $chatId
        ];


        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }

    public static function getTelegramChatAdministrators(
        int|string $chatId,

    ): JsonResponse
    {
        $url = self::Url('getChatAdministrators');
        $params = [
            'chat_id' => $chatId
        ];


        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }

    public static function getTelegramChatMemberCount(
        int|string $chatId,

    ): JsonResponse
    {
        $url = self::Url('getChatMemberCount');
        $params = [
            'chat_id' => $chatId
        ];


        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }

    public static function getTelegramChatMember(
        int|string $chatId,
        int        $userId

    ): JsonResponse
    {
        $url = self::Url('getChatMember');
        $params = [
            'chat_id' => $chatId,
            'user_id' => $userId
        ];

        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }

    public static function setTelegramChatStickerSet(
        int|string $chatId,
        string     $stickerSetName

    ): JsonResponse
    {
        $url = self::Url('setChatStickerSet');
        $params = [
            'chat_id' => $chatId,
            'sticker_set_name' => $stickerSetName
        ];

        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }

    public static function deleteTelegramChatStickerSet(
        int|string $chatId,

    ): JsonResponse
    {
        $url = self::Url('deleteChatStickerSet');
        $params = [
            'chat_id' => $chatId,
        ];

        $response = Http::asMultipart()->post($url, $params);

        return response()->json($response);
    }

    public static function createTelegramForumTopic(
        int|string $chatId,
        string     $name,
        ?int       $iconColor = null,
        ?string    $iconCustomEmojiId = null
    ): JsonResponse
    {

        $url = self::Url('createForumTopic');

        $params = [
            'chat_id' => $chatId,
            'name' => $name
        ];

        if ($iconColor !== null) {
            $params['icon_color'] = $iconColor;
        }

        if ($iconCustomEmojiId !== null) {
            $params['icon_custom_emoji_id'] = $iconCustomEmojiId;
        }


        return response()->json(Http::asMultipart()->post($url, $params));

    }


    public static function editTelegramForumTopic(
        int|string $chatId,
        string     $name,
        int        $messageThreadId,
        ?int       $iconColor = null,
        ?string    $iconCustomEmojiId = null
    ): JsonResponse
    {

        $url = self::Url('editForumTopic');

        $params = [
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId
        ];


        if ($name !== null) {
            $params['name'] = $name;
        }

        if ($iconColor !== null) {
            $params['icon_color'] = $iconColor;
        }

        if ($iconCustomEmojiId !== null) {
            $params['icon_custom_emoji_id'] = $iconCustomEmojiId;
        }


        return response()->json(Http::asMultipart()->post($url, $params));

    }

    public static function closeTelegramForumTopic(
        int|string $chatId,
        int        $messageThreadId
    ): JsonResponse
    {

        $url = self::Url('closeForumTopic');

        $params = [
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId
        ];

        return response()->json(Http::asMultipart()->post($url, $params));
    }

    public static function reopenTelegramForumTopic(
        int|string $chatId,
        int        $messageThreadId
    ): JsonResponse
    {


        $url = self::Url('reopenForumTopic');

        $params = [
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId
        ];

        return response()->json(Http::asMultipart()->post($url, $params));
    }

    public static function deleteTelegramForumTopic(
        int|string $chatId,
        int        $messageThreadId
    ): JsonResponse
    {


        $url = self::Url('deleteForumTopic');

        $params = [
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId
        ];

        return response()->json(Http::asMultipart()->post($url, $params));
    }


    public static function unpinAllTelegramForumTopicMessages(
        int|string $chatId,
        int        $messageThreadId
    ): JsonResponse
    {

        $url = self::Url('unpinAllForumTopicMessages');

        $params = [
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId
        ];

        return response()->json(Http::asMultipart()->post($url, $params));
    }

    public static function editTelegramGeneralForumTopic(
        int|string $chatId,
        int        $name
    ): JsonResponse
    {

        $url = self::Url('editGeneralForumTopic');

        $params = [
            'chat_id' => $chatId,
            'name' => $name
        ];

        return response()->json(Http::asMultipart()->post($url, $params));
    }


    public static function closeTelegramGeneralForumTopic(
        int|string $chatId,
    ): JsonResponse
    {

        $url = self::Url('closeGeneralForumTopic');

        $params = [
            'chat_id' => $chatId,
        ];

        return response()->json(Http::asMultipart()->post($url, $params));
    }

    public static function reopenTelegramGeneralForumTopic(
        int|string $chatId,
    ): JsonResponse
    {

        $url = self::Url('reopenGeneralForumTopic');

        $params = [
            'chat_id' => $chatId,
        ];

        return response()->json(Http::asMultipart()->post($url, $params));
    }


    public static function hideTelegramGeneralForumTopic(
        int|string $chatId,
    ): JsonResponse
    {

        $url = self::Url('hideGeneralForumTopic');

        $params = [
            'chat_id' => $chatId,
        ];

        return response()->json(Http::asMultipart()->post($url, $params));
    }


    public static function unhideTelegramGeneralForumTopic(
        int|string $chatId,
    ): JsonResponse
    {

        $url = self::Url('unhideGeneralForumTopic');

        $params = [
            'chat_id' => $chatId,
        ];

        return response()->json(Http::asMultipart()->post($url, $params));
    }

    public static function unpinAllTelegramGeneralForumTopicMessages(
        int|string $chatId,
    ): JsonResponse
    {

        $url = self::Url('unpinAllGeneralForumTopicMessages');

        $params = [
            'chat_id' => $chatId,
        ];

        return response()->json(Http::asMultipart()->post($url, $params));
    }


    public static function answerTelegramCallbackQuery(
        string  $callbackQueryId,
        ?string $text = null,
        ?bool   $showAlert = null,
        ?string $urlTG = null,
        ?int    $cacheTime = 0
    ): JsonResponse
    {


        $url = self::Url('answerCallbackQuery');

        $params = [
            'callback_query_id' => $callbackQueryId
        ];

        if ($text !== null) {
            $params['text'] = $text;
        }

        if ($showAlert !== null) {
            $params['show_alert'] = $showAlert;
        }

        if ($urlTG !== null) {
            $params['url'] = $urlTG;
        }

        if ($cacheTime !== null) {
            $params['cache_time'] = $cacheTime;
        }

        return response()->json(Http::asMultipart()->post($url, $params));
    }


    public static function getTelegramUserChatBoosts(
        int|string $chatId,
        int        $userId
    ): JsonResponse
    {


        $url = self::Url('getUserChatBoosts');

        $params = [
            'chat_id' => $chatId,
            'user_id' => $userId
        ];

        return response()->json(Http::asMultipart()->post($url, $params));
    }


    public static function setTelegramMyCommands(
        int|string $chatId,
        array      $commands,
                   $scope = null,
        ?string    $language_code = null
    ): JsonResponse
    {


        $url = self::Url('setMyCommands');

        $params = [
            'chat_id' => $chatId,
            'commands' => json_encode($commands)
        ];

        if ($scope !== null) {
            $params['scope'] = json_encode($scope);
        }

        if ($language_code !== null) {
            $params['language_code'] = $language_code;
        }

        return response()->json(Http::asMultipart()->post($url, $params));
    }


    public static function deleteTelegramMyCommands(
        int|string $chatId,
                   $scope = null,
        ?string    $language_code = null
    ): JsonResponse
    {

        $url = self::Url('deleteMyCommands');

        $params = [
            'chat_id' => $chatId
        ];

        if ($scope !== null) {
            $params['scope'] = json_encode($scope);
        }

        if ($language_code !== null) {
            $params['language_code'] = $language_code;
        }

        return response()->json(Http::asMultipart()->post($url, $params));
    }


    public static function getTelegramMyCommands(
        int|string $chatId,
                   $scope = null,
        ?string    $language_code = null
    ): JsonResponse
    {


        $url = self::Url('getMyCommands');

        $params = [
            'chat_id' => $chatId
        ];

        if ($scope !== null) {
            $params['scope'] = json_encode($scope);
        }

        if ($language_code !== null) {
            $params['language_code'] = $language_code;
        }

        return response()->json(Http::asMultipart()->post($url, $params));
    }

    public static function setTelegramMyName(
        int|string $chatId,
        ?string    $name = null,
        ?string    $language_code = null
    ): JsonResponse
    {

        $url = self::Url('setMyName');

        $params = [
            'chat_id' => $chatId
        ];

        if ($name !== null) {
            $params['name'] = $name;
        }

        if ($language_code !== null) {
            $params['language_code'] = $language_code;
        }

        return response()->json(Http::asMultipart()->post($url, $params));
    }


    public static function getTelegramMyName(
        int|string $chatId,
        ?string    $language_code = null
    ): JsonResponse
    {

        $url = self::Url('getMyName');

        $params = [
            'chat_id' => $chatId
        ];

        if ($language_code !== null) {
            $params['language_code'] = $language_code;
        }

        return response()->json(Http::asMultipart()->post($url, $params));
    }


    public static function setTelegramMyDescription(
        int|string $chatId,
        ?string    $description = null,
        ?string    $language_code = null
    ): JsonResponse
    {


        $url = self::Url('setMyDescription');

        $params = [
            'chat_id' => $chatId
        ];

        if ($description !== null) {
            $params['description'] = $description;
        }

        if ($language_code !== null) {
            $params['language_code'] = $language_code;
        }

        return response()->json(Http::asMultipart()->post($url, $params));
    }

    public static function getTelegramMyDescription(
        int|string $chatId,
        ?string    $language_code = null
    ): JsonResponse
    {


        $url = self::Url('getMyDescription');

        $params = [
            'chat_id' => $chatId
        ];

        if ($language_code !== null) {
            $params['language_code'] = $language_code;
        }

        return response()->json(Http::asMultipart()->post($url, $params));
    }

    public static function setTelegramMyShortDescription(
        int|string $chatId,
        ?string    $short_description = null,
        ?string    $language_code = null
    ): JsonResponse
    {


        $url = self::Url('setMyShortDescription');

        $params = [
            'chat_id' => $chatId
        ];

        if ($short_description !== null) {
            $params['short_description'] = $short_description;
        }

        if ($language_code !== null) {
            $params['language_code'] = $language_code;
        }

        return response()->json(Http::asMultipart()->post($url, $params));
    }


    public static function getTelegramMyShortDescription(
        int|string $chatId,
        ?string    $language_code = null
    ): JsonResponse
    {


        $url = self::Url('getMyShortDescription');

        $params = [
            'chat_id' => $chatId
        ];

        if ($language_code !== null) {
            $params['language_code'] = $language_code;
        }

        return response()->json(Http::asMultipart()->post($url, $params));
    }

    public static function setTelegramChatMenuButton(
        int|string $chatId,
        ?array     $menuButton = null,
        ?string    $language_code = null
    ): JsonResponse
    {


        $url = self::Url('setChatMenuButton');

        $params = [
            'chat_id' => $chatId
        ];

        if ($menuButton !== null) {
            $params['menu_button'] = json_encode($menuButton);
        }

        if ($language_code !== null) {
            $params['language_code'] = $language_code;
        }

        return response()->json(Http::asMultipart()->post($url, $params));
    }

    public static function setTelegramMyDefaultAdministratorRights(
        int|string $chatId,
                   $rights = null,
        ?bool      $for_channels = null
    ): JsonResponse
    {


        $url = self::Url('setMyDefaultAdministratorRights');

        $params = [
            'chat_id' => $chatId
        ];

        if ($rights !== null) {
            $params['rights'] = json_encode($rights);
        }

        if ($for_channels !== null) {
            $params['for_channels'] = $for_channels;
        }

        return response()->json(Http::asMultipart()->post($url, $params));
    }


    public static function getTelegramMyDefaultAdministratorRights(
        int|string $chatId,
        ?bool      $for_channels = null
    ): JsonResponse
    {


        $url = self::Url('getMyDefaultAdministratorRights');

        $params = [
            'chat_id' => $chatId
        ];

        if ($for_channels !== null) {
            $params['for_channels'] = $for_channels;
        }

        return response()->json(Http::asMultipart()->post($url, $params));
    }


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
    {

        // URL of the API endpoint
        $url = self::Url('editMessageText');

        // Parameters array
        $params = [
            'chat_id' => $chatId,
            'text' => $text
        ];

        if ($messageId !== null) {
            $params['message_id'] = $messageId;
        }

        if ($inlineMessageId !== null) {
            $params['inline_message_id'] = $inlineMessageId;
        }

        if ($parseMode !== null) {
            $params['parse_mode'] = $parseMode;
        }

        if ($entities !== null) {
            $params['entities'] = $entities;
        }

        if ($linkPreviewOptions !== null) {
            $params['link_preview_options'] = $linkPreviewOptions;
        }

        if ($replyMarkup !== null) {
            $params['reply_markup'] = $replyMarkup;
        }

        // Send the request
        return response()->json(Http::asMultipart()->post($url, $params));
    }


    public static function editTelegramMessageCaption(
        null|int|string $chatId = null,
        ?int            $messageId = null,
        ?string         $inlineMessageId = null,
        ?string         $caption = null,
        ?string         $parseMode = null,
        ?array          $captionEntities = null,
                        $replyMarkup = null
    ): JsonResponse
    {

        // URL of the API endpoint
        $url = self::Url('editMessageCaption');

        // Parameters array
        $params = [];

        if ($chatId !== null) {
            $params['chat_id'] = $chatId;
        }

        if ($messageId !== null) {
            $params['message_id'] = $messageId;
        }

        if ($inlineMessageId !== null) {
            $params['inline_message_id'] = $inlineMessageId;
        }

        if ($caption !== null) {
            $params['caption'] = $caption;
        }

        if ($parseMode !== null) {
            $params ['parse_mode'] = $parseMode;
        }

        if ($captionEntities !== null) {
            $params ['caption_entities'] = $captionEntities;
        }

        if ($replyMarkup !== null) {
            $params ['reply_markup'] = $replyMarkup;
        }

        // Send the request
        return response()->json(Http::asMultipart()->post($url, $params));
    }

    public static function editTelegramMessageMedia(
        int|string $chatId = null,
        ?int       $messageId = null,
        ?string    $inlineMessageId = null,
                   $media,
                   $replyMarkup = null
    ): JsonResponse
    {

        // URL of the API endpoint
        $url = self::Url('editMessageMedia');

        // Parameters array
        $params = ['media' => json_encode($media)];

        // Check each parameter for non-null and add to params array
        if ($chatId !== null) {
            $params['chat_id'] = $chatId;
        }

        if ($messageId !== null) {
            $params['message_id'] = $messageId;
        }

        if ($inlineMessageId !== null) {
            $params['inline_message_id'] = $inlineMessageId;
        }

        if ($replyMarkup !== null) {
            $params['reply_markup'] = $replyMarkup;
        }

        // Send the request
        return response()->json(Http::asMultipart()->post($url, $params));
    }

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
    {


        $url = self::Url('editMessageLiveLocation');

        // Parameters array
        $params = [
            'latitude' => $latitude,
            'longitude' => $longitude
        ];

        if ($chatId !== null) {
            $params['chat_id'] = $chatId;
        }

        if ($messageId !== null) {
            $params['message_id'] = $messageId;
        }

        if ($inlineMessageId !== null) {
            $params['inline_message_id'] = $inlineMessageId;
        }

        if ($horizontalAccuracy !== null) {
            $params['horizontal_accuracy'] = $horizontalAccuracy;
        }

        if ($heading !== null) {
            $params['heading'] = $heading;
        }

        if ($proximityAlertRadius !== null) {
            $params['proximity_alert_radius'] = $proximityAlertRadius;
        }

        if ($replyMarkup !== null) {
            $params['reply_markup'] = json_encode($replyMarkup);
        }

        return response()->json(Http::asMultipart()->post($url, $params));

    }


    public static function stopTelegramMessageLiveLocation(
        int|string $chatId = null,
        ?int       $messageId = null,
        ?string    $inlineMessageId = null,
                   $replyMarkup = null
    ): JsonResponse
    {

        // URL of the API endpoint
        $url = self::Url('stopMessageLiveLocation');

        // Parameters array
        $params = [];

        // Check each parameter for non-null and add to params array
        if ($chatId !== null) {
            $params['chat_id'] = $chatId;
        }

        if ($messageId !== null) {
            $params['message_id'] = $messageId;
        }

        if ($inlineMessageId !== null) {
            $params['inline_message_id'] = $inlineMessageId;
        }

        if ($replyMarkup !== null) {
            $params['reply_markup'] = json_encode($replyMarkup);
        }

        // Send the request
        return response()->json(Http::asMultipart()->post($url, $params));
    }

    public static function editTelegramMessageReplyMarkup(
        int|string $chatId = null,
        ?int       $messageId = null,
        ?string    $inlineMessageId = null,
                   $replyMarkup = null
    ): JsonResponse
    {

        // URL of the API endpoint
        $url = self::Url('editMessageReplyMarkup');

        // Parameters array
        $params = [];

        // Check each parameter for non-null and add to params array
        if ($chatId !== null) {
            $params['chat_id'] = $chatId;
        }

        if ($messageId !== null) {
            $params['message_id'] = $messageId;
        }

        if ($inlineMessageId !== null) {
            $params['inline_message_id'] = $inlineMessageId;
        }

        if ($replyMarkup !== null) {
            $params['reply_markup'] = json_encode($replyMarkup);
        }

        // Send the request
        return response()->json(Http::asMultipart()->post($url, $params));
    }

    public static function stopTelegramPoll(
        int|string $chatId = null,
        ?int $messageId = null,
         $replyMarkup = null
    ): JsonResponse {

        // URL of the API endpoint
        $url = self::Url('stopPoll');

        // Parameters array
        $params = [];

        // Check each parameter for non-null and add to params array
        if ($chatId !== null) {
            $params['chat_id'] = $chatId;
        }

        if ($messageId !== null) {
            $params['message_id'] = $messageId;
        }

        if ($replyMarkup !== null) {
            $params['reply_markup'] = json_encode($replyMarkup);
        }

        // Send the request
        return response()->json(Http::asMultipart()->post($url, $params));
    }

    public static function deleteTelegramMessage(
        int|string $chatId ,
        int $messageId
    ): JsonResponse {

        // URL of the API endpoint
        $url = self::Url('deleteMessage');

        // Parameters array
        $params = [
            'chat_id' => $chatId,
            'message_id' => $messageId,
        ];


        // Send the request
        return response()->json(Http::asMultipart()->post($url, $params));
    }


    public static function deleteTelegramMessages(
        int|string $chatId,
        array $messageIds
    ): JsonResponse {
            $url = self::Url('deleteMessages');

            $params = [
                'chat_id' => $chatId,
                'message_ids' => $messageIds
            ];


            return response()->json(Http::asMultipart()->post($url, $params));
    }




    //<-- new up -->

    public static function SendTelegramReply(string $chatId, string $message, string $replyId, string $parseMode = 'HTML'): JsonResponse
    {
        $url = self::Url('sendMessage');
        $response = Http::post($url, [
            'chat_id' => $chatId,
            'text' => $message,
            'reply_to_message_id' => $replyId,
            'parse_mode' => $parseMode
        ])->json();
        return response()->json($response);

    }


    public static function SendDeleteTelegramMessage(string $chatId, string $messageId, ?int $seconds = 0): JsonResponse
    {
        $url = self::Url('deleteMessage');
        sleep($seconds);
        $response = Http::post($url, [
            'chat_id' => $chatId,
            'message_id' => $messageId
        ])->json();
        return response()->json($response);
    }

    public static function SendTelegramMessageEntity(string $chatId, string $messageText, array $entities): JsonResponse
    {
        $url = self::Url('sendMessage');
        $response = Http::post($url, [
            'chat_id' => $chatId,
            'text' => $messageText,
            'entities' => json_encode($entities),
        ]);
        return response()->json($response);
    }

}
