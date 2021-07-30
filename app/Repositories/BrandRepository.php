<?php


namespace App\Repositories;


use App\Contracts\BrandContract;
use App\Models\Brand;

class BrandRepository extends BaseRepositories implements BrandContract
{

    public function findOneById($id, array $relations = [], array $counts = [], array $columns = ['*'], array $scopes = [])
    {
        return Brand::with($relations)->withCount($counts)->select($columns)->scopes($scopes)->findOrFail($id);
    }

    public function findOneBy(array $params, array $relations = [], array $counts = [], array $columns = ['*'], array $scopes = [])
    {
        return Brand::with($relations)
            ->withCount($counts)
            ->select($columns)
            ->scopes($scopes)
            ->where($params)
            ->firstOrFail();
    }

    public function findBy(array $params, array $relations = [], array $counts = [], array $columns = ['*'], array $scopes = [])
    {
        $q = Brand::with($relations)
            ->withCount($counts)
            ->select($columns)
            ->scopes($scopes)
            ->where($params)
            ->newQuery();
        return $this->applyFilter($q);
    }

    public function findByFilter(array $relations = [], array $counts = [], array $columns = ['*'], array $scopes = [])
    {
        $q = Brand::with($relations)
            ->withCount($counts)
            ->select($columns)
            ->scopes($scopes)
            ->newQuery();
        return $this->applyFilter($q);
    }

    public function new(array $data)
    {
        return Brand::create($data);
    }

    public function update($id, array $data)
    {
        $b = $this->findOneById($id);
        $b->update($data);
        return $b;
    }

    public function destroy($id)
    {
        return Brand::destroy($id);
    }
}
