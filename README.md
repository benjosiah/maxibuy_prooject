# Prooject setup
step by step procedure on how to set up this project on yur local machine
## Clone project

to lone the project ru the comand below

``
git clone https://github.com/benjosiah/maxibuy_prooject.git
``
## instsall dependencies

`composer install`

## configure enviroment variebles

- create a `.env` file and configure it.

- generate the app key by runing ` php artisan key:generate `

- set your database and redis credentials in your `.env` file

## run migrations

` php artisan migrate`

## start the serve

`php artisan serve `

## run test

`vendor/bin/phpunit `






