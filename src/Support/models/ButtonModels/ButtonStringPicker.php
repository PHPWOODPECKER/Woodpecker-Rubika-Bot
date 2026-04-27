<?php

namespace Woodpecker\Support\Models\ButtonModels;

use Woodpecker\Support\Models\Model;

class ButtonStringPicker extends Model
{
    public ?array $items = null;
    public ?string $default_value = null;
    public ?string $title = null;
}