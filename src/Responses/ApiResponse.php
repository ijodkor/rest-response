<?php

namespace Ijodkor\ApiResponse\Responses;

use Ijodkor\ApiResponse\Supporters\ListPaginator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;

trait ApiResponse {

    protected function success(array $data = [], $message = 'Muvaffaqiyatli'): JsonResponse {
        return response()->json([
            'success' => true,
            'data' => [...$data],
            'message' => $message
        ]);
    }

    protected function created(array $data = [], $message = 'Muvaffaqiyatli'): JsonResponse {
        return response()->json([
            'success' => true,
            'data' => [...$data],
            'message' => $message
        ], 201);
    }

    protected function fail($errors = [], $message = 'Muvaffaqiyatsiz', int $status = 400): JsonResponse {
        return response()->json([
            'success' => false,
            'errors' => $errors,
            'message' => $message
        ], $status);
    }

    protected function error(string $msg = 'Ichki xatolik yuz berdi!', $errors = []): JsonResponse {
        return response()->json([
            'success' => false,
            'errors' => $errors,
            'message' => $msg
        ], 500);
    }

    protected function unAuthorized($message = "Kirishga ruxsat berilmagan"): JsonResponse {
        return response()->json([
            'success' => false,
            'message' => $message
        ], 401);
    }

    /** Bonuses **/
    protected function result($data = [], $message = 'Muvaffaqiyatli'): JsonResponse {
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => $message
        ], options: JSON_NUMERIC_CHECK);
    }

    protected function paginated($data, string $key, string|null $message = 'Muvaffaqiyatli'): JsonResponse {
        if ($data instanceof LengthAwarePaginator) {
            $data = new ListPaginator($data, $key);
        } elseif ($data instanceof ResourceCollection) {
            $data = new ListPaginator($data, $key);
        }

        return response()->json([
            'status' => true,
            'data' => [
                $key => $data
            ],
            'message' => $message,
        ]);
    }
}
