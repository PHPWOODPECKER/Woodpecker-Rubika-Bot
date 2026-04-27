<?php

namespace Woodpecker\Support\Models\ButtonModels;

use Woodpecker\Support\Models\Model;

class ButtonTextbox extends Model
{
    public ?string $type_line = null; 
    public ?string $type_keypad = null;
    public ?string $place_holder = null;
    public ?string $title = null;
    public ?string $default_value = null;
}