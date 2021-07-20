<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Psr\SimpleCache\CacheInterface;

class CheckResponseStatuses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:responses:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check responses statuses from the cache';

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
    public function handle(CacheInterface $cache)
    {
        $value = $this->output->ask('Do you want to continue(yes or no)?', 'no', function ($item) {
            if ($item !== 'no' || $item !== 'yes') {
                return false;
            }
            return true;
        });
//        dd($value);
        $cache->set('statuses', [200 => 5, 204 => 2, 301 => 1, 302 => 2, 400 => 50, 500 => 2]);
        $statuses = $cache->get('statuses', []);
        $this->output->table(array_keys($statuses), [array_values($statuses)]);

        foreach ($statuses as $code => $number) {
            $message = sprintf('%d took place %d', $code, $number);
            if ($code > 199 && $code < 400) {
                $this->output->info($message);
            } elseif ($code >= 400 && $code < 500) {
                $this->output->warning($message);
            } elseif ($code >= 500) {
                $this->output->error($message);
            } else {
                $this->output->note('unknown type: ' . $message);
            }
        }

        dd($statuses);
    }
}
