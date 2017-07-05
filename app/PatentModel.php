<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatentModel extends Model
{
    //
    use SoftDeletes;

    protected $table = 'research_patent';
    protected $primaryKey = 'pt_id';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    /*    protected $fillable = [
            'rj_article_name', 'rj_name', 'rj_owner',
        ];*/

    public function user(){

        return $this->belongsTo(UserresearchModel::class,'pt_id','pt_id');

    }

    public function type(){

        return $this->belongsTo(PatentTypeModel::class,'pt_type','ptt_id');

    }

    public function publishlevel(){

        return $this->belongsTo(ResearchlevelModel::class,'pt_publish_level','rl_id');

    }

}
