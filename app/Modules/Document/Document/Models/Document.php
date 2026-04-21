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
        'parent_id',
        'is_root',
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
        'meta',
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'is_root' => 'boolean',
        'meta' => 'array',
    ];

    /*
    |--------------------------------------------------------------------------
    | Core Relations
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Tree Structure (ONLY)
    |--------------------------------------------------------------------------
    */

    // Parent folder
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    // Children (files + folders)
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    // Only folders
    public function childFolders()
    {
        return $this->children()->where('document_type', 'folder');
    }

    // Only files
    public function childFiles()
    {
        return $this->children()->where('document_type', 'file');
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    public function isFolder(): bool
    {
        return $this->document_type === 'folder';
    }

    public function isFile(): bool
    {
        return $this->document_type === 'file';
    }

    // Recursive loading
    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }

    // Get full path (computed)
    public function getFullPathAttribute(): string
    {
        return $this->parent
            ? $this->parent->full_path . '/' . $this->name
            : $this->name;
    }
}
