<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CityModel extends Model
{
    protected $table="city";
    protected $primaryKey="city_id";
    protected $fillable=['city_name','city_desc','city_img'];
    public $timestamps=FALSE;
}
