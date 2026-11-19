<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class SeoSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'page',
        'meta_title_ko',
        'meta_title_en',
        'meta_description_ko',
        'meta_description_en',
        'og_image',
    ];

    public function getMetaTitleAttribute(): string
    {
        $locale = App::getLocale();
        return $locale === 'en'
            ? ($this->meta_title_en ?: $this->meta_title_ko)
            : $this->meta_title_ko;
    }

    public function getMetaDescriptionAttribute(): string
    {
        $locale = App::getLocale();
        return $locale === 'en'
            ? ($this->meta_description_en ?: $this->meta_description_ko)
            : $this->meta_description_ko;
    }

    public static function forPage(string $page): ?static
    {
        return static::where('page', $page)->first();
    }
}
