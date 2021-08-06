<?php


namespace App\QueryFilter;


use App\Models\Product;

class Sort extends Filter
{

    protected function applyFilters($builder)
    {
        $q = request($this->filterName());

        if (empty($q)) {
            return $builder;
        }

        if ($builder->getModel() instanceof Product) {
            if ($q == 'date') {
                return $builder->orderBy('created_at');
            } else if ($q == 'name') {
                return $builder->orderBy('name');
            }
        }

        return $builder;
    }
}
