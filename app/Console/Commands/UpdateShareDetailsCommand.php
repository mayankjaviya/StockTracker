<?php

namespace App\Console\Commands;

use App\Jobs\UpdateShareDetailsJob;
use App\Models\MyShare;
use Illuminate\Console\Command;

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

        $shares = MyShare::pluck('symbol')->toArray();

        $this->info('Running daily share update command');

        UpdateShareDetailsJob::dispatch($shares);

        $this->info(' Share Details Updated Successfully.');

        return Command::SUCCESS;
    }
}
