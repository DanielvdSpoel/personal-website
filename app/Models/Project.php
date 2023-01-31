<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Traits\HasTranslations;

class Project extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'slug',
        'client',
        'completed_at',
        'description',
        'content'
    ];

    public $translatable = [
        'name',
        'slug',
        'description',
        'content',
    ];

    public function media(): BelongsToMany
    {
        return $this->belongsToMany(Media::class)->withPivot('theme_availability');
    }


}
