# Stripe Payment Portal
This project was created in Laravel 5.8 utilising the Cartalyst [stripe-php](https://github.com/cartalyst/stripe) 
library, integrated using their [Stripe-Laravel](https://github.com/cartalyst/stripe-laravel) package integration for Laravel.

The intent is for this project to be as plug and play as possible, simply input your stripe api keys into the .env file as
per instructions below (for running locally) or via your deployment method of choice (for deployment).
## Technology used
* Laravel 5.8
* Jquery 3.4.1
* cartalyst/stripe-laravel 10.0.0
* stripe/stripe-php
* barryvdh/laravel-ide-helper 2.6 (For local development on "Problem" ide's like php storm)
## Installation
After cloning the Repo navigate into the project folder using your terminal and start by installing all needed dependencies.
```bash
 composer install
```
then
```bash
 yarn
```
or
```bash
 npm install
```
## Config
Now you'll need to do some quick config tasks, first run the below command to creat your .env file.
```bash
 cp .env.example .env
```
It should look something like this
```bash
 APP_NAME=Laravel
 APP_ENV=local
 APP_KEY=
 APP_DEBUG=true
 APP_URL=http://localhost
 
 LOG_CHANNEL=stack
 
 DB_CONNECTION=mysql
 DB_HOST=127.0.0.1
 DB_PORT=3306
 DB_DATABASE=homestead
 DB_USERNAME=homestead
 DB_PASSWORD=secret
 
 BROADCAST_DRIVER=log
 CACHE_DRIVER=file
 QUEUE_CONNECTION=sync
 SESSION_DRIVER=file
 SESSION_LIFETIME=120
 
 REDIS_HOST=127.0.0.1
 REDIS_PASSWORD=null
 REDIS_PORT=6379
 
 MAIL_DRIVER=smtp
 MAIL_HOST=smtp.mailtrap.io
 MAIL_PORT=2525
 MAIL_USERNAME=null
 MAIL_PASSWORD=null
 MAIL_ENCRYPTION=null
 
 AWS_ACCESS_KEY_ID=
 AWS_SECRET_ACCESS_KEY=
 AWS_DEFAULT_REGION=us-east-1
 AWS_BUCKET=
 
 PUSHER_APP_ID=
 PUSHER_APP_KEY=
 PUSHER_APP_SECRET=
 PUSHER_APP_CLUSTER=mt1
 
 MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
 MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```
Now add these two lines at the bottom of your .env file, replacing the values with your api key values from the stripe dashboard.
```bash
STRIPE_KEY=pk_test_xxxxxxxxxxxxxxxxxxxxxxxxx
STRIPE_SECRET=sk_test_xxxxxxxxxxxxxxxxxxxxxxxxx
```
If you don't have this information go to "Developer" -> "Api keys"
## Running the project
And you're pretty much there, just run the below and go to your browser to see it running.
```bash
php artisan serve
```

## To do

Implement authentication layer for logging (Commissions etc)


