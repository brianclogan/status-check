<?php

namespace Darkgoldblade01\StatusCheck\Tests;

use Orchestra\Testbench\TestCase;
use Darkgoldblade01\StatusCheck\StatusCheckServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [StatusCheckServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
