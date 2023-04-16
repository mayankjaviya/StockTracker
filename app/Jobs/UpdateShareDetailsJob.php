<?php

namespace App\Jobs;

use App\Models\MyShare;
use App\Models\ShareUpdate;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateShareDetailsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $shares = [];

    /**
     * Create a new job instance.
     *
     * @param string|array $shares
     */
    public function __construct(array|string $shares)
    {
        $this->shares = is_array($shares) ? $shares : [$shares];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $result = [];
        foreach ($this->shares as $share) {
            $json = file_get_contents('https://www.alphavantage.co/query?function=TIME_SERIES_DAILY_ADJUSTED&symbol=' . $share . '&outputsize=10&apikey=' . env("ALPHA_VANTAGE_API_KEY"));

            $result[$share] = json_decode($json, true);
        }
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
        foreach ($result as $share => $data) {
            if (empty($data)) {
                continue;
            }
            foreach ($data['Time Series (Daily)'] as $date => $dateWiseData) {
                $input[$share][$date]['symbol'] = $share;
                $input[$share][$date]['name'] = $share;
                $input[$share][$date]['open'] = $dateWiseData['1. open'];
                $input[$share][$date]['high'] = $dateWiseData['2. high'];
                $input[$share][$date]['low'] = $dateWiseData['3. low'];
                $input[$share][$date]['close'] = $dateWiseData['4. close'];
                $input[$share][$date]['current_price'] = $dateWiseData['5. adjusted close'];
                $input[$share][$date]['trade_date'] = Carbon::parse($date);
                $i++;
            }
        }

        foreach ($input as $key => $record) {
            $shareDetails = $record[array_key_first($record)];
            $myShare = MyShare::updateOrCreate([
                'symbol' => $key
            ], [
                'name' => $shareDetails['name'],
                'symbol' => $shareDetails['symbol'],
                'current_price' => $shareDetails['current_price'],
            ]);
            foreach ($record as $dailyRecord) {
                $dailyRecord['share_id'] = $myShare->id;
                ShareUpdate::firstOrCreate(array_slice($dailyRecord, 2), $dailyRecord);
            }

        }


    }
}