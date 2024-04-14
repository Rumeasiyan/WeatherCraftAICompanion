<head>
    <title>WeatherCraft AI Companion | Register</title>
</head>

<x-guest-layout>

    <div class="container flex justify-center items-center min-w-full w-screen">

        <div
            class="flex items-center gap-0 justify-center flex-col md:flex-row  lg:flex-row xl:flex-row 2xl:flex-row w-full my-16 md:my-0 mx-6">
            <x-signinsingup-container-left />
            <x-signinsingup-container-right>
                <div class="justify-center items-center grid">
                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autofocus />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Email Password Reset Link') }}
                            </x-primary-button>
                        </div>
                        <div
                            class="grid  items-center justify-center md:justify-start  lg:justify-start xl:justify-start 2xl:justify-start">
                            <a class="underline text-sm text-gray-800 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('login') }}">
                                {{ __('Go back to Login Page') }}
                            </a>
                        </div>
                    </form>
                </div>




            </x-signinsingup-container-right>
        </div>
    </div>
</x-guest-layout>