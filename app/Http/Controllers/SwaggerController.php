<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Swagger\Annotations\Info;
use Swagger\Annotations\OA;
/**
 * @OA\Info(title="My First API", version="0.1")
 */

/**
 * @OA\Get(
 *     path="/api/resource.json",
 *     @OA\Response(response="200", description="An example resource")
 * )
 */
class SwaggerController extends Controller
{
   public function doc()
   {
    //  $swagger = \OpenApi\scan(app_path('Http/Controllers/Api'));
    //  return response()->json($swagger);
   }
}

