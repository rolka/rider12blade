<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Language extends Model
{
    use HasTranslations;

    /**
     * The attributes that are translatable.
     *
     * @var array<int, string>
     */
    public array $translatable = ['name'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'name',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'name' => 'array',
        ];
    }

    /**
     * Get the displayable name of the language using sensible fallbacks.
     *
     * Priority:
     * 1) Native name (translation key equal to the language code)
     * 2) Current UI locale
     * 3) 'en'
     * 4) First available translation
     * 5) Uppercased code
     */
    public function displayName(?string $currentLocale = null): string
    {
        $currentLocale = $currentLocale ?: app()->getLocale();

        $code = strtolower((string) $this->code);

        // Prefer native (autonym) name
        $name = $this->getTranslation('name', $code, false);
        if (is_string($name) && $name !== '') {
            return $name;
        }

        // Fall back to current locale
        $name = $this->getTranslation('name', $currentLocale, false);
        if (is_string($name) && $name !== '') {
            return $name;
        }

        // Fall back to English
        $name = $this->getTranslation('name', 'en', false);
        if (is_string($name) && $name !== '') {
            return $name;
        }

        // Fall back to first available value
        $all = $this->getAttribute('name');
        if (is_array($all) && ! empty($all)) {
            $first = reset($all);
            if (is_string($first) && $first !== '') {
                return $first;
            }
        }

        // Ultimate fallback
        return strtoupper((string) $this->code);
    }
}
