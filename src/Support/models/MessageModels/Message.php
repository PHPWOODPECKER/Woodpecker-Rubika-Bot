<?php

namespace Woodpecker\Support\Models\MessageModels;

use Woodpecker\Support\Models\Model;

class Message extends Model
{
    public ?string $message_id = null;
    public ?string $text = null;
    public ?int $time = null;
    public ?bool $is_edited = null;
    public ?string $sender_type = null; 
    public ?string $sender_id = null;
    public ?AuxData $aux_data = null;
    public ?File $file = null;
    public ?string $reply_to_message_id = null;
    public ?ForwardedFrom $forwarded_from = null;
    public ?string $forwarded_no_link = null;
    public ?Location $location = null;
    public ?Sticker $sticker = null;
    public ?ContactMessage $contact_message = null;
    public ?Poll $poll = null;

    public function fill(array $data): self
    {
        if (isset($data['aux_data']) && is_array($data['aux_data'])) {
            $data['aux_data'] = new AuxData($data['aux_data']);
        }
        if (isset($data['file']) && is_array($data['file'])) {
            $data['file'] = new File($data['file']);
        }
        if (isset($data['forwarded_from']) && is_array($data['forwarded_from'])) {
            $data['forwarded_from'] = new ForwardedFrom($data['forwarded_from']);
        }
        if (isset($data['location']) && is_array($data['location'])) {
            $data['location'] = new Location($data['location']);
        }
        if (isset($data['sticker']) && is_array($data['sticker'])) {
            $data['sticker'] = new Sticker($data['sticker']);
        }
        if (isset($data['contact_message']) && is_array($data['contact_message'])) {
            $data['contact_message'] = new ContactMessage($data['contact_message']);
        }
        if (isset($data['poll']) && is_array($data['poll'])) {
            $data['poll'] = new Poll($data['poll']);
        }
        return parent::fill($data);
    }
}