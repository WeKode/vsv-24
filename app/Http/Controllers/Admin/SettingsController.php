<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Traits\UploadAble;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class SettingsController extends Controller
{
    use UploadAble;

    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     * @throws AuthorizationException
     */
    public function index(): Renderable
    {
        return  view("admin.setting.index");
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(Request $request): RedirectResponse
    {
        if ($request->has('site_logo') && ($request->file('site_logo') instanceof UploadedFile)) {

            if (config('settings.site_logo') !== null) {
                $this->deleteOne(config('settings.site_logo'));
            }

            $logo = $this->uploadOne($request->file('site_logo'), 'img');
            Setting::set('site_logo', $logo);

        } elseif ($request->has('site_favicon') && ($request->file('site_favicon') instanceof UploadedFile)) {

            if (config('settings.site_favicon') !== null) {
                $this->deleteOne(config('settings.site_favicon'));
            }
            $favicon = $this->uploadOne($request->file('site_favicon'), 'img');
            Setting::set('site_favicon', $favicon);

        } else {
//            call getValidatedData() method here

            $keys = $request->except('_token');

            foreach ($keys as $key => $value)
            {
                Setting::set($key, $value);
            }
        }
        session()->flash("success","Settings updated successfully");
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return array
     */
    private function getValidatedData(Request $request): array
    {
        return $request->validate([
//            todo
        ]);
    }

}
