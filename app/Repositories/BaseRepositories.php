<?php


namespace App\Repositories;

use Illuminate\Routing\Pipeline;

abstract class BaseRepositories
{
    /**
     * @var int|mixed
     */
    private $per_page;

    /**
     * @var array
     */
    private $filters;

    public function __construct($per_page = 10, array $filters = [])
    {
        $this->per_page = $per_page;
        $this->filters = $filters;
    }

    protected function applyFilter($query){

        $result = app(Pipeline::class)
            ->send($query)
            ->through($this->filters)
            ->thenReturn();

        return $this->per_page > 0 ? $result->paginate($this->per_page) : $result->get();
    }

    public function setPerPage($per_page)
    {
        $this->per_page = is_numeric($per_page) ? $per_page : 10;
        return $this;
    }

    public function setFilters(array $filters)
    {
        $this->filters = array_merge($filters,$this->filters);
        return $this;
    }
}
