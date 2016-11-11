<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $fillable = ['no_surat','rt_id','nik_warga','tanggal','jns_surat'];
    protected $primaryKey = 'no_surat';
}
