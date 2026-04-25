<?php

namespace Woodpecker\Support;
use Woodpecker\Support\NewMessageUpdate;
use Woodpecker\Support\InlineMessage;

class Api {
    private string $token;
    private string $apiBaseUrl = "https://botapi.rubika.ir/v3/";

    public function __construct(string $token) {
        if (empty($token)) {
            throw new InvalidArgumentException("Bot token cannot be empty.");
        }
        $this->token = $token;
    }

    private function callApi(string $method, array $params = []): ?array {
    $url = $this->apiBaseUrl . $this->token . '/' . $method;
    
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($params),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 3,                    
        CURLOPT_CONNECTTIMEOUT => 2,             
        CURLOPT_TCP_NODELAY => true,             
        CURLOPT_FORBID_REUSE => false,           
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Accept: application/json',
            'Connection: Keep-Alive',
            
        ],
        CURLOPT_SSL_VERIFYPEER => false,        
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_ENCODING => '',                  
    ]);
    
    $response = curl_exec($ch);
    
    if (curl_errno($ch)) {
        error_log("cURL Error: " . curl_error($ch));
        curl_close($ch);
        return null;
    }
    
    curl_close($ch);
    return json_decode($response, true);
}

    public function sendMessage(string $chatId, string $text, ?array $metadata = null, ?array $replyMarkup = null): ?array {
        $params = ['chat_id' => $chatId, 'text' => $text;
        if($metadata){
          $params['metadata'] = $metadata;
        }
        if ($replyMarkup) {
            $params['reply_markup'] = json_encode($replyMarkup); 
        }
        return $this->callApi('sendMessage', $params);
    }

    public function sendPhoto(string $chatId, string $photo, ?string $caption = null, ?array $replyMarkup = null): ?array {
        $params = ['chat_id' => $chatId, 'photo' => $photo];
        if ($caption) $params['caption'] = $caption;
        if ($replyMarkup) $params['reply_markup'] = json_encode($replyMarkup);
        return $this->callApi('sendPhoto', $params);
    }

    public function sendVideo(string $chatId, string $video, ?string $caption = null, ?array $replyMarkup = null): ?array {
        $params = ['chat_id' => $chatId, 'video' => $video];
        if ($caption) $params['caption'] = $caption;
        if ($replyMarkup) $params['reply_markup'] = json_encode($replyMarkup);
        return $this->callApi('sendVideo', $params);
    }

    public function sendDocument(string $chatId, string $document, ?string $caption = null, ?array $replyMarkup = null): ?array {
        $params = ['chat_id' => $chatId, 'document' => $document];
        if ($caption) $params['caption'] = $caption;
        if ($replyMarkup) $params['reply_markup'] = json_encode($replyMarkup);
        return $this->callApi('sendDocument', $params);
    }
    
    public function sendAudio(string $chatId, string $audio, ?string $caption = null, ?array $replyMarkup = null): ?array {
        $params = ['chat_id' => $chatId, 'audio' => $audio];
        if ($caption) $params['caption'] = $caption;
        if ($replyMarkup) $params['reply_markup'] = json_encode($replyMarkup);
        return $this->callApi('sendAudio', $params);
    }

    public function sendLocation(string $chatId, float $latitude, float $longitude, ?array $replyMarkup = null): ?array {
        $params = ['chat_id' => $chatId, 'latitude' => $latitude, 'longitude' => $longitude];
        if ($replyMarkup) $params['reply_markup'] = json_encode($replyMarkup);
        return $this->callApi('sendLocation', $params);
    }

    
    public function sendContact(string $chatId, string $phoneNumber, string $firstName, ?string $lastName = null, ?array $replyMarkup = null): ?array {
        $params = ['chat_id' => $chatId, 'phone_number' => $phoneNumber, 'first_name' => $firstName];
        if ($lastName) $params['last_name'] = $lastName;
        if ($replyMarkup) $params['reply_markup'] = json_encode($replyMarkup);
        return $this->callApi('sendContact', $params);
    }

    public function sendSticker(string $chatId, string $sticker, ?array $replyMarkup = null): ?array {
        $params = ['chat_id' => $chatId, 'sticker' => $sticker];
        if ($replyMarkup) $params['reply_markup'] = json_encode($replyMarkup);
        return $this->callApi('sendSticker', $params);
    }
    
    public function forwardMessage(string $from_chat_id, string $message_id, string $to_chat_id): ?array{
      return $this->callApi('forwardMessage', ['from_chat_id' => $from_chat_id, 'message_id' => $message_id, 'to_chat_id' => $to_chat_id]);
    }

    public function deleteMessage(string $chatId, string $messageId): ?array {
        return $this->callApi('deleteMessage', ['chat_id' => $chatId, 'message_id' => $messageId]);
    }

    public function editMessageText(string $chatId, string $messageId, string $text, ?array $replyMarkup = null): ?array {
        $params = ['chat_id' => $chatId, 'message_id' => $messageId, 'text' => $text];
        if ($replyMarkup) $params['reply_markup'] = json_encode($replyMarkup);
        return $this->callApi('editMessageText', $params);
    }

    public function deleteMessageReplyMarkup(string $chatId, string $messageId): ?array {
        return $this->callApi('deleteMessageReplyMarkup', ['chat_id' => $chatId, 'message_id' => $messageId]);
    }
    
    public static function generateReplyKeyboardMarkup(array $buttons, bool $resizeKeyboard = true, bool $oneTimeKeyboard = false): array {
        $keyboard = [];
        foreach ($buttons as $rowButtons) {
            $row = [];
            foreach ($rowButtons as $buttonText) {
                $row[] = ['text' => $buttonText];
            }
            $keyboard[] = $row;
        }
        return ['keyboard' => $keyboard, 'resize_keyboard' => $resizeKeyboard, 'one_time_keyboard' => $oneTimeKeyboard];
    }

    public static function generateInlineKeyboardMarkup(array $buttons): array {
        return ['inline_keyboard' => $buttons];
    }
    
    public static function generateInlineKeyboardButton(string $text, string $callbackData): array {
        return ['text' => $text, 'callback_data' => $callbackData];
    }
    
    public static function generateInlineUrlButton(string $text, string $url): array {
        return ['text' => $text, 'url' => $url];
    }

    public function getUpdates(?int $offset = null, int $limit = 100, int $timeout = 0): ?array {
        $params = ['limit' => $limit, 'timeout' => $timeout];
        if ($offset) {
            $params['offset'] = $offset;
        }
        return $this->callApi('getUpdates', $params);
    }
    
    public function banChatMember(string $chatId, string $user_id): ?array{
      $this->callApi('banChatMember', ['chat_id' => $chatId, 'user_id' => $user_id]);
    }
    
    public function unbanChatMember(string $chatId, string $user_id): ?array{
      $this->callApi('unbanChatMember', ['chat_id' => $chatId, 'user_id' => $user_id]);
    }

    public function processUpdate(array $update): ?Update {
        
        if (isset($update['update']['type'])) {
            switch ($update['update']['type']) {
                case 'NewMessage':
                    if (isset($update['update']['new_message'])) {
                      file_put_contents('hhs.txt', $update['update']['chat_id']);
                        return new NewMessageUpdate($update);
                    }
                    break;
                case 'InlineMessage':
                  return new InlineMessage($update);
                  break;
            }
        }
        return null;
    }
  
    public function processUpdates(array $updates): array {
        $processedUpdates = [];
        if (isset($updates['result'])) {
             $updates = $updates['result'];
        }
        foreach ($updates as $updateData) {
            $processed = $this->processUpdate($updateData);
            if ($processed) {
                $processedUpdates[] = $processed;
            }
        }
        return $processedUpdates;
    }

    public function getNextOffset(array $update): ?string {
         if (isset($update['update']['update_id'])) {
            return (string)((int)$update['update']['update_id'] + 1);
         }
         return null;
    }
}
?>
