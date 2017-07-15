<?php

namespace App\Exceptions;

use Adldap\Models\ModelDoesNotExistException;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Foundation\Testing\HttpException;
use Illuminate\Validation\ValidationException;
use ErrorException;
use Symfony\Component\Debug\Exception\FatalThrowableError;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception $exception
     * @return void
     */
    public function report (Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $exception
     * @return \Illuminate\Http\Response
     */
    public function render ($request, Exception $exception)
    {

        if ($this->isHttpException($exception)) {

            switch ($exception->getStatusCode()) {
                // not found
                case 404:
                    alert()->info('', 'ไม่พบหน้าดังกล่าว');
                    return redirect()->guest('home');
                    break;

                // internal error
                case 500:

                    return response()->view('errors.fatal', [], 500);
                    break;

                default:
                    return response()->view('errors.fatal', [], 500);

                    break;
            }
        }

        if ($exception instanceof ValidationException) {
            return parent::render($request, $exception);
        }

        if ($exception instanceof FatalThrowableError) {
            return response()->view('errors.fatal', [], 404);
        }

        if ($exception instanceof ErrorException){
            return response()->view('errors.fatal', [], 404);
        }

        if($exception instanceof HttpException){
            return response()->view('errors.fatal', [], 404);
        }

        return parent::render($request, $exception);
    }

//    public function render($request, Exception $e)
//    {
//        if ($e instanceof HttpResponseException) {
//            return $e->getResponse();
//        } elseif ($e instanceof ModelDoesNotExistException) {
//            $e = new NotFoundHttpException($e->getMessage(), $e);
//        } elseif ($e instanceof AuthenticationException) {
//            return $this->unauthenticated($request, $e);
//        } elseif ($e instanceof AuthorizationException) {
//            $e = new HttpException(403, $e->getMessage());
//        } elseif ($e instanceof ValidationException && $e->getResponse()) {
//            return $e->getResponse();
//        }
//
//        if ($this->isHttpException($e)) {
//            return $this->toIlluminateResponse($this->renderHttpException($e), $e);
//        } else {
//            return $this->toIlluminateResponse($this->convertExceptionToResponse($e), $e);
//        }
//    }


//    public function render ($request, Exception $e)
//    {
//        if ($this->isHttpException($e)) {
//
//            if ($e instanceof NotFoundHttpException) {
//                return response()->view('errors.404', [], 404);
//            } elseif ($e instanceof HttpResponseException) {
//                return response()->view('errors.404', [], 404);
//            } elseif ($e instanceof ValidationException ) {
//                return response()->view('errors.404', [], 404);
//            }
//
//
//        }
//
//
//    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Illuminate\Auth\AuthenticationException $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated ($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json([ 'error' => 'Unauthenticated.' ], 401);
        }

        alert()->warning('เพื่อที่จะทำรายการต่างๆได้', 'กรุณาเข้าสู่ระบบ');
        return redirect()->guest(route('home'));
    }
}
