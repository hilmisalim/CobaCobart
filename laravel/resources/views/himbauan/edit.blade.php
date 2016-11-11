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
    
    <h2>Perbaharui <strong> Himbauan</strong></h2>

@endsection

@section('content')
  @foreach($data as $himbauan)
        <div class="container">
          <div class="box box-default">
            <div class="box-body">
              <div class="row">
              <div class="space"></div>
                <div class="col-md-4">
                {!! Form::model($himbauan,array('route'=>['himbauan.update',$himbauan->id_himbauan],'method'=>'PUT')) !!}
                  <div class="form-group">
                    {!! Form::label('nm_himbauan','Nama himbauan') !!}
                    {!! Form::text('nm_himbauan',null,['class'=>'form-control']) !!}
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    {!! Form::label('tanggal','Tanggal') !!}
                    {!! Form::date('tanggal',null,['class'=>'form-control']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('status','Status') !!}
                    {!! Form::text('status',null,['class'=>'form-control']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('jam','Jam') !!}
                    {!! Form::text('jam',null,['class'=>'form-control', 'onkeypress'=>'validate(event)']) !!}
                  </div>
                </div><!-- /.col -->
                <div class="col-md-8">
                  <div class="form-group">
                    {!! Form::label('catatan','Catatan') !!}
                    {!! Form::textarea('catatan',null,['class'=>'form-control']) !!}
                  </div><!-- /.form-group -->
                  <div class="form-group" align="right">
                      {!! Form::button('Perbaharui',['type'=>'submit','class'=>'btn btn-primary']) !!}
                  </div>
                </div><!-- /.col -->
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
  @endforeach
@endsection