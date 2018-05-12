<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

trait ApiResponser
{
    /**
    *   Se encarga de las respuestas satisfactorias.
    *   Devuelve la información en formato json con un código de estado.
    *
    *   @param  data    $data la información a retornar.
    *   @param  int     $code el código de respuesta.
    *   @return json
    */
    private function successResponse($data, $code)
    {
        return response()->json($data, $code);
    }

    /**
    *   Se encarga de las respuestas de error.
    *   Devuelve un mensaje de error con un código de estado en formato json.
    *
    *   @param  string  $message el mensaje para mostrar.
    *   @param  int     $code el código de respuesta.
    *   @return json
    */
    protected function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    /**
    *   Devuelve una lista de recursos en formato json a partir de una colección.
    *   El código de respuesta es 200 a menos que sea especificado algo distinto.
    *
    *   @param  Collection  $collection la lista para mostrar.
    *   @param  int         $code el código de respuesta.
    */
    protected function showAll(Collection $collection, $code = 200)
    {
        return $this->successResponse(['data' => $collection], $code);
    }

    /**
    *   Devuelve un recursos en formato json a partir de la instancia de un modelo.
    *   El código de respuesta es 200 a menos que sea especificado algo distinto.
    *
    *   @param  Model   $instance la lista para mostrar.
    *   @param  int     $code el código de respuesta.
    */
    protected function showOne(Model $instance, $code = 200)
    {
        return $this->successResponse(['data' => $instance], $code);
    }
}
