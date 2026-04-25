<?php

namespace Woodpecker\Core;
use Woodpecker\Support\Api;

class Bot {
  private $api;
  private $dataClass;
  
  public function __construct(string $token, array $data){
    $this->api = new Api($token);
    $this->dataClass = $this->api->processUpdate($data);
  }
  
  public function onText(string $text, callable $callback): void {
    
    if($this->dataClass->text == $text){
      $callback($this->api, $this->dataClass);
    }
    
  }
  
  public function onMessage(callable $callback): void 
  {
    $callback($this->api, $this->dataClass);
  }
}
