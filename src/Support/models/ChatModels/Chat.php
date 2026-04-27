<?php

namespace Woodpecker\Support\Models\ChatModels;

use Woodpecker\Support\Models\Model;

class Chat extends Model
{
    public ?string $chat_id = null;
    public ?string $chat_type = null;
    public ?string $user_id = null;
    public ?string $first_name = null;
    public ?string $last_name = null;
    public ?string $title = null;
    public ?string $username = null;
}