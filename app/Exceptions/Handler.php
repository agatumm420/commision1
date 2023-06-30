<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Swift_TransportException;
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
    public function report(Throwable $exception)
    {
        if ($exception instanceof Swift_TransportException) {
            // customize your reporting here, for example:
            Log::error($exception->getMessage());
            Log::channel('yourCustomChannel')->error($exception->getMessage());
            // or send an email, or anything else you like
        }

        parent::report($exception);
    }


    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
