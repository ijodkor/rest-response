<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Error Defaults
    |--------------------------------------------------------------------------
    |
    | This helps configure the default HTTP status code as well as the message
    | (or translation key) that should be used when a validation
    | error is being return as an API HTTP response.
    |
    */

    'validation' => [
        'code' => 422,
        'message' => 'validation_failed'
    ],
];