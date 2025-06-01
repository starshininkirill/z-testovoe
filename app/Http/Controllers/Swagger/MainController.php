<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     version="1.0",
 *     title="API документация"
 * )
 * @OA\Server(
 *     url="/api",
 *     description="Основной API сервер"
 * )
 * @OA\Components(
 *     @OA\SecurityScheme(
 *         securityScheme="sanctum",
 *         type="http",
 *         scheme="bearer",
 *         bearerFormat="Laravel Sanctum Token",
 *         description="Аутентификация через токен Laravel Sanctum"
 *     )
 * )
 */
class MainController extends Controller
{
    //
}
