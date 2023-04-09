<?php

namespace App\Console\Commands;

use App\Models\ShareUpdate;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Symfony\Component\Console\Helper\ProgressIndicator;

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


//        $json = file_get_contents('https://www.alphavantage.co/query?function=SYMBOL_SEARCH&keywords=tatamotor&apikey=IO1R61Y16XJ4PCZ2');
//        $data = json_decode($json,true);
//        dd($data);
//        print_r($data);




        $shares = ShareUpdate::SHARES;
        $result = [];
        $input = [];

        $bar = $this->output->createProgressBar(count($shares));

        $this->info('Running daily share update command');
        $bar->start();


        foreach ($shares as $key => $share) {
            $bar->advance();
            $json = file_get_contents('https://www.alphavantage.co/query?function=TIME_SERIES_DAILY_ADJUSTED&symbol='.$key.'&outputsize=10&apikey='.env("ALPHA_VANTAGE_API_KEY"));

            $result[$key] = json_decode($json, true);
        }
        $bar->finish();
//        "2023-03-31" => array:8 [▼
//        "1. open" => "2575.0"
//        "2. high" => "2586.1"
//        "3. low" => "2528.05"
//        "4. close" => "2544.0"
//        "5. adjusted close" => "2544.0"
//        "6. volume" => "4487"
//        "7. dividend amount" => "0.0000"
//        "8. split coefficient" => "1.0"
//      ]
        $i = 0;
        foreach ($result as $share => $data){
            foreach ($data['Time Series (Daily)'] as $date => $dateWiseData) {
                $input[$share][$date]['symbol'] = $share;
                $input[$share][$date]['name'] = ShareUpdate::SHARES[$share];
                $input[$share][$date]['open'] = $dateWiseData['1. open'];
                $input[$share][$date]['high'] = $dateWiseData['2. high'];
                $input[$share][$date]['low'] = $dateWiseData['3. low'];
                $input[$share][$date]['close'] = $dateWiseData['4. close'];
                $input[$share][$date]['current_price'] = $dateWiseData['5. adjusted close'];
                $input[$share][$date]['trade_date'] = Carbon::parse($date);
                $i++;
            }
        }

        $this->output->newLine(1);
        $anotherBar = $this->output->createProgressBar($i);
        $anotherBar->start();

        foreach($input as $key => $record){
            $this->info(' Updating details of '.$shares[$key]);
            foreach ($record as $dailyRecord) {
                ShareUpdate::firstOrCreate($dailyRecord);
                $anotherBar->advance();
            }
        }

        $anotherBar->finish();
        $this->info(' Share Details Updated Successfully.');

        return Command::SUCCESS;
    }
}
