<?php

namespace domain\Facades\EmployeeFacade;

use domain\Services\EmployeeService\EmployeeService;
use Illuminate\Support\Facades\Facade;

class EmployeeFacade extends Facade{

    protected static function getFacadeAccessor()
    {
        return EmployeeService::class;
    }
}
