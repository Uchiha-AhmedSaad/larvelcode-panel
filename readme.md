
Have you encountered a problem that you want to work the control panel for Admin quickly without consuming your time  now you can do it with the larvelcode-panel  Now you can work  without wasting your valuable time We help you make a control panel one  click 

## Install

Using Composer

```
composer require larvelcode/panel:dev-master
``` 
composer.json file search for require and add this packages in the end of it 

```php
        "codecourse/notify": "^1.1",
        "laravelcollective/html": "^5.5"
```
Add the service provider to `config/app.php`

```php
        Collective\Html\HtmlServiceProvider::class,
        Codecourse\Notify\NotifyServiceProvider::class,
        larvelcode\panel\LaravelPanelProvider::class,
```
add to aliases
```php
        'Form' => Collective\Html\FormFacade::class,
        'Html' => Collective\Html\HtmlFacade::class,
        'Notify' => Codecourse\Notify\Facades\Notify::class,
```

open app/Http/kernal.php on protected $routeMiddleware add this
```php
'admin'      =>\App\Http\Middleware\IsAdmin::class,
```
## Usage

### Basic

From your application,  in your controller.

```
php artisan storage:link

php artisan make:auth

php artisan vendor:publish

```

and then press 0 to copy all files in directory
