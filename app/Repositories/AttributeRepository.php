<?php


namespace App\Repositories;


use App\Contracts\AttributeContract;
use App\Models\Attribute;

class AttributeRepository extends BaseRepositories implements AttributeContract
{

    public function __construct($per_page = 10, array $filters = [
        \App\QueryFilter\Search::class
    ])
    {
        parent::__construct($per_page, $filters);
    }

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
        $a = $this->findOneById($id,[],[],['*'],['editable']);
        $a->update($data);
        return $a;
    }

    public function destroy($id)
    {
        $a = $this->findOneById($id,[],[],['*'],['editable']);
        return $a->delete();
    }
}
