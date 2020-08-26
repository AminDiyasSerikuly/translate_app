<?php

namespace App\Console\Commands;

use App\Translation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class RefreshTranslations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'translation:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh translation cache every 1 minute';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $translations = Translation::where(['is_cached' => 0])->get();
        $bool = count(Cache::get('translations')) != count(Translation::all());
        if (isset($translations) || $bool) {
            Cache::put('translations', Translation::all());
            foreach ($translations as $translation) {
                $translation->is_cached = true;
            }
            var_dump('done', count(Cache::get('translations')));
        }
    }
}
