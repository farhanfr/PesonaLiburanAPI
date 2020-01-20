<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestDestinationModel extends Model
{
    protected $table="req_destination";
    protected $primaryKey="req_destination_id";
    protected $fillable=['name_city','name_destination','desc_destination'];
    public $timestamps=FALSE;
}
