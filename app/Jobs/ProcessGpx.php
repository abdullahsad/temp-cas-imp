<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;


class ProcessGpx implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
        //
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $response = Http::post('http://159.223.58.211:8005/gpxs', [
            // $response = Http::post('https://webhook.site/c3adc190-dde8-4cab-9d34-b3996bba783e', [
            'id'=> $this->data['id'],
            'user_id'=> $this->data['user_id'],
            'longitude'=> $this->data['longitude'],
            'latitude'=> $this->data['latitude'],
            'speed'=> $this->data['speed'],
            'bearing'=> $this->data['bearing'],
            'altitude'=> $this->data['altitude'],
            'accuracy'=> $this->data['accuracy'],
            'gpx_time'=> $this->data['gpx_time'],
            'updated_at'=> $this->data['updated_at'],
            'created_at'=> $this->data['created_at'],
            'is_offline_data'=> $this->data['is_offline_data'],
        ]);
    }
}
