<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountModel extends Model
{
    protected $table="count";
    protected $primaryKey="count_id";
    protected $fillable=['area_id','count_city','count_destination'];
    public $timestamps=FALSE;
}
