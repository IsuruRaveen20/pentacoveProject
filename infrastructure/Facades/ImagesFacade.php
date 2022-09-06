<?php

namespace infrastructure\Facades;


use Illuminate\Support\Facades\Facade;
use infrastructure\Images;

/**
 * Images Facade
 * php version 8
 *
 * @category Facade
 * @package  Zend_Service_DeveloperGarden
 * @author   Spera Labs <contact@cyberelysium.com>
 * @license  cyberelysium.com/ Config
 * @link     cyberelysium.com/
 * */
class ImagesFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Images::class;
    }
}
