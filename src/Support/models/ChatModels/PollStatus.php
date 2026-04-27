<?php

namespace Woodpecker\Support\Models\ChatModels;

use Woodpecker\Support\Models\Model;

class PollStatus extends Model
{
    public ?string $state = null; 
    public ?int $selection_index = null;
    public ?array $percent_vote_options = null;
    public ?int $total_vote = null;
    public ?bool $show_total_votes = null;
}