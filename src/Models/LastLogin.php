<?php

namespace Darkgoldblade01\StatusCheck\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LastLogin
 * @package Darkgoldblade01\StatusCheck\Models
 */
class LastLogin extends Model
{
    use HasFactory;

    /**
     * LastLogin constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->table = config('status-check.table_prefix') . 'last_logins';
        parent::__construct($attributes);
    }

    /**
     * @var array|string[]
     */
    protected $fillable = [
        'user_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(config('status-check.models.user'));
    }

}
