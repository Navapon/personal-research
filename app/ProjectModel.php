<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectModel extends Model
{
    //
    use SoftDeletes;

    protected $table = 'research_project';
    protected $primaryKey = 'rp_id';


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function user(){

        return $this->belongsTo(UserresearchModel::class,'rp_id','rp_id');

    }

    public function fund(){

        return $this->belongsTo(FundtypeModel::class,'fund_id','fund_id');

    }

    public function statusRp (){

        return $this->belongsTo(ResearchstatusModel::class,'rp_status','rst_id');

    }
    
    public function team(){

        return $this->hasMany(ResearhteamModel::class,'rp_id','rp_id');

    }
}
