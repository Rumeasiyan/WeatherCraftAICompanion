<head>
    <title>WeatherCraft AI Companion | Register</title>
</head>

<x-guest-layout>

    <div class="container flex justify-center items-center min-w-full w-screen">

        <div
            class="flex items-center gap-0 justify-center flex-col md:flex-row  lg:flex-row xl:flex-row 2xl:flex-row w-full my-16 md:my-0 mx-6">
            <x-signinsingup-container-left />
            <x-signinsingup-container-right>


                <form method="POST" action="{{ route('register') }}" class="grid content-around gap-5">
                    <div>
                        <h1 class="font-bold text-2xl uppercase">Create an account</h1>
                    </div>
                    <div>
                        @csrf
                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>
                    <div>
                        <div
                            class="grid mt-4 items-center justify-center md:justify-start  lg:justify-start xl:justify-start 2xl:justify-start">
                            <x-primary-button class="w-40 text-center justify-center  grid">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
                        <div
                            class="grid  items-center justify-center md:justify-start  lg:justify-start xl:justify-start 2xl:justify-start">
                            <a class="underline text-sm text-gray-800 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>
                        </div>
                    </div>
                </form>
            </x-signinsingup-container-right>
        </div>
    </div>
</x-guest-layout>