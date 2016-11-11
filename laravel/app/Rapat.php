<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rapat extends Model
{
    protected $fillable = ['id_rapat','rt_id','nm_rapat','tanggal','jam','catatan'];
    protected $primaryKey = 'id_rapat';
}
