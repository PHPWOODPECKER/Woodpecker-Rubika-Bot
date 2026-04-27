<?php

namespace Woodpecker\Support\Models\MessageModels;

use Woodpecker\Support\Models\Model;

class MessageTextUpdate extends Model
{
    public ?string $message_id = null;
    public ?string $text = null;
}