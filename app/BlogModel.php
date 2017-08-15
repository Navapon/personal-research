<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogModel extends Model
{
    //
    use SoftDeletes;

    protected $table = 'blog';
    protected $primaryKey = 'blog_id';
    protected $dates = ['deleted_at'];

    public function author(){

        return $this->belongsTo(ProfileModel::class, 'u_id', 'u_id');

    }
}
