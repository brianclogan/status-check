<?php

/*
 * Status Check Config
 */
return [

    /**
     * Auth for the interface, who is allowed to log in
     */
    'auth' => [
        /**
         * The email accounts for the admins, for authentication
         * and for the status checks.
         */
        'emails' => [
            'brianldj@gmail.com',
        ]
    ],

    /**
     * The models used by Status Check
     */
    'models' => [
        'user' => \App\Models\User::class,
    ],

    /**
     * The prefix for the tables created in the database.
     */
    'table_prefix' => 'sc_',

    /**
     * The checks you would like to run.
     */
    'checks' => [
        \Darkgoldblade01\StatusCheck\Checks\AdminLastLoginChecker::class,
        \Darkgoldblade01\StatusCheck\Checks\HttpStatusChecker::class,
        \Darkgoldblade01\StatusCheck\Checks\DiskSpaceChecker::class,
    ],

    /**
     * The options for the status checks we built internally.
     */
    'options' => [
        'http_status' => [
            'store_body' => false,
        ]
    ]

];