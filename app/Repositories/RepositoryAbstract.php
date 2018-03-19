<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Criteria\CriteriaInterface;
use App\Repositories\Exceptions\NoEntityDefined;

abstract class RepositoryAbstract implements RepositoryInterface, CriteriaInterface
{
	protected $entity; // entity is the model

	public function __construct()
	{
	    $this->entity = $this->resolveEntity();
	}

	protected function resolveEntity()
	{
		if(!method_exists($this, 'entity')) {
			throw new NoEntityDefined();
		}

		// Will assign Topic Model to $this->entity
		return app()->make($this->entity());
	}

	public function all()
	{
		return $this->entity->get();
	}

	public function find($id)
	{
		return $this->entity->find($id);
	}

	public function findWhere($column, $value)
	{
		// use get to return collection
		return $this->entity->where($column, $value)->get(); 
	}

	public function findWhereFirst($column, $value)
	{
		return $this->entity->where($column, $value)->first(); 
	}

	public function paginate($perPage = 10)
	{
		return $this->entity->paginate($perPage);
	}

	public function create(array $properties)
	{
		return $this->entity->create($properties);
	}

	public function update($id, array $properties)
	{
		return $this->find($id)->update($properties);
	}

	public function delete($id)
	{
		return $this->find($id)->delete();
	}

	// (...$criteria) brings all parameters in as an array
	public function withCriteria(...$criteria)
	{
		// The array_flatten function flattens a multi-dimensional array into a single level array:
		$criteria = array_flatten($criteria);

		foreach ($criteria as $criterion) {
			$this->entity = $criterion->apply($this->entity);
		}

		return $this;
	}
}

