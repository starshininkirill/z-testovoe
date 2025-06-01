<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *     path="/register",
 *     summary="Регистрация нового пользователя",
 *     tags={"Авторизация"},
 *
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name", "email", "password"},
 *             @OA\Property(property="name", type="string", example="Иван Иванов"),
 *             @OA\Property(property="email", type="string", format="email", example="test@mail.ru"),
 *             @OA\Property(property="password", type="string", format="password", example="12345"),
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Успешная регистрация",
 *         @OA\JsonContent(
 *             @OA\Property(property="token", type="string", example="1|abcdef1234567890abcdef1234567890abcdef")
 *         )
 *     ),
 * )
 * @OA\Post(
 *     path="/login",
 *     summary="Вход пользователя",
 *     tags={"Авторизация"},
 *
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"email", "password"},
 *             @OA\Property(property="email", type="string", format="email", example="test@mail.ru"),
 *             @OA\Property(property="password", type="string", format="password", example="12345"),
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Успешный вход",
 *         @OA\JsonContent(
 *             @OA\Property(property="token", type="string", example="1|abcdef1234567890abcdef1234567890abcdef")
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=401,
 *         description="Неверные данные для авторизации",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Неверные данные для авторизации.")
 *         )
 *     )
 * )
 * @OA\Post(
 *     path="/logout",
 *     summary="Выход пользователя",
 *     tags={"Авторизация"},
 *     security={{ "sanctum": {} }},
 *
 *     @OA\Response(
 *         response=200,
 *         description="Пользователь вышел из системы",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Пользователь вышел из системы")
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=401,
 *         description="Unauthenticated.",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Unauthenticated.")
 *         )
 *     )
 * )
 */
class AuthController extends Controller {}
