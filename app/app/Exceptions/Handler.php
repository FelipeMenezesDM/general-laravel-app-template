<?php

namespace App\Exceptions;

use FelipeMenezesDM\LaravelLoggerAdapter\LogHandler;
use FelipeMenezesDM\LaravelLoggerAdapter\LogPayload;
use FelipeMenezesDM\LaravelCommons\Enums\HttpStatusCode;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
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
        $this->renderable(function(Throwable $throwable, Request $request) {
            $status = HttpStatusCode::HTTP_INTERNAL_SERVER_ERROR;
            $class = get_class($throwable);

            if(property_exists($class, 'status')) {
                $status = HttpStatusCode::tryFrom($throwable->status);
            }elseif(method_exists($class, 'getStatusCode')) {
                $status = HttpStatusCode::tryFrom($throwable->getStatusCode());
            }elseif($throwable instanceof AuthenticationException) {
                $status = HttpStatusCode::HTTP_UNAUTHORIZED;
            }

            $payload = [
                'status'        => $status->value,
                'error'         => $status->name,
                'message'       => $status->getStatusMessage(),
                'path'          => $request->path(),
                'details'       => [],
                'links'         => [
                    'self' => $request->fullUrl(),
                ],
                'timestamp'     => now()->format('Y-m-d H:i:s.v'),
            ];

            if(method_exists($class, 'errors')) {
                $payload['details'] = $throwable->errors();
            }

            LogHandler::error(null, LogPayload::build()
                ->setEndPoint($payload['path'])
                ->setHttpStatus($payload['status'])
                ->setLogCode($request->get('logCode'))
                ->setMessage($throwable->getMessage())
                ->setDetails([
                    'errors'    => $payload['details'],
                    'trace'     => method_exists($class, 'getTrace') ? $throwable->getTrace() : []
                ])
                ->setCodeLine(basename($throwable->getFile()) . ": " . $throwable->getLine()));

            return response()->json($payload, $payload['status']);
        });
    }
}
