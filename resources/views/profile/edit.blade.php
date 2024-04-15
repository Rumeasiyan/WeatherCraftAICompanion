<x-app-layout>
    <x-navigation-button>
        <div class="w-full text-right">
            <a href="/WeatherForecast" class="text-right w-full">WEATHER FORECAST</a>
        </div>
    </x-navigation-button>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full flex justify-center items-center">
                    <div
                        class="  bg-white h-3/4vh container-boxshadow container-left content-between grid rounded-none h-100 justify-center m-5 md:m-0 lg:m-0 xl:m-0 2xl:m-0 p-5 relative">

                        <div class="justify-between mb-0">
                            <div class="container-right-text">Saved activities based on weather
                                <br><br>
                            </div>
                            <div class="container-right-text text-right mb-0 text-sm">
                                <button onclick="viewArchievedData()" id="activity-toggle">VIEW ARCHIEVED
                                    ACTIVITIES</button>
                            </div>
                        </div>
                        <div class="activity-recommedation-box-group loader loader-ai min-h-96">
                            <!-- <div class=" activity-recomendation-box flex justify-around">
                                <div class="activity-recomendation-box-text">
                                    <div class="activity-recomendation-box-title">Activity 1</div>
                                    <div class="activity-recomendation-box-content">Activity 1 content</div>
                                </div>
                                <div class="activity-recommendation-box-btn">SAVE</div>
                            </div> -->

                        </div>

                        <div class="flex items-center justify-between">
                            <div><a href="/">visit our page</a></div>
                            <div class="flex justify-end ">
                                <p class="text-right text-lg uppercase">WeatherCraft AI <br> Companion</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
getSavedActivities();
</script>