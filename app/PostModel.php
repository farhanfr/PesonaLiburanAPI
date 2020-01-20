<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    protected $table="post";
    protected $primaryKey="post_id";
    protected $fillable=['user_id','post_title','post','post_date','post_time','post_img'];
    public $timestamps=FALSE;
}
