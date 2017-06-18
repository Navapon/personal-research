<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JournalModel extends Model
{
    //
    use SoftDeletes;

    protected $table = 'research_journal';
    protected $primaryKey = 'rj_id';

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

        return $this->belongsTo(UserresearchModel::class,'rj_id','rj_id');

    }

    public function fund(){

        return $this->belongsTo(FundtypeModel::class,'fund_id','fund_id');

    }

    public function publishlevel(){

        return $this->belongsTo(ResearchlevelModel::class,'rj_publish_level','rl_id');

    }

    public function team(){

        return $this->hasMany(ResearhteamModel::class,'rj_id','rj_id');

    }
}
