<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    protected $fillable = [
        'text',
        'admin_id',
        'user_id',
        'is_sender_user',
    ];

    protected function casts(): array
    {
        return [
            'text' => 'string',
            'admin_id' => 'int',
            'user_id' => 'int',
            'is_sender_user' => 'boolean',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }
}
