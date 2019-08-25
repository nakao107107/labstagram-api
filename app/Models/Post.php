<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'caption',
        'img_url',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    protected static function boot() 
    {
        parent::boot();
        static::deleting(function($model) {
            foreach ($model->likes()->get() as $child) {
                $child->delete();
            }
        });
        static::deleting(function($model) {
            foreach ($model->tags()->get() as $child) {
                $child->delete();
            }
        });
    }
}
