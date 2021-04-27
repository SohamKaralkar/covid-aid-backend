<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TweetAttachment extends Model
{
    use HasFactory;

    protected $fillable = ["tweet_id", "url"];

    public function tweet()
    {
        return $this->belongsTo(Tweet::class);
    }
}
