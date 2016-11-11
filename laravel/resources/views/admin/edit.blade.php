@extends('layouts.dashboard')
@section('navbar')
    
    <li><a href="/admin" >Dashboard</a></li>
    <li><a href="/warga" >Data warga</a></li>
    <li><a href="/rapat" >Jadwal</a></li>
    <li><a href="/kas" >Kas</a></li>
    <li><a href="/himbauan" >Himbauan</a></li>
    <li><a href="#" >Surat</a></li>

@endsection
@section('header')
    
    <h2>Silahkan<strong>Perbaharui data</strong></h2>

@endsection

@section('content')

    <!-- Contact Section
    ==========================================-->
    <div id="tf-contact" class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="section-title center">
                        <h2>Perbaharui <strong>Data</strong></h2>
                        <div class="line">
                            <hr>
                        </div>
                        <div class="clearfix"></div>
                        <small><em>Data yang didaftarkan harus data sebenarnya. Data registrasi ini akan <strong>secara otomatis terdaftar menjadi data default</strong> untuk data warga yang akan dimasukan nantinya</em></small>           
                    </div>
                    <div class="row">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                    </div>
                        <div class="row">
                           {!! Form::model($user,array('route'=>['admin.update',$user->id],'method'=>'PUT')) !!}
                            {{ csrf_field() }}

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('name','Nama Lengkap') !!}
                                    {!! Form::text('name',null,['class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('rt','RT') !!}
                                    {!! Form::number('rt',null,['class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('rw','RW') !!}
                                    {!! Form::number('rw',null,['class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    {!! Form::label('alamat','Alamat') !!}
                                    {!! Form::text('alamat',null,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('kd_pos','Kode pos') !!}
                                    {!! Form::text('kd_pos',null,['class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('kelurahan','Kelurahan') !!}
                                    {!! Form::text('kelurahan',null,['class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('kecamatan','Kecamatan') !!}
                                    {!! Form::text('kecamatan',null,['class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('kota','Kota') !!}
                                    {!! Form::text('kota',null,['class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('provinsi','Provinsi') !!}
                                    {!! Form::text('provinsi',null,['class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('no_hp','No Handphone') !!}
                                    {!! Form::text('no_hp',null,['class'=>'form-control', 'placeholder'=>'085777552222']) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('email','Email') !!}
                                    {!! Form::text('email',null,['class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('password','Password') !!}
                                    <input type="password" name="password" class="form-control" placeholder="Isi dengan password lama atau ganti password baru">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('password_confirmation','Confirm Password') !!}
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-6">
                                {!! Form::button('Perbaharui',['type'=>'submit','class'=>'btn tf-btn btn-default']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection