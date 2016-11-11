@extends('layouts.dashboard')
@section('navbar')
    
    <li><a href="/admin" >Dashboard</a></li>
    <li><a href="/warga"  class="active">Data warga</a></li>
    <li><a href="/rapat" >Jadwal</a></li>
    <li><a href="/kas" >Kas</a></li>
    <li><a href="/himbauan" >Himbauan</a></li>
    <li><a href="/surat">Surat</a></li>

@endsection
@section('header')
    @foreach ($data as $warga)
    <h2>Edit data <strong> {{ $warga->nm_lengkap}}</strong></h2>

@endsection


@section('content')
      
        <!-- Main content -->
        <div class="container">
            <div class="box-body">
              <div class="row">
              <div class="space">
                <div class="col-md-4">
                {!! Form::model($warga,array('route'=>['warga.update',$warga->nik_warga],'method'=>'PUT')) !!}
                  <div class="form-group">
                    {!! Form::label('nik_warga','Nomor induk keluarga*') !!}
                    {!! Form::text('nik_warga',null,['class'=>'form-control', 'onkeypress'=>'validate(event)']) !!}
                  </div><!-- /.form-group -->
                  <div class="form-group">
                      {!! Form::label('no_kk','Nomor kartu keluarga*') !!}
                      {!! Form::text('no_kk',null,['class'=>'form-control','onkeypress'=>'validate(event)']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('nm_lengkap','Nama lengkap*') !!}
                    {!! Form::text('nm_lengkap',null,['class'=>'form-control']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('nm_ayah','Nama ayah*') !!}
                    {!! Form::text('nm_ayah',null,['class'=>'form-control']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('nm_ibu','Nama ibu*') !!}
                    {!! Form::text('nm_ibu',null,['class'=>'form-control']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('jns_kelamin','Jenis kelamin*') !!} <br />
                    {!! Form::select('jns_kelamin',['P' => 'Pria', 'W' => 'Wanita'],null,['class'=>'form-control']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('tmp_lahir','Tempat lahir*') !!}
                    {!! Form::text('tmp_lahir',null,['class'=>'form-control']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('tgl_lahir','Tanggal lahir*') !!}
                    {!! Form::date('tgl_lahir',null,['class'=>'form-control']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('agama','Agama*') !!} <br />
                    {!! Form::select('agama',['Islam' => 'Islam',
                                             'Kristen' => 'Kristen',
                                             'Hindu' => 'Hindu',
                                             'Budha' => 'Budha',
                                             'Lainnya' => "Lainnya.."
                                             ],null,['class'=>'form-control']) !!}
                  </div>
                </div><!-- /.col -->
                <div class="col-md-4">
                  <div class="form-group">
                    {!! Form::label('pendidikan','Pendidikan') !!} <br />
                    {!! Form::select('pendidikan',['SD' => 'SD',
                                             'SMP' => 'SMP',
                                             'SMA' => 'SMA',
                                             'D1' => 'D1',
                                             'D2' => 'D2',
                                             'D3' => 'D3',
                                             'D4' => 'D4',
                                             'S1' => 'S1',
                                             'S2' => 'S2',
                                             'S3' => 'S3']
                                             ,null,['class'=>'form-control']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('pekerjaan','Pekerjaan') !!}
                    {!! Form::select('pekerjaan',['Pegawai Negeri Sipil' => 'Pegawai Negeri Sipil',
                                             'Pegawai Swasta' => 'Pegawai Swasta',
                                             'Wiraswasta' => 'Wiraswasta',
                                             'Lainnya' => 'Lainnya..'],null,['class'=>'form-control']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('sts_perkawinan','Status perkawinan') !!} <br />
                    {!! Form::select('sts_perkawinan',['Belum menikah'=>'Belum menikah', 'Menikah'=>'Menikah'],null,['class'=>'form-control']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('sts_dlm_keluarga','Status dalam keluarga') !!} <br />
                    {!! Form::select('sts_dlm_keluarga',['Ayah'=>'Ayah','Ibu'=>'Ibu','Anak'=>'Anak'],null,['class'=>'form-control']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('kewarganegaraan','Kewarganegaraan') !!} <br />
                    {!! Form::select('kewarganegaraan',['WNI'=>'WNI','WNA'=>'WNA'],null,['class'=>'form-control']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('no_paspor','No paspor') !!}
                    {!! Form::text('no_paspor',null,['class'=>'form-control','onkeypress'=>'validate(event)']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('no_kitas','No kitas') !!}
                    {!! Form::text('no_kitas',null,['class'=>'form-control','onkeypress'=>'validate(event)']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('alm_sekarang','Alamat sekarang') !!}
                    {!! Form::text('alm_sekarang',null,['class'=>'form-control']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('alm_asal','Alamat asal') !!}
                    {!! Form::text('alm_asal',null,['class'=>'form-control']) !!}
                  </div>
                </div><!-- /.col -->
                <div class="col-md-4">
                  <div class="form-group">
                    {!! Form::label('rt','RT') !!} <br />
                    {!! Form::selectRange('rt',1,20,null,['class'=>'form-control','onkeypress'=>'validate(event)']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('rw','RW') !!} <br />
                    {!! Form::selectRange('rw',1,20,null,['class'=>'form-control','onkeypress'=>'validate(event)']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('kd_pos','Kode pos') !!}
                    {!! Form::text('kd_pos',null,['class'=>'form-control','onkeypress'=>'validate(event)']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('kelurahaan','Kelurahan') !!}
                    {!! Form::text('kelurahan',null,['class'=>'form-control']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('kecamatan','Kecamatan') !!}
                    {!! Form::text('kecamatan',null,['class'=>'form-control']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('kota','Kota') !!}
                    {!! Form::text('kota',null,['class'=>'form-control']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('provinsi','Provinsi') !!}
                    {!! Form::text('provinsi',null,['class'=>'form-control']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('email','Email') !!}
                    {!! Form::text('email',null,['class'=>'form-control']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('no_hp','Nomor HP') !!}
                    {!! Form::text('no_hp',null,['class'=>'form-control','onkeypress'=>'validate(event)']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('sts_kependudukan','Status kependudukan') !!}
                    {!! Form::text('sts_kependudukan',null,['class'=>'form-control']) !!}
                  </div>
                  <div class="form-group" align="right">
                      {!! Form::button('Perbaharui',['type'=>'submit','class'=>'btn btn-primary']) !!}
                  </div>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.box-body -->
               @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
                @endif
          </div><!-- /.box -->
        </div><!-- /.container -->
      @endforeach

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