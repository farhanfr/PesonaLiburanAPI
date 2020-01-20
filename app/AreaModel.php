<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaModel extends Model
{
    protected $table="area";
    protected $primaryKey="area_id";
    protected $fillable=['name_area'];
    public $timestamps=FALSE;
}
