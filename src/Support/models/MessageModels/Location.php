<?php

namespace Woodpecker\Support\Models\MessageModels;

use Woodpecker\Support\Models\Model;

class Location extends Model
{
    public ?string $longitude = null;
    public ?string $latitude = null;
}