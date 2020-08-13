<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tag',
        'feed_id',
    ];

}
