@extends('layouts.dashboard')
@section('navbar')
    
    <li><a href="/admin"  >Dashboard</a></li>
    <li><a href="/warga" >Data warga</a></li>
    <li><a href="/rapat" >Jadwal</a></li>
    <li><a href="/kas" >Kas</a></li>
    <li><a href="/himbauan" >Himbauan</a></li>
    <li><a href="/surat" class="active">Surat</a></li>

@endsection

@section('header')
    
    <h2>Buat  <strong> Surat</strong></h2>

@endsection

@section('content')

        <!-- Main content -->
        <div class="container">
          <div class="box box-primary">
            <div class="box-body">
              <div class="row">
              <div class="space"></div>
                <div class="col-md-6">
                {!! Form::open(array('route'=>'surat.store')) !!}
                {!! Form::hidden('rt_id',Auth::user()->id,[]) !!}
                  <div class="form-group">
                    {!! Form::label('nik_warga','NIK warga') !!}
                    {!! Form::text('nik_warga',null,['class'=>'form-control','onkeypress'=>'validate(event)']) !!}
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    {!! Form::hidden('tanggal',date("Y-m-d"),['class'=>'form-control']) !!}
                  </div><!-- /.form-group -->
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                {!! Form::label('jns_surat','Jenis surat') !!} <br />
                {!! Form::select('jns_surat',['Pengantar' => 'Pengantar',
                                         'Domisili' => 'Domisili',
                                         'Kelahiran' => 'Kelahiran',
                                         'Kematian' => 'Kematian'
                                         ],null,['class'=>'form-control']) !!}
                </div>
                </div>
                  <div class="form-group" align="right">
                      {!! Form::button('Submit',['type'=>'submit','class'=>'btn btn-primary']) !!}
                  </div>
                </div><!-- /.row -->
              </div><!-- /.body -->
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