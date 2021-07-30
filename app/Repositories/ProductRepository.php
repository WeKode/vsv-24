<?php


namespace App\Repositories;


use App\Models\Product;

class ProductRepository extends BaseRepositories implements \App\Contracts\ProductContract
{

    /**
     * @inheritDoc
     */
    public function findOneById($id, array $relations = [],array $counts = [], array $columns = ['*'], array $scopes = [])
    {
        return Product::with($relations)->select($columns)->scopes($scopes)->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function findByFilter(array $relations = [],array $counts = [], array $columns = ['*'], array $scopes = [])
    {
        $query = Product::with($relations)->select($columns)->scopes($scopes)->newQuery();
        return $this->applyFilter($query);
    }

    /**
     * @inheritDoc
     */
    public function new(array $data)
    {
        return Product::create($data);
    }

    /**
     * @inheritDoc
     */
    public function update($id, array $data)
    {
        $product = $this->findOneById($id);
        $product->update($data);
        return $product;
    }

    /**
     * @inheritDoc
     */
    public function destroy($id)
    {
        return Product::destroy($id);
    }

    public function findOneBy(array $params, array $relations = [],array $counts = [], array $columns = ['*'], array $scopes = [])
    {
        return Product::with($relations)->where($params)->select($columns)->scopes($scopes)->firstOrFail();
    }

    public function findBy(array $params, array $relations = [],array $counts = [], array $columns = ['*'], array $scopes = [])
    {
        $query = Product::with($relations)
            ->where($params)
            ->select($columns)
            ->scopes($scopes)
            ->newQuery();
        return $this->applyFilter($query);
    }
}
