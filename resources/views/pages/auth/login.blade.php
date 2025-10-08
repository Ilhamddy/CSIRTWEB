@extends('layouts.auth')

@section('title', 'Login Diskominfo PPU')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

@endpush

@section('main')
   <div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
    <div class="bg-blue-600 px-6 py-4">
        <h4 class="text-xl font-semibold text-white">Login</h4>
    </div>

    <div class="p-6">
        <!-- Google Login Button -->
        <div class="mb-6">
            <a href="{{ route('auth.google') }}" 
               class="w-full flex items-center justify-center px-4 py-3 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 transition duration-200">
                <svg class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                    <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                    <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                    <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                    <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                </svg>
                Continue with Google
            </a>
        </div>

        <!-- Divider -->
        <div class="relative mb-6">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-2 bg-white text-gray-500">Or continue with email</span>
            </div>
        </div>

        <!-- Email/Password Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
            
            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input id="email" 
                       type="email"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror"
                       name="email" 
                       value="{{ old('email') }}"
                       tabindex="1" 
                       autofocus 
                       placeholder="Enter your email">
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Field -->
            <div>
                <div class="flex items-center justify-between mb-2">
                    <label for="password" class="text-sm font-medium text-gray-700">Password</label>
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-500">Forgot password?</a>
                </div>
                <input id="password" 
                       type="password"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('password') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror"
                       name="password" 
                       tabindex="2"
                       placeholder="Enter your password">
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- reCAPTCHA -->
            <div class="py-2">
                <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input id="remember" 
                       name="remember" 
                       type="checkbox" 
                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                       {{ old('remember') ? 'checked' : '' }}>
                <label for="remember" class="ml-2 block text-sm text-gray-700">
                    Remember me
                </label>
            </div>

            <!-- Submit Button -->
            <div class="pt-2">
                <button type="submit" 
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200"
                        tabindex="4">
                    Sign in
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Register Link -->
<div class="text-center mt-6 text-sm text-gray-600">
    Don't have an account? 
    <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500">
        Create one
    </a>
</div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- Page Specific JS File -->
@endpush
