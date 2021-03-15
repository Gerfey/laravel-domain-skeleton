<?php

use App\__DOMAIN_SKELETON_DIRECTORY__\__DomainName__\Http\Controller\__DomainName__Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(
    function () {
        Route::get('__DomainNameLower__', [__DomainName__Controller::class, 'index']);
    }
);
