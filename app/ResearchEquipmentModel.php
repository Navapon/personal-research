<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResearchEquipmentModel extends Model
{
    use SoftDeletes;

    protected $table = "research_equipment";
    protected $primaryKey =  "re_id";
    protected $dates = ['deleted_at'];

    public function major(){

        return $this->belongsTo(MajorModel::class, 're_major','major_id');

    }


    public function status(){

        return $this->belongsTo(ResearchEquipmentStatusModel::class, 're_status','re_status_id');

    }

}
