# Laravel Domain Skeleton

[![Source Code][badge-source]][source]
[![Software License][badge-license]][license]
[![Total Downloads][badge-downloads]][downloads]

gerfey/laravel-domain-skeleton creating a skeleton domain framework.

## Installation

The preferred method of installation is via [Packagist][] and [Composer][]. Run
the following command to install the package and add it as a requirement to your
project's `composer.json`:

```bash
composer require gerfey/laravel-domain-skeleton
```

## Usage

### Settings

1. Use command ```text php artisan vendor:publish ``` and select tag: ***domain-skeleton***
2. Check files ***domain-skeleton.php*** to path ***.../laravel-project/config/***
3. Create the ***DOMAIN_SKELETON_DIRECTORY*** key in the file ***.env*** with the name of the default domain group.
4. Creating a skeleton domain ```text php artisan make:skeleton:domain Test ```
5. Find in file ***app.php*** follow the path ***.../laravel-project/config/*** array ***providers*** and add a new service provider TestServicesProvider:: class

## Create structure

After the command is executed, a structure is created for Domain: Test

```
- Domain
 - Test
    - Database
        + Migrations
        - Models
            Test.php
        - Repository
            TestRepository.php
    - Http
        - Controller
            TestController.php
        + Middleware
        + Requests
    - Routes
        api.php
    TestServicesProvider.php
```

### Domain/Test/Database/Models/Test.php

```php
<?php

namespace App\Domain\Test\Database\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    /**
     * @var string
     */
    protected $table = 'test';

    /**
     * @var bool
     */
    public $timestamps = false;
}
```

### Domain/Test/Database/Repository/TestRepository.php

```php
<?php

namespace App\Domain\Test\Database\Repository;

use App\Services\Test\Database\Models\Test;
use Gerfey\Repository\Repository;

class TestRepository extends Repository
{
    /**
     * @var string
     */
    protected $entity = Test::class;
}
```

### Domain/Test/Http/Controller/TestController.php

```php
<?php

namespace App\Domain\Test\Http\Controller;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\JsonResponse;

class TestController extends BaseController
{
    public function index(): JsonResponse
    {
        return new JsonResponse([], 200);
    }
}
```

### Domain/Test/Routes/api.php

```php
<?php

use App\Domain\Test\Http\Controller\TestController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(
    function () {
        Route::get('test', [TestController::class, 'index']);
    }
);
```

### TestServicesProvider.php

```php
<?php

namespace App\Domain\Test;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Route;

class TestServicesProvider extends ServiceProvider
{
    protected $namespace = 'App\Domain\Test\Http\Controller';

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');
        }

        parent::boot();
    }

    public function map()
    {
        $this->mapRoutes();
    }

    protected function mapRoutes()
    {
        Route::middleware('api')
            ->prefix('api')
            ->namespace($this->namespace)
            ->group(base_path('app/Domain/Test/Routes/api.php'));
    }
}
```

For verification, you can make a request via the route ***/api/v1/test*** and get a 200 status response.

## Copyright and License

The gerfey/laravel-domain-skeleton library is copyright © [Alexander Levchenkov](https://vk.com/gerfey) and
licensed for use under the MIT License (MIT). Please see [LICENSE][] for more
information.

[packagist]: https://packagist.org/packages/gerfey/laravel-domain-skeleton
[composer]: http://getcomposer.org/

[badge-source]: https://img.shields.io/badge/source-gerfey/laravel-domain-skeleton-blue.svg?style=flat-square
[badge-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[badge-build]: https://img.shields.io/travis/gerfey/laravel-domain-skeleton/master.svg?style=flat-square
[badge-downloads]: https://img.shields.io/packagist/dt/gerfey/laravel-domain-skeleton.svg?style=flat-square

[source]: https://github.com/gerfey/laravel-domain-skeleton
[release]: https://packagist.org/packages/gerfey/laravel-domain-skeleton
[license]: https://github.com/gerfey/laravel-domain-skeleton/blob/master/LICENSE
[build]: https://travis-ci.org/gerfey/laravel-domain-skeleton
[downloads]: https://packagist.org/packages/gerfey/laravel-domain-skeleton
