<?php

/**
 * @OA\Info(
 *     title="Blog API",
 *     version="1.0",
 *     description="مستندات API احراز هویت"
 * )
 *
 * @OA\SecurityScheme(
 *     securityScheme="sanctum",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     in="header",
 *     name="Authorization",
 *     description="توکن را به صورت Bearer <token> وارد کنید"
 * )
 */

/**
 * @OA\Schema(
 *     schema="Post",
 *     type="object",
 *     title="Post",
 *     description="ساختار مدل پست",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="title", type="string", example="عنوان پست"),
 *     @OA\Property(property="content", type="string", example="متن کامل پست"),
 *     @OA\Property(property="status", type="string", example="published"),
 *     @OA\Property(property="user_id", type="integer", example=2),
 *     @OA\Property(property="image", type="string", nullable=true, example="posts/example.jpg"),
 *     @OA\Property(property="image_url", type="string", example="https://example.com/storage/posts/example.jpg"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-07-13T12:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-07-13T13:00:00Z")
 * )
 */
