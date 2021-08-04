<?php


namespace App\QueryFilter;


use App\Models\Product;

class Brand extends Filter
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
            $brands = explode('_', $q);
            return $builder->whereHas('brand', function ($query) use ($brands)
            {
                $query->whereIn('id', $brands);
            });
        }

        return $builder;
    }
}
