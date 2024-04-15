<p align="center"><a href="#"><img src="/public/img/logo.png" width="400" alt="Weather Craft AI Companion Logo"></a></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

### Weather Craft AI Companion

Weather Craft AI Companion is an AI-powered weather application designed to provide users with necessary weather information for their preferred locations and recommended activities based on the area and weather conditions.

## Solved Problem

Traditional weather applications fail to assist tourists in planning alternative activities in the time of unpredicted weather change. Weather Craft AI Companion aims to address this issue by offering recommendations based on real-time weather data and location information.

## Features

1. **Location-Based Weather Display:** Automatically displays current weather data based on user's location using ipinfo API, GeoCoder API, and OpenWeatherMap's Current Weather API. <br />
2. **5-Day Weather Forecast:** Display the 5-day weather forecast using "3-Hour Forecast 5-Days" API from OpenWeatherMap for the user's detected location. <br />
3. **Activity Recommendations:** Displays the recommended activities based on the location and weather data using Google Gemini API. <br />
4. **Customizable Location:** Allow users to access weather information, forecasts, and recommended activities for their preferred locations. <br />
5. **Save Activities:** Allow users to save recommended activities in their profile. <br />

## Technology Selection

1. **LARAVEL** (blade, breeze) <br />
2. **Frontend** (HTML, CSS, JavaScript)  <br />
3. **Tailwind CSS** <br />
4. **MySQL** <br />

## API Selection

1. **Goolge Gemini API** <br />
2. **OpenWeatherMap API** (current weather, 3-hour forecast 5-days, geocoder API) <br />
3. **IpInfo** <br />

## System Flow

<p align="center"><a href="#"><img src="/public/img/flow.png" width="800" alt="System Flow"></a></p>

## Steps to Run Locally

1. **Clone the Repository:**

```bash
git clone https://github.com/Rumeasiyan/WeatherCraftAICompanion.git
cd WeatherCraftAICompanion
```

2. **Install Dependencies:**

```bash
composer install
```

3. **Set Up Environment Variables:**

Duplicate the `.env.example` file and rename it to `.env`. Update the necessary environment variables such as database credentials and API keys.

4. **Generate Application Key:**

```bash
php artisan key:generate
```

5. **Migrate Database:**

```bash
php artisan migrate
```
*Import Database:*

If you prefer to use the provided SQL file for the database, follow these steps:
   - Locate the `database-backup-1` folder in the repository.
   - Find the SQL file within the folder.
   - Import the SQL file into your MySQL database management system using a tool like phpMyAdmin or MySQL command line.

6. **Start the Development Server:**

```bash
php artisan serve
```

7. **Access the Application:**

Visit the generated link in your web browser to access the application.

## Developed by

MR. SUEENTHIRAN ARULRAJ RUMEASIYAN
