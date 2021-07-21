<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //设置添加的字段
    //设置不添加的字段
    protected $guarded = [];
    public function post(){
        return $this->belongsToMany('\App\Models\Post','post_tag','tag_id','post_id');
    }
}
