<?php

namespace Ahoicloud\Co2\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ahoicloud\Co2\Co2
 */
class Co2 extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Ahoicloud\Co2\Co2::class;
    }
}
