<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $fillable = [
        'name','alamat','rt','rw','kd_pos','kelurahan','kecamatan','kota','provinsi', 'no_hp', 'email', 'password',
    ];

    protected $primaryKey = 'id';

    protected $hidden = [
        'password', 'remember_token',
    ];
}
