<?php

namespace LearnParty;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment',
        'user_id',
        'video_id',
    ];
    /**
     * A comment belongs to a video
     *
     * @return Object
     */
    public function video()
    {
        return $this->belongsTo('LearnParty\Video');
    }

    /**
     * A comment belongs to a user
     *
     * @return Object
     */
    public function user()
    {
        return $this->belongsTo('LearnParty\User');
    }
}
