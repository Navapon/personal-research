<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserresearchModel extends Model
{
    use SoftDeletes;

    protected $table = "users_research";
    protected $primaryKey = 'ur_id';


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [ 'deleted_at' ];

    public function journal ()
    {

        return $this->belongsTo(JournalModel::class, 'rj_id', 'rj_id');

    }


    public function conference ()
    {

        return $this->belongsTo(ConferenceModel::class, 'rc_id', 'rc_id');

    }

    public function project ()
    {

        return $this->belongsTo(ProjectModel::class, 'rp_id', 'rp_id');

    }





    public function user ()
    {

        return $this->belongsTo(ProfileModel::class, 'u_id', 'u_id');

    }

    public function team ()
    {
        return $this->hasMany(ResearhteamModel::class,'rj_id','rj_id');
    }

    public function teamConference ()
    {
        return $this->hasMany(ResearhteamModel::class,'rc_id','rc_id');
    }


}
