<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

class CartComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if (auth()->check())
        {
            $view->with('count', auth()->user()->products()->sum('qte'));
        }
    }
}
