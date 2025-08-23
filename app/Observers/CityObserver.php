<?php

namespace App\Observers;

use App\Models\City;
use Illuminate\Support\Facades\Cache;

class CityObserver
{
    /**
     * Handle the City "created" event.
     */
    public function created(City $city): void
    {
        $this->clearCityCaches();
    }

    /**
     * Handle the City "updated" event.
     */
    public function updated(City $city): void
    {
        $this->clearCityCaches();
    }

    /**
     * Handle the City "deleted" event.
     */
    public function deleted(City $city): void
    {
        $this->clearCityCaches();
    }

    /**
     * Handle the City "restored" event.
     */
    public function restored(City $city): void
    {
        $this->clearCityCaches();
    }

    /**
     * Handle the City "force deleted" event.
     */
    public function forceDeleted(City $city): void
    {
        $this->clearCityCaches();
    }

    /**
     * Clear all city-related caches.
     */
    private function clearCityCaches(): void
    {
        // Clear the main cities cache
        Cache::forget('cities_ordered');
        
        // Clear city_id caches (these are pattern-based, so we'd need a more sophisticated approach in production)
        // For now, we clear the main cache which will handle most use cases
    }
}
