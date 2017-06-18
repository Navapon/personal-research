<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'u_id';

    protected $fillable = [
        'u_name_th', 'u_email', 'u_surname_th',
    ];

    public function academic(){

        return $this->belongsTo(AcademicModel::class, 'u_academic_id','academic_id');

    }

    public function major(){

        return $this->belongsTo(MajorModel::class, 'u_major_id','major_id');

    }

    public function journal(){

        return $this->hasMany(UserresearchModel::class,'u_id','u_id');

    }






}
