<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    protected $fillable = [ 'nik_warga',
                            'rt_id',
                						'no_kk',
                						'nm_lengkap',
                						'nm_ayah',
                						'nm_ibu',
                						'jns_kelamin',
                						'tmp_lahir',
                    				'tgl_lahir',
                    				'agama',
                  					'pendidikan',
                    				'pekerjaan',
                  					'sts_perkawinan',
                    				'sts_dlm_keluarga',
                    				'kewarganegaraan',
                   					'no_paspor',
                   					'no_kitas',
                    				'alm_sekarang',
               						  'rt',
                  					'rw',
                					  'kd_pos',
                   					'kelurahan',
        				            'kecamatan',
        				            'kota',
        				           	'provinsi',
        				          	'alm_asal',
        				            'email',
        				           	'no_hp',
        				           	'sts_kependudukan'
    					];

    protected $primaryKey = 'nik_warga';

    public function scopeCoba($query){
    
    //$query->where('nik_warga',23) ;
    //$ms = Warga::where('nik_warga', $type);
      if (count($query) > 0)  //Ensure that there is at least one result 
      {
         foreach ($query as $row)  //Iterate through results
         {
            return $row->nik_warga;
         }
      }  
    }
}

