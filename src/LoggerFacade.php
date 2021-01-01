<?php namespace DestherCZ\Logger;

use Illuminate\Support\Facades\Facade;

class LoggerFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'logger';
    }
}