<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    use UploadAble;
    public function index()
    {
        return view('front.profile.index');
    }

    public function edit()
    {
        return view('front.profile.edit');
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:users,email,'.user()->id,
            'first_name' => 'sometimes|nullable|string|max:100',
            'last_name' => 'sometimes|nullable|string|max:100',
            'city' => 'sometimes|nullable|string|max:100',
            'country' => 'sometimes|nullable|string|max:100',
            'zip_code' => 'sometimes|nullable|numeric',
            'pic' => 'sometimes|nullable|file|image',
            'birth_date' => 'sometimes|nullable|date',
            'address' => 'sometimes|nullable|string',
            'phone' => 'sometimes|nullable|string|max:20',
            'gender' => 'sometimes|nullable|string|in:male,female',
        ]);

        if ($request->hasFile('pic'))
        {
            if (user()->pic)
            {
                $this->deleteOne(user()->pic);
            }

            $data['pic'] = $this->uploadOne($data['pic'],'users/'.user()->id);
        }

        user()->update($data);

        session()->flash('success',__('messages.update'));
        return redirect()->route('profile.index');

    }
}
