<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\UserContract;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user;

    public function __construct(UserContract $user)
    {
        $this->user = $user;
    }

    /**
     * @return Renderable
     */
    public function index(): Renderable
    {
        $users = $this->user->findByFilter();
        return view('admin.users.index',compact('users'));
    }



    /**
     * @param $id
     * @return Renderable
     */
    public function edit($id): Renderable
    {
        $user = $this->user->findOneById($id);
        return view('admin.users.edit',compact('user'));
    }

    public function update($id,Request $request)
    {
        $data = $request->validate([
            'name'      => 'required|string|max:100',
            'email'     => 'required|email|unique:users,email,'.$id,
            'pic'       => 'sometimes|nullable|file|image|max:3000',
        ]);
        $this->user->update($id,$data);

        session()->flash('success',__('messages.update'));
        return redirect()->route('admin.users.show',$id);
    }


    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->user->destroy($id);
        session()->flash('success',__('messages.delete'));
        return redirect()->route('admin.users.index');
    }

}
