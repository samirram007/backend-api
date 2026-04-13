<?php

namespace App\Modules\DocumentMetaData\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocumentMetaData extends Model
{
    use HasFactory;

    protected $table = 'document_meta_datas';

    protected $fillable = [
        'meta_data',
        'user_id'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
