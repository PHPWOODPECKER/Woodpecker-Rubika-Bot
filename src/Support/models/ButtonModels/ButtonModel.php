<?php

namespace Woodpecker\Support\Models\ButtonModels;

use Woodpecker\Support\Models\Model;
use Woodpecker\Support\Models\ButtonModels\ButtonSelectionItem;
 use Woodpecker\Support\Models\ButtonModels\ButtonCalendar;
 use Woodpecker\Support\Models\ButtonModels\ButtonNumberPicker;
 use Woodpecker\Support\Models\ButtonModels\ButtonStringPicker;
 use Woodpecker\Support\Models\ButtonModels\ButtonLocation;
 use Woodpecker\Support\Models\ButtonModels\ButtonTextBox;

class ButtonModel extends Model
{
    public ?string $id = null;
    public ?string $type = null; 
    public ?string $button_text = null;
    public ?ButtonSelection $button_selection = null;
    public ?ButtonCalendar $button_calendar = null;
    public ?ButtonNumberPicker $button_number_picker = null;
    public ?ButtonStringPicker $button_string_picker = null;
    public ?ButtonLocation $button_location = null;
    public ?ButtonTextbox $button_textbox = null;

    public function fill(array $data): Model
    {
        if (isset($data['button_selection']) && is_array($data['button_selection'])) {
            $data['button_selection'] = new ButtonSelection($data['button_selection']);
        }
        if (isset($data['button_calendar']) && is_array($data['button_calendar'])) {
            $data['button_calendar'] = new ButtonCalendar($data['button_calendar']);
        }
        if (isset($data['button_number_picker']) && is_array($data['button_number_picker'])) {
            $data['button_number_picker'] = new ButtonNumberPicker($data['button_number_picker']);
        }
        if (isset($data['button_string_picker']) && is_array($data['button_string_picker'])) {
            $data['button_string_picker'] = new ButtonStringPicker($data['button_string_picker']);
        }
        if (isset($data['button_location']) && is_array($data['button_location'])) {
            $data['button_location'] = new ButtonLocation($data['button_location']);
        }
        if (isset($data['button_textbox']) && is_array($data['button_textbox'])) {
            $data['button_textbox'] = new ButtonTextbox($data['button_textbox']);
        }
        return parent::fill($data);
    }
}