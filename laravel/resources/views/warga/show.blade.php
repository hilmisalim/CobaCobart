@extends('layouts.dashboard')
@section('navbar')
    
    <li><a href="/admin"  >Dashboard</a></li>
    <li><a href="/warga" class="active">Data warga</a></li>
    <li><a href="/rapat" >Jadwal</a></li>
    <li><a href="/kas" >Kas</a></li>
    <li><a href="/himbauan" >Himbauan</a></li>
    <li><a href="/surat">Surat</a></li>

@endsection
@section('header')
    
    <h2>Data <strong>warga</strong></h2>

@endsection

@section('content')
@foreach ($data as $warga)
<div class="container">
    <div class="space"></div>
    <div class="panel panel-default">
        <div class="panel-heading" align="center">Data:<strong> {{$warga->nm_lengkap}}</strong></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                <table class="table table-bordered">
                    <tr><th>NIK</th> <td>{{$warga->nik_warga}}</td></tr>
                    <tr><th>No. KK</th> <td>{{$warga->no_kk}}</td></tr> 
                    <tr><th>Nama lengkap</th> <td> {{$warga->nm_lengkap}}<br />
                    <tr><th>Nama Ayah</th> <td> {{$warga->nm_ayah}}</td></tr> 
                    <tr><th>Nama Ibu</th> <td> {{$warga->nm_ibu}}</td></tr>
                    <tr><th>Jenis kelamin</th> <td> {{ ($warga->jns_kelamin=='P')? 'Perempuan' : 'Laki-laki'}}  </td></tr> 
                    <tr><th>Tempat, tanggal lahir</th> <td> {{$warga->tmp_lahir}}, {{$warga->tgl_lahir}}</td></tr>
                    <tr><th>Agama</th> <td> {{$warga->agama}}</td></tr> 
                    <tr><th>Pendidikan</th> <td> {{$warga->pendidikan}}</td></tr> 
                    <tr><th>Pekerjaan</th> <td> {{$warga->pekerjaan}}</td></tr> 
                    <tr><th>Status perkawinan</th> <td> {{$warga->sts_perkawinan}}</td></tr> 
                    <tr><th>Status dalam keluarga</th> <td> {{$warga->sts_dlm_keluarga}}</td></tr> 
                    <tr><th>Kewarganegaraan</th> <td> {{$warga->kewarganegaraan}}</td></tr> 
                    <tr><th>Nomor paspor</th> <td> {{$warga->no_paspor}}</td></tr> 
                </table>
                    </div>
                    <div class="col-sm-6">
                <table class="table table-bordered">
                    <tr><th>Nomor kitas</th> <td> {{$warga->no_kitas}}</td></tr> 
                    <tr><th>Alamat asal</th> <td> {{$warga->alm_asal}}</td></tr> 
                    <tr><th>Alamat sekarang</th> <td> {{$warga->alm_sekarang}}</td></tr> 
                    <tr><th>RT</th> <td> {{$warga->rt}}</td></tr> 
                    <tr><th>RW</th> <td> {{$warga->rw}}</td></tr> 
                    <tr><th>Kode pos</th> <td> {{$warga->kd_pos}}</td></tr> 
                    <tr><th>Kelurahan</th> <td> {{$warga->kelurahan}}</td></tr> 
                    <tr><th>Kecamatan</th> <td> {{$warga->kecamatan}}</td></tr> 
                    <tr><th>Kota</th> <td> {{$warga->kota}}</td></tr> 
                    <tr><th>Provinsi</th> <td> {{$warga->provinsi}}</td></tr> 
                    <tr><th>Status Kependudukan</th> <td> {{$warga->sts_kependudukan}}</td></tr> 
                    <tr><th>Nomor telepon</th> <td> {{$warga->no_hp}}</td></tr> 
                    <tr><th>E-mail</th> <td> {{$warga->email}}</td></tr> 
                    <tr><th>Tercatat pada</th> <td> {{$warga->created_at}}</td></tr>
                </table>
                <a href="{{ URL::previous() }}" class="btn btn-primary">Kembali</a> 
                    </div>
            </div>
        </div>
    </div>
@endforeach
@endsection
