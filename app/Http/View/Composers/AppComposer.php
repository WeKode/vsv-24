<?php

namespace App\Http\View\Composers;

use App\Models\Setting;
use Illuminate\View\View;

class AppComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $setting = Setting::all();
        $view->with('setting', $setting);

    }
}
