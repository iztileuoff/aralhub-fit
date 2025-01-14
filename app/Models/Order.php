<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'pack_id',
        'amount',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'user_id' => 'int',
            'pack_id' => 'int',
            'amount' => 'integer',
            'status' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function PaymeUrl(): Attribute
    {
        return new Attribute(
            get: fn($value, $attributes) => config('app.url') . "/api/v1/pay/payme/{$attributes['id']}/{$attributes['amount']}",
            set: null,
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function pack(): BelongsTo
    {
        return $this->belongsTo(Pack::class);
    }

    public function accesses(): HasMany
    {
        return $this->hasMany(Access::class);
    }

    public function availableAccess(): HasOne
    {
        return $this->hasOne(Access::class)->where('is_available', true);
    }

    public function nextAccess(): HasOne
    {
        return $this->hasOne(Access::class)->where('is_available', false)->orderBy('position_number', 'asc');
    }

    public function modules(): BelongsToMany
    {
        return $this->belongsToMany(Module::class, 'accesses', 'order_id', 'module_id')
            ->withPivot('is_view_finished', 'is_available', 'position_number')
            ->orderByPivot('position_number', 'asc');
    }
}
