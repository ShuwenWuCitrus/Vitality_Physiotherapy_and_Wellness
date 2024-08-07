# Vitality Wellness
Vitality Wellness is a  web application designed to allow users to create, read, update and delete appointments, integrating a Blade frontend with a Laravel backend. This README provides a detailed explanation of the application, its components, and how to get started.

## Table of Contents
- [Introduction](#introduction)
- [Technologies Used](#technologies-used)
  - [Frontend](#frontend)
  - [Backend](#backend)
- [Installation](#installation)
- [Running the Application](#running-the-application)
- [Conclusion](#conclusion)

## Introduction
This application was conceived as a comprehensive solution for managing appointments, offering seamless integration of a dynamic Blade front-end and a robust, scalable Laravel back-end. This amalgamation of technologies ensures that developers can focus on building features without the usual setup overhead. 
Built as a Capstone Project for [WDIA's level 3 class, Web Applications Development](https://www.algonquincollege.com/sat/program/web-development-internet-applications/#courses), this application demonstrates the power and flexibility of modern web development frameworks.

## Technologies Used

### Frontend
- **HTML**: Markup language used for structuring the web pages.
- **Blade**: Laravel's templating engine used for rendering views.
- **Tailwind CSS**: Utility-first CSS framework used for styling the application.
- **JavaScript**: Used for client-side interactivity and dynamic content.

### Backend
- **Laravel**: PHP framework used for building the web application's backend.
- **PHP**: Server-side scripting language used by Laravel.
- **MySQL**: SQL database used for data storage and retrieval.

### Tools and Utilities
- **Composer**: Dependency management tool for PHP, used to manage Laravel and other PHP packages.
- **NPM/Yarn**: Package managers for JavaScript, used to manage Tailwind CSS and other front-end dependencies.
- **Artisan**: Laravel's command-line interface used for various development tasks.
- **Sanctum**: Laravel package used for API authentication and managing user sessions.

## Installation

To set up the Vitality Wellness application on your local machine, this tutorial assumes you have Laragon/XAMPP (Windows) or Valet (macOS):

1. **Clone the Repository on C:\laragon\www**:
    ```bash
    https://github.com/ShuwenWuCitrus/Vitality_Physiotherapy_and_Wellness.git
    cd Vitality_Physiotherapy_and_Wellness
    ```

2. **Use Laragon's Terminal to Install PHP Dependencies**:
    Make sure you have Composer installed. Then run:
    ```bash
    composer install
    ```

3. **Install JavaScript Dependencies**:
    Make sure you have Node.js and NPM or Yarn installed. Then run:
    ```bash
    npm install
    # or
    yarn install
    ```

4. **Set Up Environment Variables**:
    Copy the `.env.example` file to `.env` and configure your environment variables, especially the database settings.
    ```bash
    cp .env.example .env
    ```

5. **Generate Application Key**:
    ```bash
    php artisan key:generate
    ```

6. **Run Database Migrations and Seeders**:
    Ensure your database is set up and configured in the `.env` file. Then run:
    ```bash
    php artisan migrate --seed
    ```

7. **Build Frontend Assets**:
    Use Vite to build the frontend assets:
    ```bash
    npm run dev
    # or
    yarn dev
    ```

## Running the Application

To run the Vitality Wellness application, follow these steps:

1. **Start the Development Server**:
    If you are using Laragon, XAMPP, or Valet, ensure your local server is running. Then start the Laravel development server:
    ```bash
    php artisan serve
    ```

2. **Run Vite in Watch Mode**:
    To automatically rebuild frontend assets during development, run Vite in watch mode:
    ```bash
    npm run dev
    # or
    yarn dev
    ```

3. **Access the Application**:
    Open your web browser and navigate to `http://localhost:8000` (or the URL provided by your local server setup).

Now you should be able to access and interact with the Vitality Wellness application on your local machine.

## Conclusion
This web application is intended to fulfill the professor's requirements for the Capstone Project.

---

**Made by [Arthur Duarte](https://github.com/o2thur), [Shuwen Wu](https://github.com/ShuwenWuCitrus) and [Ernesto Dávila](https://github.com/ernestodavilacardona)**