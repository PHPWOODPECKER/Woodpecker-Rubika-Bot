<?php

namespace Woodpecker\Support\Models\ButtonModels;

use Woodpecker\Support\Models\Model;

class ButtonLocation extends Model
{
    public ?Location $default_pointer_location = null;
    public ?Location $default_map_location = null;
    public ?string $type = null; // ButtonLocationTypeEnum
    public ?string $title = null;

    public function fill(array $data): self
    {
        if (isset($data['default_pointer_location']) && is_array($data['default_pointer_location'])) {
            $data['default_pointer_location'] = new Location($data['default_pointer_location']);
        }
        if (isset($data['default_map_location']) && is_array($data['default_map_location'])) {
            $data['default_map_location'] = new Location($data['default_map_location']);
        }
        return parent::fill($data);
    }
}