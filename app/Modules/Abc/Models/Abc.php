<?php

namespace App\Modules\Abc\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Abc extends Model
{
    use HasFactory;

    protected $table = 'abcs';

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
