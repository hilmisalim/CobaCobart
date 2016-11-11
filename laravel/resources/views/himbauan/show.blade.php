@extends('layouts.dashboard')
@section('navbar')
    
    <li><a href="/admin"  >Dashboard</a></li>
    <li><a href="/warga" >Data warga</a></li>
    <li><a href="/rapat" >Jadwal</a></li>
    <li><a href="/kas" >Kas</a></li>
    <li><a href="/himbauan" class="active">Himbauan</a></li>
    <li><a href="/surat">Surat</a></li>

@endsection
@section('header')
    
    <h2>Himbauan <strong> Warga</strong></h2>

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <div class="space"></div>
        @foreach($data as $himbauan)
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Tanggal kas:</strong> {{$himbauan->tanggal}}</div>

                <div class="panel-body">
                    <strong>Nama himbauan:</strong> {{$himbauan->nm_himbauan}}<br />
                    <strong>Status:</strong> {{$himbauan->status}}<br />
                    <strong>Catatan:</strong> {{$himbauan->catatan}}
                </div>
            </div>
          <a href="{{ URL::previous() }}" class="btn btn-primary">Kembali</a>   
        @endforeach
        </div>
    </div>
</div>
@endsection
