<?php

namespace App\Modules\Nurses\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nurses extends Model
{
    use HasFactory;

    protected $table = 'nurses';

    protected $fillable = [
        'name',
        'code',
        'description',
        'status',

    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
