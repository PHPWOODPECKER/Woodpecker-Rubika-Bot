<?php

namespace Woodpecker\Support\Models\MessageModels;

use Woodpecker\Support\Models\Model;

class File extends Model
{
    public ?string $file_id = null;
    public ?string $file_name = null;
    public ?string $size = null;
}