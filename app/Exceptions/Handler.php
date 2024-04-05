<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    function render($request, Throwable $exception)
    {
            if ($this->isHttpException($exception)) {
                if ($exception->status == 404) {
                    return response()->view('frontend.error',404);
                }
                if ($exception->status == 500) {
                    return response()->view('frontend.error',500);
                }
            }
            return parent::render($request, $exception);
    }

}
