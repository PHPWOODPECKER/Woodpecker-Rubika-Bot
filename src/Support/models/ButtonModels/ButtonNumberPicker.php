<?php

namespace Woodpecker\Support\Models\ButtonModels;

use Woodpecker\Support\Models\Model;

class ButtonNumberPicker extends Model
{
    public ?string $min_value = null;
    public ?string $max_value = null;
    public ?string $default_value = null;
    public ?string $title = null;
}