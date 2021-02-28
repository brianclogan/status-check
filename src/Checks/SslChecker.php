<?php

namespace Darkgoldblade01\StatusCheck\Checks;

use Darkgoldblade01\StatusCheck\Classes\Checker;
use Darkgoldblade01\StatusCheck\Models\LastLogin;
use GuzzleHttp\Client;

/**
 * Class AdminLoginChecker
 * @package Darkgoldblade01\StatusCheck\Checks
 */
class SslChecker extends Checker
{

    public string $name = 'SSL Check';

    public function handle(): array
    {

        return [
            'status' => 'passed',
            'results' => [

            ],
        ];
    }

}
