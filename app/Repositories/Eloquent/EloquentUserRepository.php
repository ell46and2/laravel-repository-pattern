<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\UserRepository;
use App\Repositories\RepositoryAbstract;
use App\User;


class EloquentUserRepository extends RepositoryAbstract implements UserRepository
{
	public function entity()
	{
		return User::class;
	}
}