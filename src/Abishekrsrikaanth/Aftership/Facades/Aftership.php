<?php
namespace Abishekrsrikaanth\Aftership\Facades;

use Illuminate\Support\Facades\Facade;

class Aftership extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "aftership";
    }
}
