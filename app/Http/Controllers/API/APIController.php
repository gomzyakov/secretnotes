<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class APIController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function helloWorld(): JsonResponse
    {
        return new JsonResponse([
            'slug' => 'Hello, World!',
        ], 200);
    }
}
