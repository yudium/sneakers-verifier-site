
## Installation

```
$ composer install
$ cp .env.example .env     # create .env file based on example given by Laravel
$ vim .env                 # now configure your database
$ php artisan migrate      # create database and tables
$ php artisan db:seed      # populate database
```

## Useful command

```
php artisan 
php artisan config:cache clear
php artisan cache:clear
php artisan migrate:refresh --seed
```
