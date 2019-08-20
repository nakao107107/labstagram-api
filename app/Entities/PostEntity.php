<?php
namespace App\Entities;
use Illuminate\Contracts\Support\Arrayable;
class PostEntity implements Arrayable
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $caption;

    /**
     * @var string
     */
    public $img_url;
    /*


    /**
     * @var string
     */
    public $user_id;
    /*


    classを配列に変換
    */
    public function toArray()
    {
        return [
            'id'   => $this->id,
            'name' => $this->name,
            'img_url' => $this->img_url,
            'user_id' => $this->user_id
        ];
    }
}