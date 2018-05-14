

## Install

Using Composer

```
composer require larvelcode/panel:dev-master
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

In kernal.php
```php
'admin'      =>\App\Http\Middleware\IsAdmin::class,
```
in routes/web.php

```php
Auth::routes();
Route::get('/adminpanel'                            , 'admincpcontroller@index')->name('mainpage');
//Users
Route::get('adminpanel/users'                       , 'userscontroller@index'  )->name('allusers');
Route::get('adminpanel/create_registration'         , 'userscontroller@create' )->name('create_registration');
Route::post('/adminpanel/store_registration'        , 'userscontroller@store'  )->name('store_registration');
Route::get('adminpanel/edit_user/{slug}'            , 'userscontroller@edit'   )->name('edit_user');
Route::patch('adminpanel/update_userinfo/{slug}'    , 'userscontroller@update' )->name('update_userinfo');
Route::post('adminpanel/delete_users'               , 'userscontroller@destory')->name('delete_user');
Route::post('adminpanel/delete_all_users'               , 'userscontroller@destoryall')->name('delete_all_users');
Route::post('adminpanel/users/select_user_picture'  ,'userscontroller@select_picutre')->name('select_user_picture');
Route::post('adminpanel/users/delete_user_picture'  ,'userscontroller@delete_picture')->name('delete_user_picture');
```



## Usage

### Basic

From your application,  in your controller.

```
php artisan make:auth


php artisan vendor:publish

```

and then press 0 to copy all files in directory
