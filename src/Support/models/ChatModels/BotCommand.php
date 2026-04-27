<?php
namespace Woodpecker\Support\Models\ChatModels;

use Woodpecker\Support\Models\Model;

class BotCommand extends Model
{
    public ?string $command = null;
    public ?string $description = null;
}