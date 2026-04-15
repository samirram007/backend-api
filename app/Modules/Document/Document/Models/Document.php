<?php

namespace App\Modules\Document\Document\Models;

use App\Modules\Base\User\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'documents';

    protected $fillable = [
        'name',
        'user_id',
        'document_type',
        'path',
        'mime_type',
        'size',
        'original_name',
        'caption',
        'description',
        'extension',
        'privacy_level',
        'tags',
        'storage_type',
        'link',
        'is_root',
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function folders()
    {
        return $this->belongsToMany(Document::class, 'documents_folders', 'document_id', 'folder_id');
    }
    public function documents()
    {
        return $this->belongsToMany(Document::class, 'documents_folders', 'folder_id', 'document_id');
    }
}
