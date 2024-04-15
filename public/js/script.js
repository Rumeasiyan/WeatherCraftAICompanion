document.addEventListener("DOMContentLoaded", async function () {
    try {
        const errorTextAI = document.querySelectorAll(".danger-text-rec")[0];
        errorTextAI.classList.add("hidden");

        const errorTextWeather = document.querySelectorAll(
            ".danger-text-weather"
        )[0];
        errorTextWeather.classList.add("hidden");

        const loaderai = document.querySelectorAll(".loader-ai")[0];
        const loaderweather = document.querySelectorAll(".loader-weather")[0];

        loaderai.style.filter = "blur(12px)";
        loaderweather.style.filter = "blur(12px)";

        const weatherCityResponse = await fetch(
            `https://ipinfo.io/json?token=${weatherCityKey}`
        );
        const weatherCityData = await weatherCityResponse.json();
        console.log(weatherCityData);
        weatherLocation(weatherApiKey, weatherCityData.city);
    } catch (error) {
        console.error(error);
        const errorText = document.querySelectorAll(".danger-text-weather")[0];
        errorText.classList.remove("hidden");
        const errorTextRec = document.querySelectorAll(".danger-text-rec")[0];
        errorTextRec.classList.remove("hidden");
    }
});

async function weatherLocation(weatherApiKey, weatherCity) {
    let lat;
    let lon;
    let cityName;

    try {
        const loaderai = document.querySelectorAll(".loader-ai")[0];
        const loaderweather = document.querySelectorAll(".loader-weather")[0];

        loaderai.style.filter = "blur(12px)";
        loaderweather.style.filter = "blur(12px)";

        const locationResponse = await fetch(
            `http://api.openweathermap.org/geo/1.0/direct?q=${weatherCity}&limit=1&appid=${weatherApiKey}`
        );
        const dataLocation = await locationResponse.json();

        console.log(dataLocation);
        lat = dataLocation[0].lat;
        lon = dataLocation[0].lon;
        cityName = `${dataLocation[0].name}, ${dataLocation[0].country}`;

        const weatherResponse = await fetch(
            `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${weatherApiKey}`
        );
        const dataWeather = await weatherResponse.json();

        console.log(dataWeather);

        updateWeatherContent(dataWeather, cityName);
        console.log(lat, lon);

        const weatherForecastResponse = await fetch(
            `https://api.openweathermap.org/data/2.5/forecast?lat=${lat}&lon=${lon}&appid=${weatherApiKey}`
        );
        console.log(weatherForecastResponse);
        const dataWeatherForecast = await weatherForecastResponse.json();

        console.log(dataWeatherForecast);

        weatherForecast(dataWeatherForecast);

        console.log("activityRecommendation");
        activityRecommendation(dataWeather, cityName);
    } catch (error) {
        console.error(error);
        const errorText = document.querySelectorAll(".danger-text-weather")[0];
        errorText.classList.remove("hidden");
        const errorTextRec = document.querySelectorAll(".danger-text-rec")[0];
        errorTextRec.classList.remove("hidden");
    }
}

getWeather = async () => {
    const errorTextAI = document.querySelectorAll(".danger-text-rec")[0];
    errorTextAI.classList.add("hidden");

    const errorTextWeather = document.querySelectorAll(
        ".danger-text-weather"
    )[0];
    errorTextWeather.classList.add("hidden");
    const weatherCity = document.getElementById("locationSearchText").value;
    console.log(weatherCity);
    weatherLocation(weatherApiKey, weatherCity);
};

async function updateWeatherContent(dataWeather, cityName) {
    try {
        const weatherTempMain =
            document.querySelectorAll(".weather-temp-main")[0];
        const weatherLocationMain = document.querySelectorAll(
            ".weather-location-main"
        )[0];
        const weatherConditionMain = document.querySelectorAll(
            ".weather-condition-main"
        )[0];
        const weatherwindSpeed = document.getElementById(
            "weather-wind-speed-main-id"
        );
        const weateherIconMain =
            document.querySelectorAll(".weather-icon-main")[0];
        const weatherHumidityMain = document.getElementById(
            "weather-humidity-main-id"
        );

        weatherTempMain.innerHTML = "";
        weatherLocationMain.innerHTML = "";
        weatherConditionMain.innerHTML = "";
        weatherwindSpeed.innerHTML = "";
        weateherIconMain.innerHTML = "";
        weatherHumidityMain.innerHTML = "";

        const temp = Math.round(dataWeather.main.temp - 273.15);
        const location = cityName;
        const condition = dataWeather.weather[0].description;
        const windSpeed = dataWeather.wind.speed;
        const icon = dataWeather.weather[0].icon;

        weatherTempMain.innerHTML = `${temp}°C`;
        weatherLocationMain.innerHTML = location;
        weatherConditionMain.innerHTML = condition;
        weatherwindSpeed.innerHTML = `${windSpeed} m/s`;
        weateherIconMain.innerHTML = `<img src="http://openweathermap.org/img/w/${icon}.png" alt="weather-icon" width="100px">`;
        weatherHumidityMain.innerHTML = `${dataWeather.main.humidity}%`;
    } catch (error) {
        console.error(error);
        const errorText = document.querySelectorAll(".danger-text-weather")[0];
        errorText.classList.remove("hidden");
    }
}

