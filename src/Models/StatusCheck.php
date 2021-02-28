<?php

namespace Darkgoldblade01\StatusCheck\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusCheck extends Model
{
    use HasFactory;

    /**
     * StatusCheck constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->table = config('status-check.table_prefix') . 'status_checks';
        parent::__construct($attributes);
    }

    /**
     * @var string[]
     */
    protected $casts = [
        'results' => 'array'
    ];

    /**
     * @var array|string[]
     */
    protected $fillable = [
        'group_id',
        'name',
        'results',
        'status',
    ];

}
