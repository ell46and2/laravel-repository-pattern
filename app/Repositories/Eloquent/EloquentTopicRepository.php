<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\TopicRepository;
use App\Repositories\RepositoryAbstract;
use App\Topic;


class EloquentTopicRepository extends RepositoryAbstract implements TopicRepository
{
	public function entity()
	{
		return Topic::class;
	}
}