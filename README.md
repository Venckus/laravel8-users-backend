# Project information

## Tech stack

Dockerized laravel 8.* version using PHP 7.4 nginx, mysql 8 servers. In addition phpmyadmin is added as required.

## Setup

Automated project setup is not created. Thus run few commands to make project ready to use:
1. `composer install`,
2. `php artisan key:generate`,
3. run in laravel 'app' container with command: `docker-compose exec app php artisan migrate`,
4. run in laravel 'app' container with command: `docker-compose exec app php artisan db:seed --class=UserSeeder` 

# Task definition

Užduotis yra sukurti švarų Laravel projektą ir jame pavaizduoti gebėjimą panaudoti “Build in” Laravel
framework’o funkcionalumą. Užduotį reikia sukelti į naują GIT repozitoriją: Github, Bitbucket ar pan. Ir
suteikti public teises. Kiekvienas repozitorijos commit turi atitikti vieną užduotį. Commit’ų Master
branch’e negali būti daugiau, nei užduočių žemiau esančiame sąraše:
1. Privaloma užduotis: Inicijuoti švarų Laravel projektą.
2. Neprivaloma užduotis: Paruošti Docker aplinką Laravel projektui. Negalima naudoti Laravel Sail
a. Docker aplinka: MySQL, phpMyAdmin, Apache2 arba nginx, PHP 7.4 arba 8.0.^.
3. Privaloma užduotis: Paruošti migracijų failą User moduliui: įdėti stulpelius: id, email, name,
surname, views_count, timestamps.
4. Privaloma užduotis: Paruošti User lentelės Seed failą, kuris sukeltų 500 unikalių vartotojų, kurių
email domenas būtų: teltonika.lt.
5. Privaloma užduotis: Paruošti adresus, į kuriuos užeinant būtų galima gauti tam tikrą informaciją.
Kiekvieną kartą užeinant į bet kurį adresą turėtų didėti parodyto vartotojo / vartotojų
views_count skaitliukas. Informacija atvaizdavimui (naudoti dd helperį):
a. Visus vartotojus (Collection).
b. Vieną random vartotoją (pilną array skirta FrontEnd naudojimui).
c. Vartotoją, kurio ID yra 1 ir atvaizduoti tokį array: email, full_name, created_at.
6. Neprivaloma užduotis: Parašyti metodą, kuris atfiltruos visus visus vartotojus, kurių peržiūrų
skaičius viršija 10. Metodas turi būti kviečiamas per Eloquent ORM, pvz: Users::mostPopular()‐
>get();
7. Privaloma užduotis: Parašyti atskirą servisą, kuris atrinks visus vartotojus, kurių email turi „john“
eilutę.
8. Neprivaloma užduotis: Parašyti automatini Unit testą sukurtam servisui.