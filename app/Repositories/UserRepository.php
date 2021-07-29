<?php


namespace App\Repositories;


use App\Models\User;

class UserRepository extends BaseRepositories implements \App\Contracts\UserContract
{

    /**
     * @inheritDoc
     */
    public function findOneById($id, array $relations = [],array $counts = [], array $columns = ['*'], array $scopes = [])
    {
        return User::with($relations)->select($columns)->scopes($scopes)->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function findByFilter(array $relations = [],array $counts = [], array $columns = ['*'], array $scopes = [])
    {
        $query = User::with($relations)->select($columns)->scopes($scopes)->newQuery();
        return $this->applyFilter($query);
    }

    /**
     * @inheritDoc
     */
    public function new(array $data)
    {
        return User::create($data);
    }

    /**
     * @inheritDoc
     */
    public function update($id, array $data)
    {
        $user = $this->findOneById($id);
        $user->update($data);
        return $user;
    }

    /**
     * @inheritDoc
     */
    public function destroy($id)
    {
        return User::destroy($id);
    }

    public function findOneBy(array $params, array $relations = [],array $counts = [], array $columns = ['*'], array $scopes = [])
    {
        return User::with($relations)->where($params)->select($columns)->scopes($scopes)->firstOrFail();
    }

    public function findBy(array $params, array $relations = [],array $counts = [], array $columns = ['*'], array $scopes = [])
    {
        $query = User::with($relations)
            ->where($params)
            ->select($columns)
            ->scopes($scopes)
            ->newQuery();
        return $this->applyFilter($query);
    }
}
