<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function report(Throwable $exception)
    {
        if (app()->bound('sentry') && $this->shouldReport($exception)) {
            app('sentry')->captureException($exception);
        }

        parent::report($exception);
    }

// Setup Sentry with this command:

//php artisan sentry:publish --dsn=https://d89f62c9dea64990b72d21676767aa3c@o1233384.ingest.sentry.io/6382169
//It creates (config/sentry.php) and adds the DSN to your .env file.
//
//You can easily verify that Sentry is capturing errors in your Laravel application by creating a debug route that will throw an exception:
//
//Route::get('/debug-sentry', function () {
//    throw new Exception('My first Sentry error!');
//});
//Visiting this route will trigger an exception that will be captured by Sentry.
//
//Monitor Performance
//
//Set traces_sample_rate to a value greater than 0.0 (config/sentry.php) after that, Performance Monitoring will be enabled.
//
//'traces_sample_rate' => 1.0 # be sure to lower this in production to prevent quota issues
//or in the .env file:
//
//SENTRY_TRACES_SAMPLE_RATE=1

}
