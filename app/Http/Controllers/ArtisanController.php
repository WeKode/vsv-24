<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtisanController extends Controller
{
    public function migrate()
    {
        \Illuminate\Support\Facades\Artisan::call("migrate:fresh --seed");
        return "migrate done";
    }

    public function cache()
    {
        \Illuminate\Support\Facades\Artisan::call("cache:clear");
        \Illuminate\Support\Facades\Artisan::call("config:cache");
        \Illuminate\Support\Facades\Artisan::call("route:cache");
        \Illuminate\Support\Facades\Artisan::call("view:cache");
        return "storage done";
    }

    public function storage()
    {
        \Illuminate\Support\Facades\Artisan::call("storage:link");
        return "storage done";
    }
}
