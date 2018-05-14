

## Install

Using Composer

```
composer require larvelcode/panel
```

Add the service provider to `config/app.php`

```php
        Collective\Html\HtmlServiceProvider::class,
        Codecourse\Notify\NotifyServiceProvider::class,
        Barryvdh\Debugbar\ServiceProvider::class,
        larvelcode\tagcategories\CattagServiceProvider::class,
        larvelcode\panel\LaravelPanelProvider::class,
```
add to aliases
```php
        'Form' => Collective\Html\FormFacade::class,
        'Html' => Collective\Html\HtmlFacade::class,
        'Notify' => Codecourse\Notify\Facades\Notify::class,
        'Debugbar' => Barryvdh\Debugbar\Facade::class,
```


## Usage

### Basic

From your application,  in your controller.

```
php artisan make:auth


php artisan vendor:publish

```

and then press 0 to copy all files in directory
