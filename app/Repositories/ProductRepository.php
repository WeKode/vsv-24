<?php


namespace App\Repositories;


use App\Models\AttributeValue;
use App\Models\Product;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;

class ProductRepository extends BaseRepositories implements \App\Contracts\ProductContract
{

    use UploadAble;

    public function __construct($per_page = 10, array $filters = [
        \App\QueryFilter\Search::class,
        \App\QueryFilter\MinPrice::class,
        \App\QueryFilter\MaxPrice::class,
        \App\QueryFilter\Attribute::class,
        \App\QueryFilter\Brand::class,
        \App\QueryFilter\Available::class,
        \App\QueryFilter\Sort::class,
    ])
    {
        parent::__construct($per_page, $filters);
    }

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
                    $path = $this->uploadOne($image, 'product');
                    $product->images()->create([
                        'path' => $path,
                        'original_name' => $image->getClientOriginalName()
                    ]);
                }
            }
        }

        if (array_key_exists('values',$data))
        {
            foreach ($data['values'] as $value)
            {
                $av = AttributeValue::findOrFail($value);
                $product->attribute_values()->attach($av, ['attribute_id' => $av->attribute_id]);
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
            if ($i->path)
            {
                $this->deleteOne($i->path);
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

    public function addAttributeValue($id, array $data)
    {
        $product = $this->findOneById($id);
        $product->attribute_values()->attach($data['attribute_value_id'], $data);
        return $product;
    }

    public function removeAttributeValue($id, array $data)
    {
        $product = $this->findOneById($id);
        $product->attribute_values()->detach($data['attribute_value_id']);
        return $product;
    }
}
