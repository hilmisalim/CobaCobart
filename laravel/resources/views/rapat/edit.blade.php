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
    
    <h2>Edit Jadwal <strong>Kegiatan</strong></h2>

@endsection
@section('content')
        <!-- Main content -->
        <div class="container">

          <!-- SELECT2 EXAMPLE -->
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div><!-- /.box-header -->
            <div class="box-body">
            @foreach ($data as $rapat)
              <div class="row">
              <div class="space"></div>
                <div class="col-md-4">
                {!! Form::model($rapat,array('route'=>['rapat.update',$rapat->id_rapat],'method'=>'PUT')) !!}
                  <div class="form-group">
                    {!! Form::label('nm_rapat','Nama Rapat') !!}
                    {!! Form::text('nm_rapat',null,['class'=>'form-control']) !!}
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    {!! Form::label('tanggal','Tanggal') !!}
                    {!! Form::date('tanggal',null,['class'=>'form-control']) !!}
                  </div>

                  <div class="form-group clockpicker">
                      {!! Form::label('Jam','Jam') !!}
                      {!! Form::text('jam',null,['class'=>'form-control']) !!}
                  </div>
                  
                </div><!-- /.col -->
                <div class="col-md-8">
                  <div class="form-group">
                    {!! Form::label('catatan','Catatan') !!}
                    {!! Form::textarea('catatan',null,['class'=>'form-control']) !!}
                  </div><!-- /.form-group -->
                </div><!-- /.col -->
                  <div class="form-group" align="right">
                      {!! Form::button('Perbaharui',['type'=>'submit','class'=>'btn btn-primary']) !!}
                  </div>
                </div><!-- /.col -->
                @endforeach
              </div><!-- /.row -->
               @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
                @endif
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div>

@endsection