<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearPerformanceCaches extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:clear-performance {--all : Clear all performance-related caches}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear performance-related caches (cities, languages, locations)';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('Clearing performance caches...');
        
        // Clear specific performance caches
        $caches = [
            'cities_ordered',
            'languages_all',
            'language_en',
            'language_lt',
            'language_pl',
            'vehicle_makes',
            'vehicle_models',
        ];
        
        foreach ($caches as $cache) {
            \Cache::forget($cache);
            $this->line("Cleared: {$cache}");
        }
        
        // Clear location caches (pattern-based)
        if ($this->option('all')) {
            $this->info('Clearing all location and city_id caches...');
            // Note: In production, you'd want to use a more sophisticated cache clearing method
            // For now, we clear the entire cache to handle dynamic keys like 'user_location_x.x.x.x' and 'city_id_CityName'
            $this->call('cache:clear');
        }
        
        $this->info('Performance caches cleared successfully!');
        
        return 0;
    }
}
