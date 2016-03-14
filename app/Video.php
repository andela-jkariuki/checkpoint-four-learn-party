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

    /**
     * A video belongs to one user.
     *
     * @return Object
     */
    public function user()
    {
        return $this->belongsTo('LearnParty\User');
    }

    /**
     * A video belongs to many categories
     *
     * @return Object.
     */
    public function categories()
    {
        return $this->belongsToMany('LearnParty\Category');
    }
}
