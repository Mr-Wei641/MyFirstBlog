<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //设置添加的字段
    //设置不添加的字段
    protected $guarded = [];
    public function tag(){
        return $this->belongsToMany('\App\Models\Tag','post_tag','post_id','tag_id');
    }
}
