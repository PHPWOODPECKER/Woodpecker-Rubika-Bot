<?php

namespace Woodpecker\Support\Models;

abstract class Model
{
    public function __construct(array $data = [])
    {
        $this->fill($data);
    }

    public function fill(array $data): self
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
        return $this;
    }

    public function toArray(): array
    {
        $array = [];
        foreach (get_object_vars($this) as $key => $value) {
            if ($value instanceof Models) {
                $array[$key] = $value->toArray();
            } elseif (is_array($value)) {
                $array[$key] = array_map(function ($item) {
                    return $item instanceof Model? $item->toArray() : $item;
                }, $value);
            } else {
              if($value){
                $array[$key] = $value;
              }
            }
        }
        return $array;
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    public function __get($name)
    {
        return $this->$name ?? null;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}