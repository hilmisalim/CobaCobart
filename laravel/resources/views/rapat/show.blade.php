@extends('layouts.dashboard')
@section('navbar')
    
    <li><a href="/admin"  >Dashboard</a></li>
    <li><a href="/warga" >Data warga</a></li>
    <li><a href="/rapat" class="active">Jadwal</a></li>
    <li><a href="/kas" >Kas</a></li>
    <li><a href="/himbauan" >Himbauan</a></li>
    <li><a href="/surat">Surat</a></li>

@endsection
@section('header')
    
    <h2>Jadwal <strong>Kegiatan</strong></h2>

@endsection

@section('content')
<div class="container">
    <div class="row">
    <div class="space"></div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            @foreach ($data as $dat)
                <div class="panel-heading"><strong>Tanggal Rapat:</strong> {{ $dat->tanggal }} </div>

                <div class="panel-body">
                    <strong>Nama rapat:</strong> {{ $dat->nm_rapat }} <br />
                    <strong>Jam:</strong> {{ $dat->jam }} <br />
                    <strong>Catatan:</strong> {{ $dat->catatan }}
                </div>
            @endforeach
            </div>                  
            <a href="{{ URL::previous() }}" class="btn btn-primary">Kembali</a> 
        </div>
    </div>
</div>
@endsection
