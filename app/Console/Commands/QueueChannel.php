<?php

namespace App\Console\Commands;

use App\Jobs\Chanel1;
use Illuminate\Console\Command;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;

class QueueChannel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:queue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'test different channel';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Chanel1::dispatch('abc')->onQueue('article_views');
        // Chanel1::dispatch('def')->onQueue('article_views');

        $responses = Http::pool(fn (Pool $pool) => [
            $pool->get(config('app.url') . '/api/test/queue-channel?text=aaaa'),
            $pool->get(config('app.url') . '/api/test/queue-channel?text=bbbb'),
            $pool->get(config('app.url') . '/api/test/queue-channel?text=cccc'),
            $pool->get(config('app.url') . '/api/test/queue-channel?text=dddd'),
            $pool->get(config('app.url') . '/api/test/queue-channel?text=eeee'),
            $pool->get(config('app.url') . '/api/test/queue-channel?text=ffff'),
        ]);

        $this->info('1: ' . $responses[0]->ok());
        $this->info('2: ' . $responses[1]->ok());
        $this->info('3: ' . $responses[2]->ok());
        $this->info('1: ' . $responses[3]->ok());
        $this->info('2: ' . $responses[4]->ok());
        $this->info('3: ' . $responses[5]->ok());

        return 0;
    }
}
