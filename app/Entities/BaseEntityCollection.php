<?php
namespace App\Entities;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Support\Arrayable;
class BaseEntityCollection extends Collection implements Arrayable
{
    /*
    総検索数などのmeta情報を入れることを想定
    */
    public $meta;
    public function meta($data)
    {
        $this->meta = $data;
        return $this;
    }
    /*
    デフォルトのtoArray
    */
    public function toArray()
    {
        return array_map(function ($item) {
            return $item instanceof Arrayable ? $item->toArray() : null;
        }, $this->items);
    }
}