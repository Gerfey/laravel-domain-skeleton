<?php

namespace App\__DOMAIN_SKELETON_DIRECTORY__\__DomainName__\Http\Controller;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\JsonResponse;

class __DomainName__Controller extends BaseController
{
    public function index(): JsonResponse
    {
        return new JsonResponse([], 200);
    }
}
