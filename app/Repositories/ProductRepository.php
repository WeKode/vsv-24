<?php


namespace App\Repositories;


use App\Models\Product;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;

class ProductRepository extends BaseRepositories implements \App\Contracts\ProductContract
{

    use UploadAble;

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
        $product = Product::create($data);

        if (array_key_exists('images',$data))
        {
            foreach ($data['images'] as $image)
            {
                if ($image instanceof UploadedFile)
                {
                    $link = $this->uploadOne($image, 'products');
                    $product->images()->create([
                        'link' => $link
                    ]);
                }
            }
        }

        return $product;
    }

    /**
     * @inheritDoc
     */
    public function update($id, array $data)
    {
        $product = $this->findOneById($id);
        $product->update($data);

        if (array_key_exists('images',$data))
        {
            foreach ($product->images as $i)
            {
                if ($i->link)
                {
                    $this->deleteOne($i->link);
                }
                $i->delete();
            }

            foreach ($data['images'] as $image)
            {
                if ($image instanceof UploadedFile)
                {
                    $link = $this->uploadOne($image, 'products');
                    $product->images()->create([
                        'link' => $link
                    ]);
                }
            }
        }

        return $product;
    }

    /**
     * @inheritDoc
     */
    public function destroy($id)
    {
        $product = $this->findOneById($id);
        foreach ($product->images as $i)
        {
            if ($i->link)
            {
                $this->deleteOne($i->link);
            }
            $i->delete();
        }
        return $product->delete();
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
