<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SocialAccount;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse as SocialiteRedirect;

class SocialiteController extends Controller
{
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
            session()->flash('error',__('messages.fail'));
            return redirect()->route('login');
        }
        if (!$getInfo->token) {
            session()->flash('error',__('auth.failed'));
            return redirect()->route('login');
        }
        $user = $this->createUser($getInfo,$provider);
        // login our user and get the token

        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }


    /**
     * @param $getInfo
     * @param $provider
     * @return User
     */
    private function createUser($getInfo, $provider): User
    {
        $appUser = User::whereEmail($getInfo->email)->first();

        if (!$appUser){
            $appUser=  User::create([
                'name' => $getInfo->user['given_name'],
                'password' => bcrypt(Str::random(8)),
                'email_verified_at' => now(),
                'email' => $getInfo->email,
            ]);
            $socialAccount = SocialAccount::create([
                'provider' => $provider,
                'provider_user_id' => $getInfo->id,
                'user_id' => $appUser->id
            ]);
        }else {
            $socialAccount = $appUser->socialAccounts()->where('provider', $provider)->first();

            if (!$socialAccount) {
                // create social account
                $socialAccount = SocialAccount::create([
                    'provider' => $provider,
                    'provider_user_id' => $getInfo->id,
                    'user_id' => $appUser->id
                ]);
            }
        }
        return $appUser;
    }


}
