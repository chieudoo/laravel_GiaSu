<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'giasu_file';
    protected $fillable = [];
    public function lop(){
        return $this->belongsTo('App\Models\Lophoc','lop_id');
    }
}
