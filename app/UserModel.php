<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table="user";
    protected $primaryKey="user_id";
    protected $fillable=['name_user','about_user','username','password','user_img','token_user'];
    public $timestamps=FALSE;
}
