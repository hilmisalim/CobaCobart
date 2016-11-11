@extends('layouts.dashboard')
@section('navbar')
    
    <li><a href="/admin" class="active" >Dashboard</a></li>
    <li><a href="/warga" >Data warga</a></li>
    <li><a href="/rapat" >Jadwal</a></li>
    <li><a href="/kas" >Kas</a></li>
    <li><a href="/himbauan" >Himbauan</a></li>
    <li><a href="/surat">Surat</a></li>

@endsection
@section('header')
    
    <h2>Hello, <strong> nice to meet you again</strong></h2>

@endsection
@section('content')

   <!-- Services Section
    ==========================================-->
    <div id="tf-services" class="text-center">
        <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @elseif(Session::has('gagal'))
            <div class="alert alert-danger">{{ Session::get('gagal') }}</div>
        @endif
            <div class="row">
                <div class="col-md-3 col-sm-6 service">
                    <i class="fa fa-file"></i>
                    <h4><strong>Data warga</strong></h4>
                    <p>Mengelola data dengan mudah</p>
                </div>

                <div class="col-md-3 col-sm-6 service">
                    <i class="fa fa-calendar"></i>
                    <h4><strong>Penjadwalan </strong></h4>
                    <p>Menjadwalkan dan membuat catatan disetiap kegiatan</p>
                </div>

                <div class="col-md-3 col-sm-6 service">
                    <i class="fa fa-money"></i>
                    <h4><strong>Uang kas</strong></h4>
                    <p>Menjalankan amanah dengan terperinci</p>
                </div>

                <div class="col-md-3 col-sm-6 service">
                    <i class="fa fa-bullhorn"></i>
                    <h4><strong>Himbauan warga</strong></h4>
                    <p>Menyebarkan pengumuman dengan cepat</p>
                </div>
            </div>
        </div>
    </div>


    <div id="tf-testimonials" class="text-center">
        <div class="overlay">
            <div class="container">
                <div class="section-title center">
                    <h2>Buat <strong> Surat? </strong></h2>
                    <div class="line">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    {!! Form::open(array('route'=>'surat.store','class'=>'form-inline')) !!}
                        <div class="row">    
                                <div class="radio">
                                    <label><input type="radio" name=jns_surat value="Pengantar">Pengantar </label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name=jns_surat value="Domisili">Domisili </label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name=jns_surat value="Kelahiran">Kelahiran </label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name=jns_surat value="Kematian">Kematian </label>
                                </div>
                        </div>
                        <br />
                        <div class="row"> 
                            <div class="form-group">
                                <input type="text" class="form-control input-lg" placeholder="masukan NIK" name="nik_warga" required>
                            </div>
                            <div class="form-group">
                                {!! Form::hidden('tanggal',date("Y-m-d"),['class'=>'form-control']) !!}
                            </div><!-- /.form-group -->
                        </div>
                        <br />
                        <div class="row"> 
                            <div class="form-group">
                                {!! Form::button('Submit',['type'=>'submit','class'=>'btn tf-btn btn-default']) !!}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection