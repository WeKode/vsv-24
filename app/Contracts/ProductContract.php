<?php


namespace App\Contracts;


use App\Contracts\Base\CrudContract;

interface ProductContract extends CrudContract
{
    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function addAttributeValue($id, array $data);

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function removeAttributeValue($id, array $data);
}
