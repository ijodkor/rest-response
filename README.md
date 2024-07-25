# Laravel/Api-Responses

Laravel API Response is a package that helps to provide and render a consistent HTTP JSON responses to API calls as well
as converting and formatting exceptions to JSON responses.

## Requirements

- PHP ^7.4|8.1

## Version Compatibility

 Laravel | Laravel API Response 
:--------|:---------------------
 10.x    | 1.x                  
 11.x    | 1.2.x                

## Installation

Install the package via composer:

```bash
composer require ijodkor/laravel-api-response
```

## Usage

Add ApiResponse trait to app module Controller file or any controller which is needed

```php
class Controller extends Controller {
    use ApiResponse;
}
```

### Bonus

This package also provided RestRequest to return json response Request validations

```php
use Ijodkor\LaravelApiResponse\Requests\RestRequest;

// class UserRequest extends FormRequest - x
class UserRequest extends RestRequest {

}
```

# References

- [Testbench](https://packages.tools/testbench) Laravel Testing Helper for Packages Development

# Links

- [Create Laravel package](https://laravel-news.com/building-your-own-laravel-packages)