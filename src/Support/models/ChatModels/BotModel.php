<?php

namespace Woodpecker\Support\Models\ChatModels;

use Woodpecker\Support\Models\Model;

class Bot extends Model
{
    public ?string $bot_id = null;
    public ?string $bot_title = null;
    public ?File $avatar = null;
    public ?string $description = null;
    public ?string $username = null;
    public ?string $start_message = null;
    public ?string $share_url = null;

    public function fill(array $data): self
    {
        if (isset($data['avatar']) && is_array($data['avatar'])) {
            $data['avatar'] = new File($data['avatar']);
        }
        return parent::fill($data);
    }
}
