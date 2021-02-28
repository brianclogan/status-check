<?php

namespace Darkgoldblade01\StatusCheck\Classes;

/**
 * Interface Checker
 * @package Darkgoldblade01\StatusCheck
 */
class Checker {

    /**
     * @var string
     */
    public string $name = '';

    /**
     * Handle the check
     *
     * Response required to have two keys,
     * `results` and `status`.
     *
     * return [
     * 'status' => 'passed|failed|partial',
     * 'results' => 'anything you want, string, array, number, etc.'
     * ]
     *
     * @return array
     */
    public function handle(): array {
        return [
            'status' => 'passed|failed|partial',
            'results' => '',
        ];
    }

}