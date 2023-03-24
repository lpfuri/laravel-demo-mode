## Laravel Demo Mode

Add demo features to your Laravel app.

So you simply want to have a demo installation of your app for everyone to try online. First you seed it with one user to show some credentials to anyone to log in and some data you think it's fine for the demo.

Now this package allows your app to do a few things really easy:

- Blocks one user in the database so it acts as demo user and can't be updated or deleted.
- Tells the app that demo mode is on so it can show demo user credentials.
- Make a backup of the demo database that will be restored in some regular period of time.

Right now this package only works with eloquent extended users and mysql databases.

## Installation

Install the package through [Composer](http://getcomposer.org/). 

Run the Composer require command from the Terminal:

	composer require lpfuri/laravel-demo-app

## Usage

After installing the package you can have everything done in three steps:

### Set database backup

Use the package facade (Lpfuri\LaravelDemoMode\Facades\DemoMode) and use this to check app state and show demo user credentials:
```php
DemoMode::isDemoModeOn();
```

### Backup database for restoring

Type in terminal:
```buildconfig
php artisan demo-mode:backup
```

### Set demo mode on

Type in terminal:
```buildconfig
php artisan demo-mode:on
```

By default user with id value 1 will be the demo user and database will be restored every day (Schedule must be running). You can change this values in the config file.
Keep in mind that whenever a user tries to update or delete the demo user an error will be thrown.

More stuff you can do:

### Set demo mode off

Type in terminal:
```buildconfig
php artisan demo-mode:off
```

### Manually restore the database

Type in terminal:
```buildconfig
php artisan demo-mode:restore
```

### Get demo user

```php
DemoMode::user();
```







