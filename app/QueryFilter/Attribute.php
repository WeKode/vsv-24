<?php


namespace App\QueryFilter;


use App\Models\Product;

class Attribute extends Filter
{

    protected function applyFilters($builder)
    {
        $q = request($this->filterName());

        if (empty($q))
        {
            return $builder;
        }

        if ($builder->getModel() instanceof Product)
        {
            $attributes = explode('_', $q);
            return $builder->whereHas('attribute_values', function ($query) use ($attributes)
            {
                $query->whereIn('id', $attributes);
            });
        }

        return $builder;
    }
}
