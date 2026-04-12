<?php

namespace App\Modules\Document\Models;

use App\Modules\User\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use HasFactory;

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
        'is_private',
        'is_deleted',
        'tags',
        'cover_image_id'
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
    public function coverImage()
    {
        return $this->belongsTo(Document::class, 'cover_image_id');
    }


}
