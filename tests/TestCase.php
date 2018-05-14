<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public const HTTP_OK = 200;
    public const HTTP_NOT_FOUND = 404;
}
