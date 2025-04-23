# Laravel API Responses

Laravel API Response api uchun moslangan bo&#8216;lib, mijoz javobni JSON shaklida qaytaruvchi va unga shakl berib
jo&#8216;natuvchi kutibxona.

Laravel API Response is a package that helps to provide and render a consistent HTTP JSON responses to API calls as well
as converting and formatting exceptions to JSON responses.

## Talablar (Requirements)

- PHP ^8.1
- Laravel ^10 | ^11

## Talqinlar mutonosibligi (Version Compatibility)

| Laravel | Laravel API Response | 
|:--------|:---------------------|
| 10.x    | 1.x                  |
| 11.x    | 1.2.x                |

## O&#8216;rnatish (Installation)

Install the package via composer:

```bash
composer require ijodkor/laravel-api-response
```

## Ishlatish (Usage)

RestResponse trait faylini asosiy Controller fayliga yoki kerakli Controller fayliga qo&#8216;shish <br>
(Add RestResponse trait to app module Controller file or any controller which is needed)

```php
use Ijodkor\ApiResponse\Responses\RestResponse;

class Controller extends Controller {
    use RestResponse;
}

...

class UserController extends Controller {
    public function show() {
        return $this->success([
            'user' => new User();
        ]);
    }
}
```

### Mavjud funksiyalar (Available functions)

| Nomi (name)  |                      Izoh (description)                       | Status |
|:-------------|:-------------------------------------------------------------:|-------:|
| success      |                        Muvaffaqiyatli                         |    200 |
| created      |                        Muvaffaqiyatli                         |    201 |
| fail         |                     Xatolik yuz berganda                      |  [400] |
| error        |                         Ichki xatolik                         |    500 |
| unAuthorized |                  Manzilga ruxsat yo&#8216;q                   |  [401] |
| result       |              Javobda raqam va satrlar moslangan               |    200 |
| paginated    |                   Sahiflangan ro&#8216;yxat                   |    200 |
| paged        | Sahiflangan ro&#8216;yxat (qo&#8216;shimcha maydonlari bilan) |    200 |

### Sovg&#8216;a (Bonus)

This package also provided RestRequest to return json response Request validations

```php
use Ijodkor\ApiResponse\Requests\RestRequest;

// class UserRequest extends FormRequest - x
class UserRequest extends RestRequest {

}
```

PaginationRequest

```php
use Ijodkor\ApiResponse\Requests\PaginationRequest;

// class UserRequest extends FormRequest - xxx
class UserRequest extends PaginationRequest {

}
```

### Kengaytirish (Extend)


```php
use Ijodkor\ApiResponse\Requests\BuilderPaginator;

class UserService {
    
    public function all() {
        // Paginate users
        $users = User::query()->paginate();
        $items = $users->items();
        
        // Change content of paginated list
        $data = collect($items)->map(function(User $user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
            ];
        });
        
        return new BuilderPaginator($users, $data);
    }
}


class UserController extends Controller {
    ...
    
    public function show() {
        $users = $this->service->all();
        
        // paged/paginated
        return $this->paged('users', $users, []);
    }
}
```

# Foydalanilgan manbalar (References)

- [Testbench](https://packages.tools/testbench) Laravel Testing Helper for Packages Development

# Foydali havolalar (Links)

- [Create Laravel package](https://laravel-news.com/building-your-own-laravel-packages)
- [Create package](https://medium.com/@prevailexcellent/how-i-created-my-third-laravel-package-step-by-step-guide-ad3fb0da5399)