async function weatherForecast(dataWeatherForecast) {
    try {
        const weatherForecastGroup = document.querySelectorAll(
            ".weather-forecast-group"
        )[0];
        console.log(weatherForecastGroup);
        weatherForecastGroup.innerHTML = "";

        for (let i = 0; i < 40; i += 1) {
            const weatherForecastTime = dataWeatherForecast.list[i].dt_txt;
            const month = weatherForecastTime.slice(5, 7);
            const day = weatherForecastTime.slice(8, 10);
            const hour = weatherForecastTime.slice(11, 13);
            const minute = weatherForecastTime.slice(14, 16);
            const weatherTime = `${month}/${day}\n${hour}:${minute}`;

            const weatherIcon = dataWeatherForecast.list[i].weather[0].icon;
            const weatherIconUrl = `http://openweathermap.org/img/w/${weatherIcon}.png`;

            const weatherTemp = Math.round(
                dataWeatherForecast.list[i].main.temp - 273.15
            );

            const weatherForecast = document.createElement("div");
            weatherForecast.classList.add("weather-forecast");
            weatherForecast.innerHTML = `
                <div class="weather-time-forecast">${weatherTime}</div>
                <div class="weather-icon-forecast">
                    <img src="${weatherIconUrl}" alt="weather-icon">
                </div>
                <div class="weather-temp-forecast">${weatherTemp}&deg;C</div>`;
            weatherForecastGroup.appendChild(weatherForecast);
        }

        const loaderweather = document.querySelectorAll(".loader-weather")[0];

        loaderweather.style.filter = "none";
    } catch (error) {
        console.error(error);
        const errorText = document.querySelectorAll(".danger-text-weather")[0];
        errorText.classList.remove("hidden");
    }
}

// refernece: https://ai.google.dev/tutorials/rest_quickstart

async function activityRecommendation(dataWeather, cityName) {
    try {
        const temp = Math.round(dataWeather.main.temp - 273.15);
        const location = cityName;
        const condition = dataWeather.weather[0].description;
        const windSpeed = dataWeather.wind.speed;
        const humidity = dataWeather.main.humidity;

        const AiApiKey = googleAPIKey;
        const AIUrl = `https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=${AiApiKey}`;

        const activityResponse = await fetch(AIUrl, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                contents: [
                    {
                        role: "user",
                        parts: [
                            {
                                text: `Based on the current weather data in ${location}, which includes a temperature of ${temp}°C, ${condition} conditions, wind speed of ${windSpeed} m/s, and humidity of ${humidity}%, recommend a minimum of 10 tourist activities to do in the area. Please provide  Response in a json format. as below:
                            {
                                "activities": [
                                    {
                                    "activity": "",
                                    "description": ""
                                    },
                                    ...
                                ]
                            }
                            `,
                            },
                        ],
                    },
                ],
            }),
        });

        const activityData = await activityResponse.json();
        console.log(activityData);

        // console.log(activityData.candidates[0]);
        // console.log(activityData.candidates[0].content);
        // console.log(activityData.candidates[0].content.parts[0]);
        // console.log(activityData.candidates[0].content.parts[0].text);

        const activitiesTextFormat =
            activityData.candidates[0].content.parts[0].text;

        const activitiesTextFormatTwo = activitiesTextFormat.slice(8, -4);
        //replace the escape characters and \n
        const activitiesTextFormatThree = activitiesTextFormatTwo.replace(
            /\\n/g,
            ""
        );
        //remove all \ in the string
        const activitiesTextFormatFour = activitiesTextFormatThree.replace(
            /\\/g,
            ""
        );

        // console.log(activitiesTextFormatTwo);
        console.log(activitiesTextFormatThree);

        const activitiesText = JSON.parse(activitiesTextFormatTwo);
        // console.log(activitiesText);
        console.log(activitiesText.activities);

        const activityRecommendationGroup = document.querySelectorAll(
            ".activity-recommedation-box-group"
        )[0];

        activityRecommendationGroup.innerHTML = "";

        for (let i = 0; i < activitiesText.activities.length; i += 1) {
            const activity = activitiesText.activities[i].activity;
            const description = activitiesText.activities[i].description;

            const activityRecommendationBox = document.createElement("div");
            activityRecommendationBox.classList.add(
                "activity-recomendation-box"
            );
            activityRecommendationBox.classList.add("justify-around");
            activityRecommendationBox.classList.add("flex");

            activityRecommendationBox.innerHTML = `
        <div class="activity-recomendation-box-text">
            <div class="activity-recomendation-box-title font-bold">${activity}</div>
            <div class="activity-recomendation-box-content">${description}</div>
        </div>
        <div class="activity-recommendation-box-btn">SAVE</div>
        `;
            activityRecommendationGroup.appendChild(activityRecommendationBox);
        }

        const loaderai = document.querySelectorAll(".loader-ai")[0];
        loaderai.style.filter = "none";
    } catch (error) {
        console.error(error);
        const errorTextRec = document.querySelectorAll(".danger-text-rec")[0];
        errorTextRec.classList.remove("hidden");
    }
}


const saveActivity = (event) => {
    const activityBox = event.target.parentElement;
    const activityTitle = activityBox.querySelector(
        ".activity-recomendation-box-title"
    ).innerText;
    const activityContent = activityBox.querySelector(
        ".activity-recomendation-box-content"
    ).innerText;

    console.log(activityTitle, activityContent);
}

const saveBtn = document.querySelectorAll(".activity-recommendation-box-btn");

saveBtn.forEach((btn) => {
    btn.addEventListener("click", saveActivity);
});