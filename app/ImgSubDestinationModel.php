<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImgSubDestinationModel extends Model
{
    protected $table="img_sub_destination";
    protected $primaryKey="img_sub_destination_id";
    protected $fillable=['destination_id','img_sb','title_subimg'];
    public $timestamps=FALSE;
}
