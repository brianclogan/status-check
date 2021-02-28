<?php

namespace Darkgoldblade01\StatusCheck\Commands;

use Darkgoldblade01\StatusCheck\Models\StatusCheck as StatusCheckModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class StatusCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'status-check:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the status check, and cache the results.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $last_check = StatusCheckModel::latest()->first();
        if(!$last_check) $last_check_id = 0;
        if($last_check) $last_check_id = $last_check->group_id + 1;

        $status_check = [];

        foreach(config('status-check.checks') AS $class) {
            $check = new $class;
            $status_check[$check->name] = $check->handle();
        }

        foreach($status_check AS $name => $value) {
            StatusCheckModel::create([
                'group_id' => $last_check_id,
                'name' => $name,
                'results' => $value['results'],
                'status' => $value['status'],
            ]);
        }
    }
}
