<?php


namespace App\Repositories;


use App\Contracts\OrderContract;
use App\Models\Order;

class OrderRepository extends BaseRepositories implements OrderContract
{

    public function __construct($per_page = 10, array $filters = [
        \App\QueryFilter\Search::class
    ])
    {
        parent::__construct($per_page, $filters);
    }

    public function findOneById($id, array $relations = [], array $counts = [], array $columns = ['*'], array $scopes = [])
    {
        return Order::with($relations)->withCount($counts)->select($columns)->scopes($scopes)->findOrFail($id);
    }

    public function findOneBy(array $params, array $relations = [], array $counts = [], array $columns = ['*'], array $scopes = [])
    {
        return Order::with($relations)
            ->withCount($counts)
            ->select($columns)
            ->scopes($scopes)
            ->where($params)
            ->firstOrFail();
    }

    public function findBy(array $params, array $relations = [], array $counts = [], array $columns = ['*'], array $scopes = [])
    {
        $q = Order::with($relations)
            ->withCount($counts)
            ->select($columns)
            ->scopes($scopes)
            ->where($params)
            ->newQuery();
        return $this->applyFilter($q);
    }

    public function findByFilter(array $relations = [], array $counts = [], array $columns = ['*'], array $scopes = [])
    {
        $q = Order::with($relations)
            ->withCount($counts)
            ->select($columns)
            ->scopes($scopes)
            ->newQuery();
        return $this->applyFilter($q);
    }

    public function new(array $data)
    {
        return Order::create($data);
    }

    public function update($id, array $data)
    {
        $o = $this->findOneById($id);
        $o->update($data);
        return $o;
    }

    public function destroy($id)
    {
        return Order::destroy($id);
    }
}
