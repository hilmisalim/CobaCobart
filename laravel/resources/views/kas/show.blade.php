@extends('layouts.dashboard')
@section('navbar')
    
    <li><a href="/admin" >Dashboard</a></li>
    <li><a href="/warga" >Data warga</a></li>
    <li><a href="/rapat" >Jadwal</a></li>
    <li><a href="/kas" class="active"  >Kas</a></li>
    <li><a href="/himbauan" >Himbauan</a></li>
    <li><a href="#" >Surat</a></li>

@endsection
@section('header')
    
    <h2>Lihat Kas <strong> Warga</strong></h2>

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <div class="space"></div>
        @foreach($data as $kas)
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Tanggal kas:</strong> {{$kas->tanggal}}</div>

                <div class="panel-body">
                    <strong>Nama kas:</strong> {{$kas->nm_kas}}<br />
                    <strong>Nominal:</strong> {{$kas->jumlah}}<br />
                    <strong>Catatan:</strong> {{$kas->catatan}}
                </div>
                
            </div>
            <a href="{{ URL::previous() }}" class="btn btn-primary">Kembali</a>   
        @endforeach
        </div>
    </div>
</div>
@endsection
