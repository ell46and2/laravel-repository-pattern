<?php

namespace App;

use App\Traits\Eloquent\HasLive;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
	use HasLive;

    protected $fillable = [
    	'title',
    	'slug',
    	'user_id'
    ];

    public function posts()
    {
    	return $this->hasMany(Post::class);
    }
}
