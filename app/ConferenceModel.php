<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConferenceModel extends Model
{
    //

    use SoftDeletes;

    protected $table = 'research_conference';
    protected $primaryKey = 'rc_id';

    protected $dates = [ 'deleted_at' ];

    public function user ()
    {

        return $this->belongsTo(UserresearchModel::class, 'rc_id', 'rc_id');

    }

    public function publishlevel ()
    {

        return $this->belongsTo(ResearchlevelModel::class, 'rc_publish_level', 'rl_id');

    }

    public function presentType ()
    {

        return $this->belongsTo(ResearchPresentTypeModel::class, 'rc_present_type', 'rsp_id');

    }

    public function proseedingType ()
    {

        return $this->belongsTo(ResearchProceedingTypeModel::class, 'rc_proceeding_type', 'rpt_id');

    }

    public function team ()
    {
        return $this->hasMany(ResearhteamModel::class, 'rc_id', 'rc_id');

    }
}
