<?php

namespace App\Console\Commands;

use App\Jobs\UpdateShareDetailsJob;
use App\Models\MyShare;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class UpdateShareDetailsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'st:update-shares';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $this->info('Running daily share update command');
        MyShare::chunk(5,function($getShares){
            if ($getShares->count() < 5) {
                $this->info('Loading more...');
                sleep(60);
            }
            list($shareNames, $symbols) = Arr::divide($getShares->pluck('symbol','name')->toArray());
            UpdateShareDetailsJob::dispatch($symbols,$shareNames);
        });

        $this->info(' Share Details Updated Successfully.');

        return Command::SUCCESS;
    }
}
