<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Throwable;

class SocialiteEmailNotFoundException extends Exception
{
    protected $user;

    public function __construct($user,$message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->user = $user;
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
        return redirect()->route('auth.email',['id' => $this->user->id]);
    }
}
