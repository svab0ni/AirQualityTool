<?php

namespace App\Console\Commands;

use App\Mail\MonthlyNewsletter;
use App\Models\AirQualityRecording;
use App\Models\HealthHazardLevel;
use App\Models\MonthlyNewsletterRecipient;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMonthlyNewsletter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:newsletter:monthly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        $aqiData = AirQualityRecording::with('healthHazardLevel', 'reading', 'city')
            ->where('taken_at', '>', Carbon::now()->subMonth())
            ->get();

        $aqiAverage = aqiAverage($aqiData);
        $healthHazard = HealthHazardLevel::where('air_quality_index_lower_bound', '<=', $aqiAverage)
            ->where('air_quality_index_upper_bound', '>=', $aqiAverage)
            ->first();

        $monthlyEmailRecipients = MonthlyNewsletterRecipient::where('is_verified', 1)
            ->get();

        $monthlyNewsletterData = collect([
            'healthHazard' => $healthHazard,
            'aqiAverage' => $aqiAverage,
            'aqiData' => $aqiData
        ]);

        foreach ($monthlyEmailRecipients as $emailRecipient)
        {
            Mail::to($emailRecipient->email)->send(new MonthlyNewsletter($monthlyNewsletterData));
        }
    }
}
