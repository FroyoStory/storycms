<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Responder;
use Validator;

class UploadController extends Controller
{
    protected $filename = 'file';
    protected $rules    = 'mimes:jpeg,jpg,png,gif';

    public function store(Request $request)
    {
        $file = $request->file($this->filename);

        if (!$file) {
            return Responder::error('EMPTY_FILE', 422);
        }

        if ($errors = $this->validateUpload($request)) {
            return response()->json([
                'errors' => $errors,
                'meta'   => [
                    'code'    => 422,
                    'message' => 'Unprocessable',
                ],
            ], 422);
        }

        $path = $file->store('media', 'public');

        return Responder::success('OK', [
            'data' => [
                'path' => url($path),
                'name' => $file->getClientOriginalName(),
                'ext'  => $file->extension(),
            ],
        ]);
    }

    private function validateUpload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            $this->filename => $this->rules,
        ]);

        return $validator->passes() ? false : $validator->errors();
    }
}
