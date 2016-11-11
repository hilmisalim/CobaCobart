<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Himbauan extends Model
{
    protected $fillable = ['id_himbauan','rt_id','nm_himbauan','tanggal','jam','catatan','status'];
    protected $primaryKey = 'id_himbauan';
}
