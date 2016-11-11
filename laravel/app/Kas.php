<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kas extends Model
{
    protected $fillable = ['id_kas','rt_id','nm_kas','tanggal','jumlah','catatan'];
    protected $primaryKey = 'id_kas';
}
