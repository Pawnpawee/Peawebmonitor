<?php

namespace PEA\MeterSource\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use PEA\MeterSource\Graphql\Services\MeterSourceService;
use PEA\App\Models\SgtechMicrogrid;

class GetMeterSource implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private string $date;
    private string $hr;
    private string $m_start;
    private string $m_end;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($date, $hr, $m_start, $m_end)
    {
        $this->date = $date;
        $this->hr = $hr;
        $this->m_start = $m_start;
        $this->m_end = $m_end;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        logger()->debug("Start get meter source");
        logger()->debug("date: ". $this->date." hr: ". $this->hr." m_start: ". $this->m_start." m_end: ". $this->m_end);

        try {
            $service = new MeterSourceService();
            $result = $service->query($this->date, $this->hr, $this->m_start, $this->m_end);
            $data = isset($result['data']['metersource'])? collect($result['data']['metersource']):collect();
            logger()->debug("Count data: ".count($data));
            foreach($data as $item){
                SgtechMicrogrid::updateOrCreate(
                    [ 
                        'house_no' => $item['house_no'], 
                        'timestamp' => $item['timestamp'] 
                    ]
                , $item);
            }
        } catch (\Exception $e) {
            logger()->error($e->getMessage());

            throw $e;
        }
        
        logger()->debug("End get meter source");
    }
}
