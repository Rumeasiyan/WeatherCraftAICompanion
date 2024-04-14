<head>
    <title>WeatherCraft AI Companion | Weather forecast</title>
</head>


<x-app-layout>
    <x-navigation-button>
        <a href="/profile">PROFILE</a>
    </x-navigation-button>
    <div class="container flex justify-center items-center min-w-full w-screen">

        <div
            class="flex items-center gap-0 justify-center flex-col md:flex-row  lg:flex-row xl:flex-row 2xl:flex-row w-full my-16 md:my-0 mx-6">
            <x-blur-container-left>
                <div>
                    <div class="w-full justify-center items-center">
                        <x-input-label for="locationSeachText" :value="__('Location')"
                            class="text-xl w-full text-center" />
                        <!-- <select id="locationSearch" class="block mt-1 w-full" name="locationSearch" required autofocus
                            style="height: 40px; border: none; padding: 5px;" onchange="getSuggestedLocations()">
                            <option value="">Select a location</option>
                        </select> -->
                        <x-text-input id="locationSearchText" class="block mt-1 w-full" type="text" name="locationSeach"
                            :value="old('locationSeach')" required autofocus style="height: 40px; border: none"
                            title="Location Search" aria-placeholder="Enter a Location" />
                        <div class="w-full flex justify-center items-center mt-4">

                            <x-primary-button onclick=" getWeather()">SEARCH</x-primary-button>
                        </div>
                        <div class="w-full text-center text-red-900 danger-text-weather font-bold hidden">
                            !! ERROR FETCHING WEATHER DATA, TRY AGAIN
                        </div>
                    </div>
                </div>
                <div class="flex justify-between flex-col loader loader-weather">
                    <div>
                        <div class="flex justify-around items-center">
                            <div class="weather-icon-main">
                                <img src="{{asset('img/weather-icon.png')}}" alt="" width="50px">
                            </div>
                            <div>
                                <div class="weather-temp-main">19&deg;C</div>
                                <div class="weather-location-main">Colombo, Sri Lanka</div>
                                <div class="weather-condition-main">Cloudy</div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-around items-center">
                        <div class="weather-wind-speed-main flex justify-center items-center">
                            <span class="material-symbols-outlined">
                                air
                            </span>
                            <span id="weather-wind-speed-main-id">11 KM/H</span>
                        </div>
                        <div class=" weather-humidity-main flex justify-center items-center">
                            <span class="material-symbols-outlined">
                                humidity_percentage
                            </span>
                            <span id="weather-humidity-main-id">29</span>
                        </div>
                    </div>
                    <div class="weather-forecast-group">

                        <div class="weather-forecast flex justify-center items-center flex-col">
                            <div class="weather-time-forecast">17:00</div>
                            <div class="weather-icon-forecast"><img src="{{asset('img/weather-icon.png')}}" alt="">
                            </div>
                            <div class="weather-temp-forecast">3&deg;C</div>
                        </div>
                        <div class="weather-forecast flex justify-center items-center flex-col">
                            <div class="weather-time-forecast">17:00</div>
                            <div class="weather-icon-forecast"><img src="{{asset('img/weather-icon.png')}}" alt="">
                            </div>
                            <div class="weather-temp-forecast">3&deg;C</div>
                        </div>
                        <div class="weather-forecast flex justify-center items-center flex-col">
                            <div class="weather-time-forecast">17:00</div>
                            <div class="weather-icon-forecast"><img src="{{asset('img/weather-icon.png')}}" alt="">
                            </div>
                            <div class="weather-temp-forecast">3&deg;C</div>
                        </div>
                        <div class="weather-forecast flex justify-center items-center flex-col">
                            <div class="weather-time-forecast">17:00</div>
                            <div class="weather-icon-forecast"><img src="{{asset('img/weather-icon.png')}}" alt="">
                            </div>
                            <div class="weather-temp-forecast">3&deg;C</div>
                        </div>
                        <div class="weather-forecast flex justify-center items-center flex-col">
                            <div class="weather-time-forecast">17:00</div>
                            <div class="weather-icon-forecast"><img src="{{asset('img/weather-icon.png')}}" alt="">
                            </div>
                            <div class="weather-temp-forecast">3&deg;C</div>
                        </div>
                        <div class="weather-forecast flex justify-center items-center flex-col">
                            <div class="weather-time-forecast">17:00</div>
                            <div class="weather-icon-forecast"><img src="{{asset('img/weather-icon.png')}}" alt="">
                            </div>
                            <div class="weather-temp-forecast">3&deg;C</div>
                        </div>
                        <div class="weather-forecast flex justify-center items-center flex-col">
                            <div class="weather-time-forecast">17:00</div>
                            <div class="weather-icon-forecast"><img src="{{asset('img/weather-icon.png')}}" alt="">
                            </div>
                            <div class="weather-temp-forecast">3&deg;C</div>
                        </div>
                        <div class="weather-forecast flex justify-center items-center flex-col">
                            <div class="weather-time-forecast">17:00</div>
                            <div class="weather-icon-forecast"><img src="{{asset('img/weather-icon.png')}}" alt="">
                            </div>
                            <div class="weather-temp-forecast">3&deg;C</div>
                        </div>
                        <div class="weather-forecast flex justify-center items-center flex-col">
                            <div class="weather-time-forecast">17:00</div>
                            <div class="weather-icon-forecast"><img src="{{asset('img/weather-icon.png')}}" alt="">
                            </div>
                            <div class="weather-temp-forecast">3&deg;C</div>
                        </div>
                        <div class="weather-forecast flex justify-center items-center flex-col">
                            <div class="weather-time-forecast">17:00</div>
                            <div class="weather-icon-forecast"><img src="{{asset('img/weather-icon.png')}}" alt="">
                            </div>
                            <div class="weather-temp-forecast">3&deg;C</div>
                        </div>
                        <div class="weather-forecast flex justify-center items-center flex-col">
                            <div class="weather-time-forecast">17:00</div>
                            <div class="weather-icon-forecast"><img src="{{asset('img/weather-icon.png')}}" alt="">
                            </div>
                            <div class="weather-temp-forecast">3&deg;C</div>
                        </div>
                        <div class="weather-forecast flex justify-center items-center flex-col">
                            <div class="weather-time-forecast">17:00</div>
                            <div class="weather-icon-forecast"><img src="{{asset('img/weather-icon.png')}}" alt="">
                            </div>
                            <div class="weather-temp-forecast">3&deg;C</div>
                        </div>
                        <div class="weather-forecast flex justify-center items-center flex-col">
                            <div class="weather-time-forecast">17:00</div>
                            <div class="weather-icon-forecast"><img src="{{asset('img/weather-icon.png')}}" alt="">
                            </div>
                            <div class="weather-temp-forecast">3&deg;C</div>
                        </div>
                        <div class="weather-forecast flex justify-center items-center flex-col">
                            <div class="weather-time-forecast">17:00</div>
                            <div class="weather-icon-forecast"><img src="{{asset('img/weather-icon.png')}}" alt="">
                            </div>
                            <div class="weather-temp-forecast">3&deg;C</div>
                        </div>
                        <div class="weather-forecast flex justify-center items-center flex-col">
                            <div class="weather-time-forecast">17:00</div>
                            <div class="weather-icon-forecast"><img src="{{asset('img/weather-icon.png')}}" alt="">
                            </div>
                            <div class="weather-temp-forecast">3&deg;C</div>
                        </div>
                        <div class="weather-forecast flex justify-center items-center flex-col">
                            <div class="weather-time-forecast">17:00</div>
                            <div class="weather-icon-forecast"><img src="{{asset('img/weather-icon.png')}}" alt="">
                            </div>
                            <div class="weather-temp-forecast">3&deg;C</div>
                        </div>
                    </div>
                </div>


            </x-blur-container-left>
            <x-white-container-right>

                <div class="justify-between mb-0">
                    <div class="container-right-text">Recomended activities based on weather
                        <br><br>
                    </div>
                    <div class="container-right-text text-right mb-0">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">LOGOUT</button>
                        </form>
                    </div>
                    <div class="w-full text-center text-red-900 danger-text-rec font-bold hidden">
                        !! ERROR FETCHING RECOMMENDATION DATA, TRY AGAIN
                    </div>
                </div>
                <div class="activity-recommedation-box-group loader loader-ai">
                    <div class=" activity-recomendation-box flex justify-around">
                        <div class="activity-recomendation-box-text">
                            <div class="activity-recomendation-box-title">Activity 1</div>
                            <div class="activity-recomendation-box-content">Activity 1 content</div>
                        </div>
                        <div class="activity-recommendation-box-btn">SAVE</div>
                    </div>
                    <div class="activity-recomendation-box flex justify-around">
                        <div>
                            <div class="activity-recomendation-box-title">Activity 2</div>
                            <div class="activity-recomendation-box-content">Activity 2 content</div>
                        </div>
                        <div class="activity-recommendation-box-btn">SAVE</div>
                    </div>
                    <div class="activity-recomendation-box flex justify-around">
                        <div>
                            <div class="activity-recomendation-box-title">Activity 3</div>
                            <div class="activity-recomendation-box-content">Activity 3 content</div>
                        </div>
                        <div class="activity-recommendation-box-btn">SAVE</div>
                    </div>
                    <div class="activity-recomendation-box flex justify-around">
                        <div>
                            <div class="activity-recomendation-box-title">Activity 4</div>
                            <div class="activity-recomendation-box-content">Activity 4 content</div>
                        </div>
                        <div class="activity-recommendation-box-btn">SAVE</div>
                    </div>
                    <div class="activity-recomendation-box flex justify-around">
                        <div>
                            <div class="activity-recomendation-box-title">Activity 5</div>
                            <div class="activity-recomendation-box-content">Activity 5 content</div>
                        </div>
                        <div class="activity-recommendation-box-btn">SAVE</div>
                    </div>
                </div>
            </x-white-container-right>

        </div>
    </div>
</x-app-layout>