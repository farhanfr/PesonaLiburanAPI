<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DestinationModel extends Model
{
    protected $table="destination";
    protected $primaryKey="destination_id";
    protected $fillable=['city_id','destination_name','destination_desc','destination_img'];
    public $timestamps=FALSE;
}
