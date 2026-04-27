<?php

namespace Woodpecker\Support\Models\ButtonModels;

use Woodpecker\Support\Models\Model;

class ButtonSelection extends Model
{
    public ?string $selection_id = null;
    public ?string $search_type = null;
    public ?string $get_type = null
    public ?array $items = null;
    public ?bool $is_multi_selection = null;
    public ?string $columns_count = null;
    public ?string $title = null;

    public function fill(array $data): self
    {
        if (isset($data['items']) && is_array($data['items'])) {
            $data['items'] = array_map(function ($item) {
                return $item instanceof ButtonSelectionItem ? $item : new ButtonSelectionItem($item);
            }, $data['items']);
        }
        return parent::fill($data);
    }
}