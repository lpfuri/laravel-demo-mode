## Laravel Demo Mode

Add demo features to your Laravel app.

So you simply want to have a demo installation of your app for everyone to try online. First you seed it with one user to show some credentials to anyone to log in and some data you think it's fine for the demo.

Now this package allows your app to do a few things really easy:

- Blocks one user in the database so it acts as demo user and can't be updated or deleted.
- Tells the app that demo mode is on so it can show demo user credentials.
- Make a backup of the demo database that will be restored in some period of time.

## Installation

Install the package through [Composer](http://getcomposer.org/). 

Run the Composer require command from the Terminal:

	composer require lpfuri/laravel-demo-app

## Usage

After installing the package you can have everything done in two steps using the terminal:

### Set database backup

Type in terminal:
```buildconfig
php artisan demo-mode:backup
```

### Set demo mode on

Type in terminal:
```buildconfig
php artisan demo-mode:on
```





