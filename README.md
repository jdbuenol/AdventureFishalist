# AdventureFishalist

## Requirements

You also need to have php installed with a version
greater than 8.0.0.

And you also need to have composer installed
with a version greater than 2.0.0.

And also make sure to have the following modules installed in your machine:
- php-xml
- php-curl
- php-mysql

## Project main route: src/

## How to Run (inside src/)

Clone this repository in your machine (or download in ZIP version and extract in your working directory), then create a .env with the same layout as the .env.example file inside the `src/` folder but with the configuration according to your working environment.

After having the .env file configured use the following commands:

```
composer update
php artisan migrate
php artisan db:seed
php artisan serve
```

The above commands will create the database structure and seed it with some sample data and will also create a default user with the following credentials:

**Identifier:**  admin@admin.admin  
**Password:** password

This default user counts with admin privileges to access the Admin Panel inside the `HOSTNAME/admin`route.

Whenever you want to start the application again you should use `php artisan serve`