<?php

namespace Woodpecker\Keypad;

use Woodpecker\Support\Models\ButtonModels\ButtonModel;

class Button extends ButtonModel
{
    public ?string $linkUrl;
    
    public function __construct(string $id = '', string $text = '', string $type = 'Simple')
    {
        $this->id = $id;
        $this->buttonText = $text;
        $this->type = $type;
    }
    
    public static function simple(string $id, string $text): self
    {
        return new self($id, $text, 'Simple');
    }
    
    public static function link(string $id, string $text, string $url): self
    {
        $button = new self($id, $text, 'Link');
        $button->linkUrl = $url;
        return $button;
    }
    
    public static function askPhone(string $id, string $text): self
    {
        return new self($id, $text, 'AskMyPhoneNumber');
    }
    
    public static function askLocation(string $id, string $text): self
    {
        return new self($id, $text, 'AskMyLocation');
    }
    
    public function get(): mixed
    {
        $data = [
            'id' => $this->id,
            'type' => $this->type,
            'button_text' => $this->buttonText,
        ];
        
        if ($this->type === 'Link' && $this->linkUrl) {
            $data['link_url'] = $this->linkUrl;
        }
        
        if (isset($data['buttonSelection'])) {
            $data['button_selection'] = null;
        }
        
        if (isset($data['buttonCalendar'])) {
            $data['button_calendar'] = null;
        }
        
        if (isset($data['buttonNumberPicker'])) {
            $data['button_number_picker'] = null;
        }
        
        if (isset($data['buttonStringPicker'])) {
            $data['button_string_picker'] = null;
        }
        
        if (isset($data['buttonLocation'])) {
            $data['button_location'] = null;
        }
        
        if (isset($data['buttonTextbox'])) {
            $data['button_textbox'] = null;
        }
        $data = parent::fill($data);
        return (array)$data->toArray();
    }
}