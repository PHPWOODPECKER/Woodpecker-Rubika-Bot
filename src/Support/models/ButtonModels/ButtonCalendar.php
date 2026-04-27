<?php

namespace Woodpecker\Support\Models\ButtonModels;

use Woodpecker\Support\Models\Model;

class ButtonCalendar extends Model
{
    public ?string $default_value = null;
    public ?string $type = null;
    public ?string $min_year = null;
    public ?string $max_year = null;
    public ?string $title = null;
}