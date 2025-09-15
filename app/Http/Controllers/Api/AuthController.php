<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|unique:users|max:100',
            'password' => 'required'
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ], 201);
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|max:100',
            'password' => 'required'
        ]);

        $user = User::where('email', $validated['email'])->first();
        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully',
        ]);
    }

    public function updateFcmId(Request $request)
    {
        $validated = $request->validate([
            'fcm_id' => 'required'
        ]);

        $user = $request->user();
        $user->fcm_id = $validated['fcm_id'];
        $user->save();
    }

   /**
     * Redirect to Google OAuth
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
        // return Socialite::driver('google')
        //     ->stateless()  // Add this line
        //     ->redirect();
    }

    /**
     * Handle Google OAuth callback
     */
    public function handleGoogleCallback()
    {
        try {
            // $googleUser = Socialite::driver('google')->user();
             $googleUser = Socialite::driver('google')
                ->stateless()  // Add this line
                ->user();
            // dd($googleUser->email);

            // $checkUser = User::where('email', 'ilhammaulana9906@gmail.com')->first();
            // dd($googleUser->email == 'ilhammaulana9906@gmail.com');
            if($googleUser->email != 'ilhammaulana9906@gmail.com'){
                return redirect('/login')->with('error', 'Access denied. Please contact the administrator.');
            }
            // dd($googleUser);
            // Check if user already exists
            $user = User::where('email', $googleUser->email)->first();
            
            if ($user) {
                // Update Google ID if not set
                if (!$user->google_id) {
                    $user->update([
                        'google_id' => $googleUser->id,
                        'avatar' => $googleUser->avatar,
                    ]);
                }
            } else {
                // Create new user
                // dd($checkUser);
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'avatar' => $googleUser->avatar,
                    'password' => bcrypt(Str::random(16)), // Random password
                    'email_verified_at' => now(), // Google accounts are verified
                ]);
            }
            
            // Log the user in
            Auth::login($user, true);
            
            return redirect()->intended('/admin/home')->with('success', 'Successfully logged in with Google!');
            
        } catch (Exception $e) {
            return redirect('/login')->with('error', 'Something went wrong with Google login. Please try again.');
        }
    }
}
