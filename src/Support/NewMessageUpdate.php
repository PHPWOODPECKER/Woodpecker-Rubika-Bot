<?php
namespace Woodpecker\Support;
use Woodpecker\Support\Update;

class NewMessageUpdate extends Update {
    private $data;
    
    public $type;
    public $chatId;
    public $messageId;
    public $text;
    public $time;
    public $isEdited;
    public $senderType;
    public $senderId;
    public $startId;
    public $buttonId;
    
    public function __construct($updateData) {
        $this->data = $updateData;
        
        $this->type = $updateData['type'] ?? null;
        $this->chatId = $updateData['chat_id'] ?? null;
        
        if (isset($updateData['new_message'])) {
            $newMessage = $updateData['new_message'];
            $this->messageId = $newMessage['message_id'] ?? null;
            $this->text = $newMessage['text'] ?? null;
            $this->time = $newMessage['time'] ?? null;
            $this->isEdited = $newMessage['is_edited'] ?? false;
            $this->senderType = $newMessage['sender_type'] ?? null;
            $this->senderId = $newMessage['sender_id'] ?? null;
            
            
            if (isset($newMessage['aux_data'])) {
                $this->startId = $newMessage['aux_data']['start_id'] ?? null;
                $this->buttonId = $newMessage['aux_data']['button_id'] ?? null;
            }
        }
    }
    
    public function isEdited() {
        return $this->isEdited === true;
    }
    
    public function hasButton() {
        return !empty($this->buttonId);
    }
    
    public function getText() {
        return $this->text;
    }
    
    public function getTime() {
        return $this->time;
    }
    
    public function getPersianDate() {
        if (!$this->time) return '';
        return date('Y/m/d H:i:s', $this->time);
    }
    
    public function toArray() {
        return [
            'type' => $this->type,
            'chat_id' => $this->chatId,
            'message_id' => $this->messageId,
            'text' => $this->text,
            'time' => $this->time,
            'is_edited' => $this->isEdited,
            'sender_type' => $this->senderType,
            'sender_id' => $this->senderId,
            'start_id' => $this->startId,
            'button_id' => $this->buttonId
        ];
    }
}

