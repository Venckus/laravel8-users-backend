# Project information

## Tech stack

Dockerized laravel 8.* version using PHP 7.4 nginx, mysql 8 servers. In addition phpmyadmin is added as required.

## Setup

Automated project setup is not created. Thus run few commands to make project ready to use:
1. `composer install`,
2. `php artisan key:generate`,
3. run in laravel 'app' container with command: `docker-compose exec app php artisan migrate`,
4. run in laravel 'app' container with command: `docker-compose exec app php artisan db:seed --class=UserSeeder`
5. run tests in laravel 'app' container with command: `docker-compose exec app php artisan test`.
