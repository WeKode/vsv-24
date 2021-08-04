<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\SocialiteEmailNotFoundException;
use App\Http\Controllers\Controller;
use App\Models\SocialAccount;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse as SocialiteRedirect;

class SocialiteController extends Controller
{
    protected $socialAccount;
    protected $user_info = null;

    public function __construct()
    {
        if (session()->has('user_info'))
        {
            $this->user_info = session('user_info');
        }
    }

    /**
     * Redirect the user to the Provider(like facebook or google ...) authentication page.
     *
     * @param $provider
     * @return SocialiteRedirect
     */
    public function redirectToProvider($provider): SocialiteRedirect
    {

        return Socialite::driver($provider)->redirect();

    }

    /**
     * Obtain the user information from Provider (like facebook or google ...).
     *
     * @param $provider
     * @return RedirectResponse
     */
    public function handleProviderCallback($provider): RedirectResponse
    {
        try {
            $getInfo = Socialite::driver($provider)->user();
        }catch (ClientException $exception){
            return $this->responseWithError(__('messages.fail'));
        }

        if (!$getInfo->token) {
            return $this->responseWithError(__('auth.failed'));
        }

        return $this->responseWithSuccess($this->getUser($getInfo,$provider));
    }

    /**
     * @param $getInfo
     * @param $provider
     * @return User
     */
    private function getUser($getInfo, $provider): User
    {
        $appUser = $this->checkForUser($getInfo,$provider);

        if (!$appUser){
            $appUser = $this->createNewUser($getInfo);

            SocialAccount::create([
                'provider' => $provider,
                'provider_user_id' => $getInfo->id,
                'user_id' => $appUser->id
            ]);
        }else {
            $this->socialAccount = $appUser->socialAccounts()->where('provider', $provider)->first();

            if (!$this->socialAccount) {
                SocialAccount::create([
                    'provider' => $provider,
                    'provider_user_id' => $getInfo->id,
                    'user_id' => $appUser->id
                ]);
            }
        }
        return $appUser;
    }

    /**
     * @throws SocialiteEmailNotFoundException
     */
    private function checkForUser($info,$provider)
    {
        if ($info->email)
        {
            return User::whereEmail($info->email)->first();
        }

        $this->socialAccount = SocialAccount::with('user')->where('provider_user_id',$info->id)->first();

        if ($this->socialAccount)
        {
            return $this->socialAccount->user;
        }

        throw new SocialiteEmailNotFoundException($info,$provider);
    }

    /**
     * @param $getInfo
     * @return mixed
     */
    private function createNewUser($getInfo)
    {
        return User::create([
            'name' => $getInfo->name,
            'password' => bcrypt(Str::random(8)),
            'email_verified_at' => now(),
            'email' => $getInfo->email,
            'pic' => $getInfo->avatar,
        ]);
    }

    private function responseWithSuccess($user)
    {
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }

    private function responseWithError($message = 'Oops! Something went wrong, please try again')
    {
        session()->flash('error',$message);
        return redirect()->route('login');
    }


    public function emailView($id,$provider)
    {
        return view('auth.socialite.email',compact('provider','id'));
    }

    public function register(Request $request,$provider)
    {

        $request->validate([
            'email' => 'required|string|email|unique:users,email'
        ]);
        dd(session('user'),session('provider'));
        if (($user = session('user')) && ($provider === session('provider')))
        {

            $user->email = $request->input('email');

            $u = $this->createNewUser($user);
            SocialAccount::create([
                'provider' => $provider,
                'provider_user_id' => $user->id,
                'user_id' => $user->id
            ]);

            Auth::login($u);

            return redirect(RouteServiceProvider::HOME);
        }

        abort(404);

    }

}
