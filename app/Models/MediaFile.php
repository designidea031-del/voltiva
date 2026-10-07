<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class MediaFile extends Model
{
    protected $fillable = [
        'name',
        'file_name',
        'file_path',
        'mime_type',
        'size',
        'alt_text',
    ];

    /**
     * Get the public URL of the file.
     */
    public function getUrlAttribute(): string
    {
        return storage_asset($this->file_path);
    }

    /**
     * Get a human-readable file size.
     */
    public function getSizeFormattedAttribute(): string
    {
        $bytes = $this->size;
        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        }
        return $bytes . ' B';
    }

    /**
     * Determine if this file is an image.
     */
    public function isImage(): bool
    {
        return str_starts_with($this->mime_type, 'image/');
    }
}
