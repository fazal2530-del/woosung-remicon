<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class PageContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'page',
        'section',
        'key',
        'value_ko',
        'value_en',
    ];

    public function getValueAttribute(): string
    {
        $locale = App::getLocale();
        return $locale === 'en' ? ($this->value_en ?: $this->value_ko) : $this->value_ko;
    }

    /**
     * Get content by page/section/key
     */
    public static function getValue(string $page, string $section, string $key, string $default = ''): string
    {
        $content = static::where('page', $page)
            ->where('section', $section)
            ->where('key', $key)
            ->first();

        if (!$content) {
            return $default;
        }

        $locale = App::getLocale();
        return $locale === 'en'
            ? ($content->value_en ?: $content->value_ko ?: $default)
            : ($content->value_ko ?: $default);
    }
}
