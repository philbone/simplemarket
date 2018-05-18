<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public const HTTP_OK = 200;
    public const HTTP_NOT_FOUND = 404;

    /**
    *   Obtiene una cadena de texto aleatoria de largo específico.
    *   Si el largo no es especificado retornará una cadena de largo 16.
    *   Si no se especifican los caracterés, se utilizará un $pool alfanúmerico predeterminado.
    *
    *   @param  int     $length el largo de la cadena.
    *   @param  string  $set la lista de caracteres que serán usados para la cadena.
    *   @return string
    */
    public static function fakeAlfaId($length = 16, $set = false)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        if ($set != false) {
            $pool = $set;
        }

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }
}
