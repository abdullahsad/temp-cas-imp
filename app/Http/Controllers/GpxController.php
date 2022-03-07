<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Gpx;
use App\Http\Controllers\Controller;
use App\Jobs\ProcessGpx;
// use Controller;
class GpxController extends Controller
{
    //get all snd user
    public function getGpxs(Request $r)
    {
        $gpxs = Gpx::paginate(500);
        foreach($gpxs as $gpx){
            $data = [
                "id" => $gpx->id,
                "user_id" => $gpx->user_id,
                "longitude" => $gpx->longitude,
                "latitude" => $gpx->latitude,
                "speed" => $gpx->speed,
                "bearing" =>$gpx->bearing,
                "created_at" => $gpx->created_at,
                "updated_at" => $gpx->updated_at,
                "altitude" => $gpx->altitude,
                "gpx_time" => $gpx->gpx_time,
                "is_offline_data" => $gpx->is_offline_data,
                "accuracy" =>$gpx->accuracy,

            ];
            $job_gpx = new ProcessGpx($data);
            dispatch($job_gpx);
        }
    }
}
