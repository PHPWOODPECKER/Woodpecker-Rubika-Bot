<?php
namespace Woodpecker\Support;
use Woodpecker\Support\Update;

class InlineMessage extends Update {
    private $data;
    
    public $senderId;
    public $text;
    public $location;
    public $startId;
    public $buttonId;
    public $messageId;
    public $chatId;
    
    public function __construct($inlineData) {
        $this->data = $inlineData;
      
        $this->senderId = $inlineData['sender_id'] ?? null;
        $this->text = $inlineData['text'] ?? null;
        $this->location = $inlineData['location'] ?? null;
        $this->messageId = $inlineData['message_id'] ?? null;
        $this->chatId = $inlineData['chat_id'] ?? null;
        
        if (isset($inlineData['aux_data'])) {
            $this->startId = $inlineData['aux_data']['start_id'] ?? null;
            $this->buttonId = $inlineData['aux_data']['button_id'] ?? null;
        }
    }
    
    public function hasButton() {
        return !empty($this->buttonId);
    }
    
    public function hasLocation() {
        return !empty($this->location);
    }
    
    public function getText() {
        return $this->text;
    }
    
    public function getButtonId() {
        return $this->buttonId;
    }
    
    public function isEmpty() {
        return empty($this->text) && !$this->hasButton();
    }
    
    public function toArray() {
        return [
            'sender_id' => $this->senderId,
            'text' => $this->text,
            'location' => $this->location,
            'start_id' => $this->startId,
            'button_id' => $this->buttonId,
            'message_id' => $this->messageId,
            'chat_id' => $this->chatId
        ];
    }
    
    public function getCleanText() {
        if (!$this->text) return '';
        return trim($this->text);
    }
    
    public function contains($keyword) {
        return stripos($this->text, $keyword) !== false;
    }
}
