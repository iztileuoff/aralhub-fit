<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens;

    protected $fillable = [
        'name',
        'password',
        'phone',
        'is_super_admin'
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'name' => 'string',
            'password' => 'hashed',
            'phone' => 'string',
            'is_super_admin' => 'boolean',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function password(): Attribute
    {
        return new Attribute(
            get: null,
            set: fn($value) => bcrypt($value),
        );
    }

    public function scopeSearch(Builder $query, $search): void
    {
        $query->where('name', 'like', "%$search%")
            ->orWhere('phone', 'like', "%$search%");
    }
}
