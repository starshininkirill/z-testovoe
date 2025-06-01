<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;


/**
 * @OA\Post(
 *     path="/v1/tenders",
 *     summary="Создание тендера",
 *     tags={"Тендеры"},
 *     security={{ "sanctum": {} }},
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="name", type="text", example="Тендера на стройматериалы"),
 *                     @OA\Property(property="status", type="text", example="Открыто"),
 *                     @OA\Property(property="number", type="text", example="1724-2"),
 *                     @OA\Property(property="external_code", type="integer", example="53228"),
 *                 )
 *             }
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="ОК",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="integer", example="1"),
 *                 @OA\Property(property="name", type="text", example="Тендера на стройматериалы"),
 *                 @OA\Property(property="status", type="text", example="Открыто"),
 *                 @OA\Property(property="number", type="text", example="1724-2"),
 *                 @OA\Property(property="external_code", type="integer", example="53228"),
 *                 @OA\Property(property="date", type="string", format="date", example="2025-06-01T18:36:50.000000Z"),
 *             ),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthenticated.",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Unauthenticated.")
 *         )
 *     )
 * ),
 * @OA\Get(
 *     path="/v1/tenders",
 *     summary="Получение списка тендеров",
 *     tags={"Тендеры"},
 *     security={{ "sanctum": {} }},
 *     @OA\Parameter(
 *         name="name",
 *         in="query",
 *         description="Фильтр по названию тендера",
 *         required=false,
 *         @OA\Schema(type="string", example="Тендер")
 *     ),
 *     @OA\Parameter(
 *         name="date",
 *         in="query",
 *         description="Фильтр по дате (формат Y-m-d)",
 *         required=false,
 *         @OA\Schema(type="string", format="date", example="2022-08-14")
 *     ),
 *     @OA\Parameter(
 *         name="per_page",
 *         in="query",
 *         description="Количество записей на страницу",
 *         required=false,
 *         @OA\Schema(type="integer", minimum=1, maximum=100, example=20)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="ОК",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="array", @OA\Items(
 *                 @OA\Property(property="id", type="integer", example="1"),
 *                 @OA\Property(property="name", type="text", example="Тендера на стройматериалы"),
 *                 @OA\Property(property="status", type="text", example="Открыто"),
 *                 @OA\Property(property="number", type="text", example="1724-2"),
 *                 @OA\Property(property="external_code", type="integer", example="53228"),
 *                 @OA\Property(property="date", type="string", example="2025-06-01T18:36:50.000000Z"),
 *             )),
 *             @OA\Property(
 *                 property="links",
 *                 type="object",
 *                 description="Навигационные ссылки для пагинации",
 *                 @OA\Property(property="first", type="string", example="http://127.0.0.1:8000/api/v1/tenders?page=1"),
 *                 @OA\Property(property="last", type="string", example="http://127.0.0.1:8000/api/v1/tenders?page=1"),
 *                 @OA\Property(property="prev", type="string", nullable=true, example=null),
 *                 @OA\Property(property="next", type="string", nullable=true, example=null),
 *             ),
 *
 *             @OA\Property(
 *                 property="meta",
 *                 type="object",
 *                 description="Метаинформация о пагинации",
 *                 @OA\Property(property="current_page", type="integer", example=1),
 *                 @OA\Property(property="from", type="integer", example=1),
 *                 @OA\Property(property="last_page", type="integer", example=1),
 *                 @OA\Property(
 *                     property="links",
 *                     type="array",
 *                     description="Массив ссылок на страницы",
 *                     @OA\Items(
 *                         @OA\Property(property="url", type="string", nullable=true, example="http://127.0.0.1:8000/api/v1/tenders?page=1"),
 *                         @OA\Property(property="label", type="string", example="1"),
 *                         @OA\Property(property="active", type="boolean", example=true),
 *                     )
 *                 ),
 *                 @OA\Property(property="path", type="string", example="http://127.0.0.1:8000/api/v1/tenders"),
 *                 @OA\Property(property="per_page", type="integer", example=20),
 *                 @OA\Property(property="to", type="integer", example=15),
 *                 @OA\Property(property="total", type="integer", example=15),
 *             )
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthenticated.",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Unauthenticated.")
 *         )
 *     )
 * )
 * @OA\Get(
 *     path="/v1/tenders/{id}",
 *     summary="Получение тендера",
 *     tags={"Тендеры"},
 *     security={{ "sanctum": {} }},
 *     @OA\Parameter(
 *         description="ID тендера",
 *         in="path",
 *         name="id",
 *         required=true,
 *         @OA\Schema(type="integer"),
 *         example=1
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="ОК",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="integer", example="1"),
 *                 @OA\Property(property="name", type="text", example="Тендера на стройматериалы"),
 *                 @OA\Property(property="status", type="text", example="Открыто"),
 *                 @OA\Property(property="number", type="text", example="1724-2"),
 *                 @OA\Property(property="external_code", type="integer", example="53228"),
 *                 @OA\Property(property="date", type="string", format="date", example="2025-06-01T18:36:50.000000Z"),
 *             ),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthenticated.",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Unauthenticated.")
 *         )
 *     )
 * )
 * 
 */
class TenderController extends Controller {}
