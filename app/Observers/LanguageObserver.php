<?php

namespace App\Observers;

use App\Models\Language;
use Illuminate\Support\Facades\Cache;

class LanguageObserver
{
    /**
     * Handle the Language "created" event.
     */
    public function created(Language $language): void
    {
        $this->clearLanguageCaches();
    }

    /**
     * Handle the Language "updated" event.
     */
    public function updated(Language $language): void
    {
        $this->clearLanguageCaches();
    }

    /**
     * Handle the Language "deleted" event.
     */
    public function deleted(Language $language): void
    {
        $this->clearLanguageCaches();
    }

    /**
     * Handle the Language "restored" event.
     */
    public function restored(Language $language): void
    {
        $this->clearLanguageCaches();
    }

    /**
     * Handle the Language "force deleted" event.
     */
    public function forceDeleted(Language $language): void
    {
        $this->clearLanguageCaches();
    }

    /**
     * Clear all language-related caches.
     */
    private function clearLanguageCaches(): void
    {
        // Clear the main languages cache
        Cache::forget('languages_all');
        
        // Clear individual language caches for all possible locales
        $commonLocales = ['en', 'lt', 'pl', 'de', 'fr', 'es', 'ru'];
        foreach ($commonLocales as $locale) {
            Cache::forget('language_' . strtolower($locale));
        }
    }
}
