<?php

namespace App\Models;

use App\Models\Traits\HasTranslations;
use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skill extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'description',
        'media_id',
        'url',
    ];

    public array $translatable = [
        'name',
        'description',
    ];

    public function media(): BelongsTo
    {
        return $this->belongsTo(Media::class);
    }
}

