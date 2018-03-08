<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = "player";
    protected $fillable = ['campaign_name', 'location_name', 'device_name', 'avatar', 'full_name', 'email', 'phone_number', 'birthday', 'mac_address', 'imei', 'created_client_at', 'content', 'state', 'remember_token', 'created_at', 'updated_at'];
    public $timestamps = true;
}
