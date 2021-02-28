<?php

namespace Darkgoldblade01\StatusCheck\Checks;

use Darkgoldblade01\StatusCheck\Classes\Checker;
use Darkgoldblade01\StatusCheck\Models\LastLogin;
use GuzzleHttp\Client;

/**
 * Class AdminLoginChecker
 * @package Darkgoldblade01\StatusCheck\Checks
 */
class HttpStatusChecker extends Checker
{

    public string $name = 'HTTP Status Check';

    public function handle(): array
    {

        $client = new Client();
        $status = 'passed';
        try {
            $response = $client->get(url('/'));
        } catch(\Exception $e) {
            $status = 'failed';
        }

        return [
            'status' => $status,
            'results' => [
                'status_code' => $response->getStatusCode(),
                'body' => (config('status-check.options.http_status.store_body')?$response->getBody()->getContents():false),
            ],
        ];
    }

}
