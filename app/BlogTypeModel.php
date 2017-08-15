<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogTypeModel extends Model
{
    //
    use SoftDeletes;

    protected $table = 'blog_type';
    protected $primaryKey = 'blog_type_id';
    protected $dates = ['deleted_at'];

}
