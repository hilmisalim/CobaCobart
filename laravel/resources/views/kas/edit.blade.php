@extends('layouts.dashboard')
@section('navbar')
    
    <li><a href="/admin"  >Dashboard</a></li>
    <li><a href="/warga" >Data warga</a></li>
    <li><a href="/rapat" >Jadwal</a></li>
    <li><a href="/kas" class="active">Kas</a></li>
    <li><a href="/himbauan" >Himbauan</a></li>
    <li><a href="#" >Surat</a></li>

@endsection
@section('header')
    
    <h2>Edit Kas <strong> Warga</strong></h2>

@endsection

@section('content')
@foreach($data as $kas)
        <!-- Main content -->
        <div class="container">

          <!-- SELECT2 EXAMPLE -->
          <div class="box box-default">
            <div class="box-body">
              <div class="row">
              <div class="space"></div>
                <div class="col-md-4">
                {!! Form::model($kas,array('route'=>['kas.update',$kas->id_kas],'method'=>'PUT')) !!}
                  <div class="form-group">
                    {!! Form::label('nm_kas','Nama kas') !!}
                    {!! Form::text('nm_kas',null,['class'=>'form-control']) !!}
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    {!! Form::label('tanggal','Tanggal') !!}
                    {!! Form::date('tanggal',null,['class'=>'form-control']) !!}
                  </div>
                  <div class="form-group">
                  {!! Form::label('jumlah','Jumlah nominal') !!}
                  {!! Form::text('jumlah',null,['class'=>'form-control', 'onkeypress'=>'validate(event)']) !!}
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