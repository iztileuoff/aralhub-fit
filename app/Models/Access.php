<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Access extends Model
{
    protected $fillable = [
        'order_id',
        'pack_id',
        'user_id',
        'is_view_finished',
        'is_available',
        'module_id',
        'position_number',
    ];

    protected function casts(): array
    {
        return [
            'order_id' => 'int',
            'pack_id' => 'int',
            'user_id' => 'int',
            'is_view_finished' => 'bool',
            'is_available' => 'bool',
            'module_id' => 'int',
            'position_number' => 'integer',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function pack(): BelongsTo
    {
        return $this->belongsTo(Pack::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }
}
