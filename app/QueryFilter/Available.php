<?php


namespace App\QueryFilter;


use App\Models\Product;

class Available extends Filter
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
            return $builder->where('is_available', true);
        }

        return $builder;
    }
}
