<?php

namespace App\Traits\Eloquent;

use Illuminate\Database\Eloquent\Builder;

trait HasLive
{
	// scope created in trait, so live can be shared between multiple models.
	public function scopeLive(Builder $builder)
	{
		return $builder->where('live', true);
	}
}