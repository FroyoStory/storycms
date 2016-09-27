<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    /**
     * Get the proper failed validation response for the request.
     *
     * @param  array  $errors
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function response(array $errors)
    {
        if ($this->ajax() || $this->wantsJson()) {
            return response()->json([
                'errors' => $errors,
                'meta'   => [
                    'code'    => 422,
                    'message' => 'VALIDATION_FAILED',
                ],
            ], 422);
        }

        parent::response($errors);
    }

    /**
     * Get the response for a forbidden operation.
     *
     * @return  \Symfony\Component\HttpFoundation\Response
     */
    public function forbiddenResponse()
    {
        return \Responder::forbidden();
    }
}
