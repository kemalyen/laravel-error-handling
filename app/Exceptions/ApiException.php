<?php

namespace App\Exceptions;

use App\Mail\SendApiError;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ApiException extends Exception
{
    public function report(): void
    {
        Mail::to('kemalyen@gmail.com')
            ->queue(new SendApiError($this->getMessage()));

    }

    public function render($request){
        return response()->json([
         'message' => $this->getMessage()
        ], 500);
    }
}
