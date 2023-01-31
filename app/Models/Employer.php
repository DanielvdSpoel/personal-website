<?php

namespace App\Models;

use App\Models\Traits\HasTranslations;
use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employer extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'position',
        'description',
        'media_id',
    ];

    public $translatable = [
        'position',
        'description',
    ];

    public function media(): BelongsTo
    {
        return $this->belongsTo(Media::class);
    }
}
