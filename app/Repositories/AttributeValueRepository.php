<?php


namespace App\Repositories;


use App\Contracts\AttributeValueContract;
use App\Models\AttributeValue;

class AttributeValueRepository extends BaseRepositories implements AttributeValueContract
{

    public function __construct($per_page = 10, array $filters = [
        \App\QueryFilter\Search::class
    ])
    {
        parent::__construct($per_page, $filters);
    }

    public function findOneById($id, array $relations = [], array $counts = [], array $columns = ['*'], array $scopes = [])
    {
        return AttributeValue::with($relations)->withCount($counts)->select($columns)->scopes($scopes)->findOrFail($id);
    }

    public function findOneBy(array $params, array $relations = [], array $counts = [], array $columns = ['*'], array $scopes = [])
    {
        return AttributeValue::with($relations)
            ->withCount($counts)
            ->select($columns)
            ->scopes($scopes)
            ->where($params)
            ->firstOrFail();
    }

    public function findBy(array $params, array $relations = [], array $counts = [], array $columns = ['*'], array $scopes = [])
    {
        $q = AttributeValue::with($relations)
            ->withCount($counts)
            ->select($columns)
            ->scopes($scopes)
            ->where($params)
            ->newQuery();
        return $this->applyFilter($q);
    }

    public function findByFilter(array $relations = [], array $counts = [], array $columns = ['*'], array $scopes = [])
    {
        $q = AttributeValue::with($relations)
            ->withCount($counts)
            ->select($columns)
            ->scopes($scopes)
            ->newQuery();
        return $this->applyFilter($q);
    }

    public function new(array $data)
    {
        return AttributeValue::create($data);
    }

    public function update($id, array $data)
    {
        $b = $this->findOneById($id);
        $b->update($data);
        return $b;
    }

    public function destroy($id)
    {
        return AttributeValue::destroy($id);
    }
}
