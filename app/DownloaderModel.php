<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DownloaderModel extends Model
{
    //
    use SoftDeletes;

    protected $table = 'downloader';
    protected $primaryKey = 'download_id';
    protected $dates = ['deleted_at'];
}
