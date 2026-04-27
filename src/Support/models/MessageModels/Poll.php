<?php

namespace Woodpecker\Support\Models\MessageModels;

use Woodpecker\Support\Models\CathModels\PollStatus;
use Woodpecker\Support\Models\Model;

class Poll extends Model
{
    public ?string $question = null;
    public ?array $options = null;
    public ?PollStatus $poll_status = null;

    public function fill(array $data): self
    {
        if (isset($data['poll_status']) && is_array($data['poll_status'])) {
            $data['poll_status'] = new PollStatus($data['poll_status']);
        }
        return parent::fill($data);
    }
}