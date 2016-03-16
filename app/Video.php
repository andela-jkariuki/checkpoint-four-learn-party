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
     * Get a list of categories associated with
     * this video
     *
     * @param  [type] $value [description]
     * @return array        Associated categories
     */
    public function getCategoryListAttribute()
    {
        return $this->categories()->lists('id')->toArray();
    }

    /**
     * A video belongs to many categories
     *
     * @return Object.
     */
    public function categories()
    {
        return $this->belongsToMany('LearnParty\Category')->withTimestamps();
    }

    /**
     * A video can have many comments.
     *
     * @return Object
     */
    public function comments()
    {
        return $this->hasMany('LearnParty\Comment');
    }

    /**
     * A video can have many favorites
     *
     * @return Object
     */
    public function favorites()
    {
        return $this->hasMany('LearnParty\Favorite');
    }
}
