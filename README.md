### how to create a laravel project
``` 
composer create-project laravel/laravel laravel-amadeus-sdk-demo 
cd laravel-amadeus-sdk-demo
```

### how to run a laravel project
``` php artisan serve ``` or
``` php -S localhost:8000 -t public/ ```


### how to install amadeus php sdk
```
composer require amadeus4dev/amadeus-php
```

### how to make controller
```
php artisan make:controller Api/AmadeusController
```

### how to make resource
```
php artisan make:resource AmadeusResource
```
If you check the code for ```AmadeusResource``` and  ```AmadeusDestinationResource```,
you will find two different way to define the response for API.
And Amadeus PHP SDK provides a function that support the laravel native function```toArray()```,
which will be convenient for users to have only one common resource for all the APIs.

