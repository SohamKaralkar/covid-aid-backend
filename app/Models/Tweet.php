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
}
