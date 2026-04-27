<?php

namespace Woodpecker\Support\Models\MessageModels;

use Woodpecker\Support\Models\Model;

class ContactMessage extends Model
{
    public ?string $phone_number = null;
    public ?string $first_name = null;
    public ?string $last_name = null;
}