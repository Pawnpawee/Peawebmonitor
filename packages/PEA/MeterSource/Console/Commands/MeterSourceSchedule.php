<?php

namespace PEA\MeterSource\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use PEA\MeterSource\Jobs\GetMeterSource;
use PEA\App\Models\SgtechMicrogrid;

class MeterSourceSchedule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'metersource:schedule';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();
        $m_end = $now->format('i');
        $m_start = $now->subMinutes(15)->format('i');
        $date = $now->format('Y-m-d');
        $hr = $now->format('H');
        // $latest = SgtechMicrogrid::latest('timestamp')->first();

        dispatch(new GetMeterSource($date, $hr, $m_start, $m_end));
    }
}