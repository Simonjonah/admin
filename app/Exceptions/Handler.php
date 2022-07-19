<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use ErrorException;
use Throwable;

use Symfony\Component\HttpFoundation\Response;
//use ErrorException;


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
        $this->renderable(function (ErrorException $e, $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    'error' => 'There is an error, The requested item does not exist.'
                ], Response::HTTP_NOT_FOUND); 
            }

        });


        $this->renderable(function (NotFoundHttpException $e, $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'There is an error, Model Not Found.'
                ], Response::HTTP_NOT_FOUND);
            }
        });
      

        //         if($e instanceof ModelNotFoundException) {
        //             return response()->json([
        //                 'error' => 'There is an error, Model Not Found'
        //             ], Response::HTTP_NOT_FOUND);
        //         }
        //     }
        // });
    }
}
