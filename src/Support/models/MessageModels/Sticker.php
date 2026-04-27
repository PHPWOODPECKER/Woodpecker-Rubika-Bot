<?php

namespace Woodpecker\Support\Models\MessageModels;

use Woodpecker\Support\Models\MessageModels\File;
use Woodpecker\Support\Models\Model;

class Sticker extends Model
{
    public ?string $sticker_id = null;
    public ?File $file = null;
    public ?string $emoji_character = null;

    public function fill(array $data): self
    {
        if (isset($data['file']) && is_array($data['file'])) {
            $data['file'] = new File($data['file']);
        }
        return parent::fill($data);
    }
}