<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Throwable;

class SocialiteEmailNotFoundException extends Exception
{
    protected $user;
    protected $provider;

    public function __construct($user,$provider,$message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->user = $user;
        $this->provider = $provider;
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function render(Request $request)
    {
        session()->put('user',$this->user);
        session()->put('provider',$this->provider);
        return redirect()->route('auth.socialite.email',['id' => $this->user->id,'provider' => $this->provider]);
    }
}
