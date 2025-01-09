<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="container">
        <div class="grid" style="padding: 40px;">
            <div class="card">
                <div class="card--title">
                    Login
                </div>
                <div class="card--body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="form-group">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email"  class="form-control   " type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" />
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <x-input-label for="password" :value="__('Password')" class="" />

                            <x-text-input id="password" class="form-control"
                                            type="password"
                                            name="password"
                                            required autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password')" class=""  />
                        </div>

                        <!-- Remember Me -->
                        <div class="form-group inline">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <x-primary-button class="knopf flat traced">
                                {{ __('Log in') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
