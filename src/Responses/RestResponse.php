<?php

namespace Ijodkor\ApiResponse\Responses;

use Ijodkor\ApiResponse\Supporters\IterationPaginator;
use Ijodkor\ApiResponse\Supporters\ListPaginator;
use Illuminate\Http\JsonResponse;

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
            'msg' => $message
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
            'msg' => $message
        ], 201);
    }

    /**
     * Use when code fall down catch block
     * @param mixed $errors
     * @param string $message
     * @param int $status
     * @return JsonResponse
     */
    protected function fail(mixed $errors = [], string $message = 'Muvaffaqiyatsiz', int $status = 400): JsonResponse {
        return response()->json([
            'success' => false,
            'errors' => $errors,
            'msg' => $message
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
            'msg' => $message
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
            'msg' => $message
        ], 401);
    }

    // ########## Bonuses ##########

    /**
     * Returned format number sensible response
     * @param mixed $data
     * @param string $message
     * @return JsonResponse
     */
    protected function result(mixed $data = [], string $message = 'Muvaffaqiyatli'): JsonResponse {
        return response()->json([
            'success' => true,
            'data' => $data,
            'msg' => $message
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
     * @param mixed $data
     * @param string $key
     * @param string|null $message
     * @return JsonResponse
     */
    protected function paginated(mixed $data, string $key, ?string $message = 'Muvaffaqiyatli'): JsonResponse {
        return response()->json([
            'status' => true,
            'data' => new ListPaginator($data, $key),
            'msg' => $message
        ]);
    }

    /**
     * Returned paginated response
     * @param string $key
     * @param mixed $data
     * @param array $extra
     * @param string $message
     * @return JsonResponse
     */
    protected function paged(string $key, mixed $data, array $extra = [], string $message = 'Muvaffaqiyatli'): JsonResponse {
        return response()->json([
            'status' => true,
            'data' => new IterationPaginator($key, $data, $extra),
            'msg' => $message
        ]);
    }
}
