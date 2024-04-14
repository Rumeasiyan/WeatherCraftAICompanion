<head>
    <title>WeatherCraft AI Companion | Login</title>
</head>
<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />



    <div class="container flex justify-center items-center min-w-full w-screen">

        <div
            class="flex items-center gap-0 justify-center flex-col md:flex-row  lg:flex-row xl:flex-row 2xl:flex-row w-full my-16 md:my-0 mx-6">
            <x-signinsingup-container-left />
            <x-signinsingup-container-right>

                <form method="POST" action="{{ route('login') }}" class="grid content-around gap-10">

                    <div>
                        <h1 class="font-bold text-2xl uppercase">Welcome back</h1>
                        <p>Please login to your account</p>
                    </div>
                    <div>
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                required autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me -->
                        <div
                            class="flex items-center justify-between mt-4 flex-col md:flex-row  lg:flex-row xl:flex-row 2xl:flex-row">
                            <div>
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                        name="remember">
                                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            <div>
                                @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                                @endif
                            </div>

                        </div>

                    </div>
                    <div>
                        <div
                            class="grid mt-4 items-center justify-center md:justify-start  lg:justify-start xl:justify-start 2xl:justify-start">


                            <x-primary-button class="w-40 text-center justify-center  grid">
                                {{ __('Log in') }}
                            </x-primary-button>
                        </div>
                        <div>
                            Don&apos;t have an account?
                            <a href="{{ route('register') }}"
                                class="underline text-sm text-gray-800 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __(' Sign up') }}
                            </a>
                        </div>
                    </div>
                </form>

            </x-signinsingup-container-right>
        </div>
    </div>

</x-guest-layout>