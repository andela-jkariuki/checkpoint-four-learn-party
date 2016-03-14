<?php

namespace LearnParty;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable  =[
        'title',
        'url',
        'description',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('LearnParty\User');
    }
}
