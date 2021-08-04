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

if (! function_exists('user'))
{
    function user(): ?\Illuminate\Contracts\Auth\Authenticatable
    {
        if (auth('web')->check())
        {
            return auth('web')->user();
        }
        return null;
    }
}
