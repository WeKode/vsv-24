<?php


namespace App\Repositories;


use App\Contracts\AdminContract;
use App\Models\Admin;
use App\Traits\UploadAble;

class AdminRepository extends BaseRepositories implements AdminContract
{
    use UploadAble;
    public function findOneById($id, array $relations = [], array $counts = [], array $columns = ['*'], array $scopes = [])
    {
        return Admin::with($relations)->withCount($counts)->select($columns)->scopes($scopes)->findOrFail($id);
    }

    public function findOneBy(array $params, array $relations = [], array $counts = [], array $columns = ['*'], array $scopes = [])
    {
        return Admin::with($relations)->where($params)->withCount($counts)->select($columns)->scopes($scopes)->firstOrFail();
    }

    public function findBy(array $params, array $relations = [], array $counts = [], array $columns = ['*'], array $scopes = [])
    {
        $query = Admin::with($relations)->where($params)->withCount($counts)->select($columns)->scopes($scopes)->newQuery();
        return $this->applyFilter($query);
    }

    public function findByFilter(array $relations = [], array $counts = [], array $columns = ['*'], array $scopes = [])
    {
        $query = Admin::with($relations)->withCount($counts)->select($columns)->scopes($scopes)->newQuery();
        return $this->applyFilter($query);
    }

    public function new(array $data)
    {
        if (array_key_exists('pic', $data))
        {
            $data['pic'] = $this->uploadOne($data['pic'],'admin/img');
        }
        $data['password'] = bcrypt($data['password']);
        $admin = Admin::create($data);
        $admin->assignRole($data['roles']);
        return $admin;
    }

    public function update($id, array $data)
    {
        $admin = $this->findOneById($id);
        if (array_key_exists('pic', $data))
        {
            if ($admin->pic)
            {
                $this->deleteOne($admin->pic);
            }
            $data['pic'] = $this->uploadOne($data['pic'],'admin/img');
        }
        $admin->update($data);
        $admin->syncRole($data['roles']);
        return $admin;
    }

    public function destroy($id)
    {
        $admin = $this->findOneById($id);
        if ($admin->pic)
        {
            $this->deleteOne($admin->pic);
        }
        return $admin->delete();
    }
}
