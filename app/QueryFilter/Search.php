<?php


namespace App\QueryFilter;


class Search extends Filter
{

    protected function applyFilters($builder)
    {
        $q = request($this->filterName());

        if (empty($q))
        {
            return $builder;
        }

        if (request()->is(['admin/attribute*','admin/attribute*','admin/attribute*']))
        {
            return $builder->where('name','like','%'.$q.'%');
        }

        if (request()->is('admin/products*'))
        {
            return $builder->where('name','like','%'.$q.'%')
                ->orWhere('description','like','%'.$q.'%');
        }

        return $builder->where('first_name','like','%'.$q.'%')
                        ->orWhere('last_name','like','%'.$q.'%');
    }
}
