<?php

namespace App\Modules\Document\DocumentFolder\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocumentFolder extends Model
{
    use HasFactory;

    protected $table = 'document_folders';

    protected $fillable = [
        'folder_id',
        'parent_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
