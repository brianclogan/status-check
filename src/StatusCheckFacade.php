<?php

namespace Darkgoldblade01\StatusCheck;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Darkgoldblade01\StatusCheck\Skeleton\SkeletonClass
 */
class StatusCheckFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'status-check';
    }
}
