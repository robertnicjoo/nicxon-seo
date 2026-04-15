<?php

namespace Nicxon\Seo\Console\Commands;

use Illuminate\Console\Command;
use Nicxon\Seo\Models\SeoMeta;

class SeoStatsCommand extends Command
{
    // The name and signature of the console command
    protected $signature = 'nicxon:seo-stats';

    // The console command description
    protected $description = 'Show a summary of SEO metadata status across the site';

    public function handle()
    {
        $total = SeoMeta::count();
        $global = SeoMeta::where('seoable_type', 'Global')->count();
        $models = $total - $global;

        $this->info("----------------------------------");
        $this->info("   Nicxon SEO - Status Report     ");
        $this->info("----------------------------------");
        $this->line("Total SEO Records:  <comment>$total</comment>");
        $this->line("Model Specific:     <comment>$models</comment>");
        $this->line("Global Settings:    <comment>" . ($global ? 'Configured' : 'Missing') . "</comment>");
        $this->info("----------------------------------");
        
        if ($total === 0) {
            $this->warn("Warning: You haven't set any SEO data yet!");
        } else {
            $this->info("SEO Health: Looking good, Robert!");
        }
    }
}