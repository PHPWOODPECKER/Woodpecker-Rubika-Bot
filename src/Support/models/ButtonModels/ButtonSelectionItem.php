<?php

namespace Woodpecker\Support\Models\ButtonModels;

use Woodpecker\Support\Models\Model;

class ButtonSelectionItem extends Model
{
    public ?string $text = null;
    public ?string $image_url = null;
    public ?string $type = null;
}
