<?php

namespace Darkgoldblade01\StatusCheck\Checks;

use Darkgoldblade01\StatusCheck\Classes\Checker;
use Darkgoldblade01\StatusCheck\Models\LastLogin;
use GuzzleHttp\Client;

/**
 * Class AdminLoginChecker
 * @package Darkgoldblade01\StatusCheck\Checks
 */
class DiskSpaceChecker extends Checker
{

    public string $name = 'Disk Space Check';

    public function handle(): array
    {

        $disk_space_available = disk_free_space(app_path());
        $disk_space_total = disk_total_space(app_path());
        $status = 'passed';
        if($disk_space_available/$disk_space_total < .5) {
            $status = 'partial';
        }
        if($disk_space_available/$disk_space_total < .1) {
            $status = 'failed';
        }

        return [
            'status' => $status,
            'results' => [
                'disk_space_available' => $disk_space_available,
                'disk_space_total' => $disk_space_total
            ],
        ];
    }

}
