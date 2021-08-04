<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

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
            'first_name' => 'sometime|nullable|string|max:100',
            'last_name' => 'sometime|nullable|string|max:100',
            'city' => 'sometime|nullable|string|max:100',
            'country' => 'sometime|nullable|string|max:100',
            'zip_code' => 'sometime|nullable|numeric',
            'pic' => 'sometime|nullable|file|image',
            'birth_date' => 'sometime|nullable|date',
            'address' => 'sometime|nullable|string',
            'phone' => 'sometime|nullable|string|max:20',
            'gender' => 'sometime|nullable|string|in:male,female',
        ]);

        user()->update($data);

        session()->flash('success',__('messages.update'));
        return redirect()->back();

    }
}
