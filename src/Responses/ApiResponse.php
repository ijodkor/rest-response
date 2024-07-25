<?php

namespace Ijodkor\LaravelApiResponse\Responses;

use Illuminate\Http\JsonResponse;

trait ApiResponse {

    protected function success(array $data = [], $message = 'Muvaffaqiyatli'): JsonResponse {
        return response()->json([
            'success' => true,
            'data' => [...$data],
            'msg' => $message
        ]);
    }

    protected function created(array $data = [], $message = 'Muvaffaqiyatli'): JsonResponse {
        return response()->json([
            'success' => true,
            'data' => [...$data],
            'msg' => $message
        ], 201);
    }

    protected function fail($errors = [], $message = 'Muvaffaqiyatsiz', int $status = 400): JsonResponse {
        return response()->json([
            'success' => false,
            'errors' => $errors,
            'msg' => $message
        ], $status);
    }

    protected function error(string $msg = 'Ichki xatolik yuz berdi!', $errors = []): JsonResponse {
        return response()->json([
            'success' => false,
            'errors' => $errors,
            'msg' => $msg
        ], 400);
    }

    protected function unAuthorized($msg = "Kirishga ruxsat berilmagan"): JsonResponse {
        return response()->json([
            'success' => false,
            'msg' => $msg
        ], 401);
    }

    protected function result($data = [], $msg = 'Muvaffaqiyatli'): JsonResponse {
        return response()->json([
            'success' => true,
            'data' => $data,
            'msg' => $msg
        ], options: JSON_NUMERIC_CHECK);
    }
}
