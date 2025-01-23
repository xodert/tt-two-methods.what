<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;

class CustomJsonResponse extends JsonResponse
{
    public function __construct(
        array $body = [],
        int   $status = 200,
        array $headers = [],
        int   $options = 0
    )
    {
        parent::__construct($body, $status, $headers, $options | JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param mixed|null $data
     * @param string $message
     * @param int $status
     * @return JsonResponse
     */
    public static function success(mixed $data = null, string $message = '', int $status = 200): JsonResponse
    {
        return new static([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $status);
    }

    /**
     * @param string $message
     * @param mixed|null $data
     * @param int $status
     * @return JsonResponse
     */
    public static function error(string $message = '', mixed $data = null, int $status = 400): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $message,
        ];

        if (empty($data)) {
            $response['data'] = $data;
        }

        return new static($response, $status);
    }
}
