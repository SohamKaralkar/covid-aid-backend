<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    protected $fillable = ["content", "is_verified", "tweeted_time", "location_id", "resource_id"];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function tweet_attachments()
    {
        return $this->hasMany(TweetAttachment::class);
    }

    public function tweet_upvotes()
    {
        return $this->hasMany(TweetUpvote::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function isVerified()
    {
        return $this->is_verified == 1 ? true : false;
    }

    public function upvotesCount()
    {
        return sizeof($this->tweet_upvotes);
    }
}
