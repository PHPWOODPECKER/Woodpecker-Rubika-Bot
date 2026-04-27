<?php

namespace Woodpecker\Keypad;

class Keypad {
  
  public array $rows;
  public bool $resizeKeyboard;
  public bool $oneTimeKeyboard;

  
  public function __construct(array $buttons, bool $resizeKeyboard = true, bool $oneTimeKeyboard = false)
  {
    $this->rows = $this->buildRows($buttons);
    $this->resizeKeyboard = $resizeKeyboard;
    $this->oneTimeKeyboard = $oneTimeKeyboard;
  }
  
    protected function buildRows(array $rows): array
    {
      $result = [];
    
      foreach ($rows as $rowButtons) {
          $convertedRow = [];
          foreach ($rowButtons as $btn) {
              $newBtn = $btn;
              if (isset($newBtn['text'])) {
                  $newBtn['button_text'] = $newBtn['text'];
                  unset($newBtn['text']);
              }
              
              $convertedRow[] = $newBtn;
          }
          $result[] = ['buttons' => $convertedRow];
      }
     return $result;
  }
  
  
  public function toArray(): array
  {
    return [
    'rows' => $this->rows,
    
    'resize_keyboard' => $this->resizeKeyboard,
    
    'one_time_keyboard' => $this->oneTimeKeyboard
    ];
  }
  
  public function toJson(): string
  {
    
    return json_encode($this->toArray(), true);
  }
  
}