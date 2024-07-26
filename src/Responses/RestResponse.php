<?php

namespace Ijodkor\ApiResponse\Responses;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Ijodkor\ApiResponse\Supporters\ListPaginator;

trait RestResponse {

    /**
     * Response use any success process
     * @param array $data
     * @param string $message
     * @return JsonResponse
     */
    protected function success(array $data = [], string $message = 'Muvaffaqiyatli'): JsonResponse {
        return response()->json([
            'success' => true,
            'data' => [...$data],
            'message' => $message
        ]);
    }

    /**
     * Response use when create a record in system
     * @param array $data
     * @param string $message
     * @return JsonResponse
     */
    protected function created(array $data = [], string $message = 'Muvaffaqiyatli'): JsonResponse {
        return response()->json([
            'success' => true,
            'data' => [...$data],
            'message' => $message
        ], 201);
    }

    /**
     * Use when code fall down catch block
     * @param mixed $errors
     * @param string $message
     * @param int $status
     * @return JsonResponse
     */
    protected function fail($errors = [], string $message = 'Muvaffaqiyatsiz', int $status = 400): JsonResponse {
        return response()->json([
            'success' => false,
            'errors' => $errors,
            'message' => $message
        ], $status);
    }

    /**
     * Use when server error occurs
     * @param string $message
     * @param array $errors
     * @return JsonResponse
     */
    protected function error(string $message = 'Ichki xatolik yuz berdi!', array $errors = []): JsonResponse {
        return response()->json([
            'success' => false,
            'errors' => $errors,
            'message' => $message
        ], 500);
    }

    /**
     * Unauthorized response
     * @param string $message
     * @return JsonResponse
     */
    protected function unAuthorized(string $message = "Kirishga ruxsat berilmagan"): JsonResponse {
        return response()->json([
            'success' => false,
            'message' => $message
        ], 401);
    }

    // ########## Bonuses ##########

    /**
     * Returned format number sensible response
     * @param mixed $data
     * @param string $message
     * @return JsonResponse
     */
    protected function result($data = [], string $message = 'Muvaffaqiyatli'): JsonResponse {
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => $message
        ], options: JSON_NUMERIC_CHECK);
    }

    /**
     * Response with no content.
     * @return JsonResponse
     */
    protected function noContent(): JsonResponse {
        return response()->json([], 204);
    }

    /**
     * Returned paginated response
     * @param LengthAwarePaginator|ResourceCollection $data
     * @param string $key
     * @param string|null $message
     * @return JsonResponse
     */
    protected function paginated($data, string $key, ?string $message = 'Muvaffaqiyatli'): JsonResponse {
        if ($data instanceof LengthAwarePaginator) {
            $data = new ListPaginator($data, $key);
        } elseif ($data instanceof ResourceCollection) {
            $data = new ListPaginator($data, $key);
        }

        return response()->json([
            'status' => true,
            'data' => $data,
            'message' => $message,
        ]);
    }
}
