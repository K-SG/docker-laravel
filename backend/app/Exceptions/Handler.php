<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
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
        //
    }

      /**
     * Override default method - render the given HttpException.
     * 共通エラーページ
     * https://qiita.com/kd9951/items/b1bccc4666976ec90dcc
     * Illuminate\Foundation\ExceptionsのHandler.phpをオーバーライド
     *
     * @param  \Symfony\Component\HttpKernel\Exception\HttpException  $e
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function renderHttpException(HttpExceptionInterface $e)
    {
        $status = $e->getStatusCode();

        return response()->json([
            'success' => false,
            'code' => $status,
            'message' => $e,            
        ],$status);
        //return response()->view("error.error", ['exception' => $e], $status);
    }
}
