# 🌦️ SkyCast - Weather Dashboard

A modern weather dashboard built with **Symfony 7**, providing real-time weather information and a 5-day forecast using the **Open-Meteo API**.

The application demonstrates clean Symfony architecture with DTOs, service classes, builders, validation, and external API integration.

---

## ✨ Features

* 🔍 Search weather by city
* 🌡️ Current weather conditions
* 📅 5-day weather forecast
* 💨 Wind speed
* 💧 Relative humidity
* 🌡️ Feels-like temperature
* 🌍 Automatic geocoding from city name
* 📱 Responsive modern UI
* ⚠️ Validation and user-friendly error handling

---

## 🛠️ Built With

* PHP 8.3+
* Symfony 7
* Twig
* Symfony Forms
* Symfony Validator
* Symfony Serializer
* Symfony HttpClient
* Open-Meteo Weather API
* Open-Meteo Geocoding API
* HTML5
* CSS3

---

## 🏗️ Project Architecture

The application follows a layered architecture.

```text
Request
    │
    ▼
Controller
    │
    ▼
Symfony Form
    │
    ▼
Validation
    │
    ▼
GeoCodeRequestManager
    │
    ▼
GeoResponseDto
    │
    ▼
WeatherRequestManager
    │
    ▼
WeatherResponseDto
    │
    ▼
Builders
    ├── CurrentWeatherBuilder
    └── DailyForecastBuilder
    │
    ▼
Twig Views
```

### Main Components

* **Controllers** – Handle HTTP requests and orchestrate the workflow.
* **Managers** – Communicate with external APIs.
* **DTOs** – Represent API responses and application data.
* **Builders** – Transform raw API responses into view-friendly objects.
* **Forms** – Handle city search and validation.
* **Twig** – Renders the frontend.

---

## 🚀 Installation

Clone the repository:

```bash
git clone <repository-url>
cd skycast
```

Install dependencies:

```bash
composer install
```

Configure your environment:

```dotenv
WEATHER_API_URL=https://api.open-meteo.com/v1/forecast
GEOCODE_API_URL=https://geocoding-api.open-meteo.com/v1/search
```

Start the Symfony server:

```bash
symfony server:start
```

Open:

```
http://localhost:8000
```

---

## 📁 Project Structure

```text
src/
├── Builder/
├── Controller/
├── Dto/
├── Form/
├── Manager/
└── ...

templates/
public/
config/
```

---

## 💡 Why No Database?

This project intentionally does **not** use a database.

The application retrieves live weather information directly from third-party APIs, making persistent storage unnecessary. The focus of the project is on:

* API integration
* Data transformation
* DTO mapping
* Symfony architecture
* Clean frontend rendering

---

## 📸 Screenshots

> Add screenshots of:
>
> * Home page
> * Search results
> * 5-day forecast
> * Error handling

---

## 🔮 Possible Future Improvements

* User accounts
* Favorite cities
* Search history
* Weather alerts
* Hourly forecast
* Caching API responses
* Dark/Light theme
* Multiple languages
* Unit selection (°C / °F)
* Progressive Web App (PWA)

---

## 📚 What I Learned

During this project I practiced:

* Symfony Forms
* DTO design
* External API integration
* HTTP Client
* Serialization & Denormalization
* Validation
* Builder pattern
* Clean architecture principles
* Twig templating
* Responsive UI development

---

## 📄 License

This project was created for educational and portfolio purposes.
