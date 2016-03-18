<?php

namespace LearnParty;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = [
        'user_id',
        'video_id',
    ];

    /**
     * A favorite belongs to a specific user
     *
     * @return Object
     */
    public function user()
    {
        return $this->belongsTo('LearnParty\User');
    }

    /**
     * A favorite belongs to a specific video
     *
     * @return object
     */
    public function video()
    {
        return $this->belongsTo('LearnParty\Video');
    }
}
