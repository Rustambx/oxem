<?php

namespace App\Modules\Category\Facades;

use Illuminate\Support\Facades\Facade;

class CategoryFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor()
    {
        return 'CategoryService';
    }
}
