<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())) . '|' . $request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        Fortify::loginView(fn() => view('pages.auth.login'));

        Fortify::registerView(fn() => view('pages.auth.register'));


        Fortify::authenticateUsing(function (Request $request) {

            // dd($request->all());
            // if (Validator::make($request->all(), [
            //     'captcha' => 'required|captcha'
            // ])) return;
            $captchaResult = $this->validateCaptcha($request);
            $user = User::where('email', $request->email)->first();
            if (
                $user &&
                Hash::check($request->password, $user->password)
            ) {
                // dd($user);
                return $user;
            }
            // dd($request->all());
        });

        // Validasi captcha sebelum autentikasi
        // Fortify::authenticateUsing(function (Request $request) {
        //     // Validasi Google reCAPTCHA terlebih dahulu
        //     $captchaResult = $this->validateCaptcha($request);

        //     // dd($captchaResult);
        //     // Cari user berdasarkan email
        //     $user = User::where('email', $request->email)->first();



        //     // Cek apakah user ada dan password benar
        //     if ($user && Hash::check($request->password, $user->password)) {
        //         // dd($user);
        //         // return 
        //         return $user;
        //     }

        //     // Jika gagal, lempar exception
        //     throw ValidationException::withMessages([
        //         Fortify::username() => [trans('auth.failed')],
        //     ]);
        // });
    }

    private function validateCaptcha(Request $request)
    {
        $captchaToken = $request->input('g-recaptcha-response');

        if (!$captchaToken) {
            throw ValidationException::withMessages([
                'g-recaptcha-response' => 'Captcha wajib diisi.',
            ]);
        }

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $captchaToken,
            'remoteip' => $request->ip(),
        ]);

        // dd($response->json());

        $captchaResult = $response->json();
        // dd($captchaResult['success'] === false);
        if ($captchaResult['success'] === false) {
            return redirect()->back()->withErrors([
                'g-recaptcha-response' => 'Captcha tidak valid. Silakan coba lagi.',
            ]);
        }
    }
}
