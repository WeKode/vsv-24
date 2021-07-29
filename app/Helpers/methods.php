<?php

if (! function_exists('admin'))
{
    function admin(): ?\Illuminate\Contracts\Auth\Authenticatable
    {
        if (auth('admin')->check())
        {
            return auth('admin')->user();
        }
        return null;
    }
}

if (! function_exists('settings'))
{
    function settings(string $key)
    {
       return config('settings.'.$key);
    }
}
