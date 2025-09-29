<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

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
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {

        if ($exception instanceof QueryException) {
            if ($exception->getCode() == 23000) {

                $mensaje = 'No se puede completar la acción porque hay registros relacionados.';

                $msgBD = $exception->getMessage();
                if (str_contains($msgBD, 'servicios_cliente_id_foreign')) {
                    $mensaje = 'No se puede eliminar este cliente porque tiene servicios asociados.';
                } elseif (str_contains($msgBD, 'servicios_equipo_id_foreign')) {
                    $mensaje = 'No se puede eliminar este equipo porque está asignado a un servicio.';
                } elseif (str_contains($msgBD, 'servicios_tecnico_id_foreign')) {
                    $mensaje = 'No se puede eliminar este técnico porque tiene servicios asociados.';
                } elseif (str_contains($msgBD, 'servicios_estado_actual_id_foreign')) {
                    $mensaje = 'No se puede eliminar este estado porque está en uso en algún servicio.';
                }

                return redirect()->back()->with('error', $mensaje);
            }
        }

        return parent::render($request, $exception);
    }
}
