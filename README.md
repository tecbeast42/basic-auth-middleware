# BasicAuthWithEnv
A middleware for Laravel 5.1+ where you can use basic auth with any webserver. Depending only on one config file.

## Installation

```
composer require tecbeast/basic-auth-with-env
```

Add the service provider to the providers array in config/app.php:
```
'providers' => [

    ...

    TecBeast\BasicAuthWithEnv\BasicAuthServiceProvider::class,

],
```

Add the middleware to the middleware array (for global, otherwise add to route or group (Laravel 5.2+)) in app/Http/Kernel.php:
```
protected $middleware = [
    ...
    \TecBeast\BasicAuthWithEnv\Middleware\BasicAuth::class,
];
```

Publish the config to your application:
```
php artisan vendor:publish --provider="TecBeast\BasicAuthWithEnv\BasicAuthServiceProvider"
```
