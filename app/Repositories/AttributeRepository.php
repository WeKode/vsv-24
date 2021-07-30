<?php


namespace App\Repositories;


use App\Contracts\AttributeContract;
use App\Models\Attribute;

class AttributeRepository extends BaseRepositories implements AttributeContract
{

    public function findOneById($id, array $relations = [], array $counts = [], array $columns = ['*'], array $scopes = [])
    {
        return Attribute::with($relations)->withCount($counts)->select($columns)->scopes($scopes)->findOrFail($id);
    }

    public function findOneBy(array $params, array $relations = [], array $counts = [], array $columns = ['*'], array $scopes = [])
    {
        return Attribute::with($relations)
            ->withCount($counts)
            ->select($columns)
            ->scopes($scopes)
            ->where($params)
            ->firstOrFail();
    }

    public function findBy(array $params, array $relations = [], array $counts = [], array $columns = ['*'], array $scopes = [])
    {
        $q = Attribute::with($relations)
            ->withCount($counts)
            ->select($columns)
            ->scopes($scopes)
            ->where($params)
            ->newQuery();
        return $this->applyFilter($q);
    }

    public function findByFilter(array $relations = [], array $counts = [], array $columns = ['*'], array $scopes = [])
    {
        $q = Attribute::with($relations)
            ->withCount($counts)
            ->select($columns)
            ->scopes($scopes)
            ->newQuery();
        return $this->applyFilter($q);
    }

    public function new(array $data)
    {
        return Attribute::create($data);
    }

    public function update($id, array $data)
    {
        $b = $this->findOneById($id);
        $b->update($data);
        return $b;
    }

    public function destroy($id)
    {
        return Attribute::destroy($id);
    }
}