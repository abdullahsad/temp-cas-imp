<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GPX extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gpx_new';
    protected $fillable = ['user_id','longitude','latitude','speed','bearing','altitude','gpx_time','is_offline_data','accuracy'];

    

    
}