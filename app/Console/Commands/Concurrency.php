<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;

class Concurrency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'article:views';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '併發測試';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $responses = Http::pool(fn (Pool $pool) => [
            $pool->get(config('app.url') . '/api/articles/1'),
            $pool->get(config('app.url') . '/api/articles/1'),
            $pool->get(config('app.url') . '/api/articles/1'),
        ]);

        $this->info('origin: ' . Article::find(1)->views);
        $this->info('1: ' . $responses[0]->json('views'));
        $this->info('2: ' . $responses[1]->json('views'));
        $this->info('3: ' . $responses[2]->json('views'));
        return 0;
    }
}
