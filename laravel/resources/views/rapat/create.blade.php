@extends('layouts.dashboard')
@section('navbar')
    
    <li><a href="/admin" >Dashboard</a></li>
    <li><a href="/warga" >Data warga</a></li>
    <li><a href="/rapat" class="active" >Jadwal</a></li>
    <li><a href="/kas" >Kas</a></li>
    <li><a href="/himbauan" >Himbauan</a></li>
    <li><a href="/surat">Surat</a></li>

@endsection
@section('header')
    
    <h2>Tambah Jadwal <strong>Kegiatan</strong></h2>

@endsection

@section('content')

        <!-- Main content -->
        <div class="container">
          <div class="box box-primary">
            <div class="box-body">
              <div class="row">
              <div class="space"></div>
                <div class="col-md-4">
                {!! Form::open(array('route'=>'rapat.store')) !!}
                {!! Form::hidden('rt_id',Auth::user()->id,[]) !!}
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
                      {!! Form::button('Tambahkan',['type'=>'submit','class'=>'btn btn-primary']) !!}
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
<script>
  function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
</script>
@endsection