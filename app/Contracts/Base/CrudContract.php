<?php


namespace App\Contracts\Base;


interface CrudContract
{
    /**
     * @param $per_page
     * @return mixed
     */
    public function setPerPage($per_page);

    /**
     * @param array $filters
     * @return mixed
     */
    public function setFilters(array $filters);

    /**
     * @param $id
     * @param array $relations
     * @param array $columns
     * @param array $scopes
     * @return mixed
     */
    public function findOneById($id, array $relations = [],array $counts = [],array $columns = ['*'], array $scopes = []);

    /**
     * @param array $params
     * @param array $relations
     * @param array $columns
     * @param array $scopes
     * @return mixed
     */
    public function findOneBy(array $params,array $relations = [],array $counts = [],array $columns = ['*'], array $scopes = []);

    /**
     * @param array $params
     * @param array $relations
     * @param array $counts
     * @param array $columns
     * @param array $scopes
     * @return mixed
     */
    public function findBy(array $params,array $relations = [] ,array $counts = [],array $columns = ['*'], array $scopes = []);

    /**
     * @param array $relations
     * @param array $columns
     * @param array $scopes
     * @return mixed
     */
    public function findByFilter(array $relations = [],array $counts = [],array $columns = ['*'], array $scopes = [] );

    /**
     * @param array $data
     * @return mixed
     */
    public function new(array $data);

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data);

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id);
}
