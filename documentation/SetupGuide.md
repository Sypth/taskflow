# SetupGuide

## Prerequisites

Before setting up the project, make sure you have the following prerequisites installed:

-   PHP (Version 8.*)
-   Node.js (Latest version)
-   Composer (Latest version)
-   Laravel (Version 11.*)
-   Docker Desktop (Latest version)

## Setup Project

Follow these steps and run the provided commands to set up the project:
```bash
# Install the following on your code editor terminal e.g PhpStorm / VSCode.
- command: composer install
- command: composer clear
- command: composer dump-autoload
- command: php artisan key:generate # make sure that .env file is already exist. If not, copy and rename .env.example into .env
- command: npm i
- command: npm run dev
- command: php artisan serve
```

## Useful Commands
-   php artisan serve
-   npm run dev
-   php artisan route:clear
-   php artisan route:list
-   php artisan optimize
-   composer dump-autoload
-   docker compose up

