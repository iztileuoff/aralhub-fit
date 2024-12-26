<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    protected $fillable = [
        'title',
        'price',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'title' => 'string',
            'price' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    public function price(): Attribute
    {
        return new Attribute(
            get: fn($value, $attributes) => $attributes['price'] / 100,
            set: fn($value) => $value * 100,
        );
    }
}
