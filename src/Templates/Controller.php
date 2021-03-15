<?php

namespace App\__DOMAIN_SKELETON_DIRECTORY__\__DomainName__\Http\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class __DomainName__Controller extends Controller
{
    public function index(): JsonResponse
    {
        return new JsonResponse([], 200);
    }
}
