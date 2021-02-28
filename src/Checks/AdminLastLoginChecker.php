<?php

namespace Darkgoldblade01\StatusCheck\Checks;

use Darkgoldblade01\StatusCheck\Classes\Checker;
use Darkgoldblade01\StatusCheck\Models\LastLogin;

/**
 * Class AdminLoginChecker
 * @package Darkgoldblade01\StatusCheck\Checks
 */
class AdminLastLoginChecker extends Checker
{

    public string $name = 'Admin Last Login';

    public function handle(): array
    {
        $lastLogins = [];
        $userClass = config('status-check.models.user');
        $emails = config('status-check.auth.emails');

        foreach($emails AS $email) {
            $user = $userClass::where('email', $email)->first();
            $login = LastLogin::where('user_id', $user->id)->latest()->first();
            $lastLogins[] = [
                'name' => $user->name,
                'email' => $user->email,
                'last_login' => $login->created_at->format('Y-m-d H:i:s')
            ];
        }

        return [
            'status' => 'passed',
            'results' => $lastLogins,
        ];
    }

}
