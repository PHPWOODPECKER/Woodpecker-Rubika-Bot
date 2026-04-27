<?php
namespace Woodpecker\Support\Models\MessageModels;

use Woodpecker\Support\Models\Model;

class ForwardedFrom extends Model
{
    public ?string $type_from = null;
    public ?string $message_id = null;
    public ?string $from_chat_id = null;
    public ?string $from_sender_id = null;
}