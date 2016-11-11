@extends('layouts.dashboard')
@section('navbar')
    
    <li><a href="/admin"  >Dashboard</a></li>
    <li><a href="/warga" class="active">Data warga</a></li>
    <li><a href="/rapat" >Jadwal</a></li>
    <li><a href="/kas" >Kas</a></li>
    <li><a href="/himbauan" >Himbauan</a></li>
    <li><a href="/surat">Surat</a></li>

@endsection
@section('header')
    
    <h2>Data <strong>warga</strong></h2>

@endsection

@section('content')
    <div class="container">
        <div class="space"></div>
        @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @elseif(Session::has('gagal'))
            <div class="alert alert-danger">{{ Session::get('gagal') }}</div>
        @endif
        <div class="row">
          <div class="col-md-8"> 
            {{ link_to_route('warga.create','Tambahkan data warga',null,['class'=>'btn btn-default btn-lg']) }}
          </div>
          <div class="col-md-4">
            <a href="{{ URL::to('deleteAllWar') }}" class="btn btn-danger" onclick="ConfirmDelete()"> Hapus semua data</a>
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Import data</button>

            <!-- Modal -->
              <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      Import Data Warga
                    </div>
                    <form action="postImportWar" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                      <input type="file" name="warga">
                    </div>
                    <div class="modal-footer">
                      <input type="submit" class="btn btn-default" value="Import">
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            <a href="{{ URL::to('getExportWar') }}" class="btn btn-info"> Export data</a>
          </div>
        </div>
        <br />
        <div class="row">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>NIK</th>
                  <th>No. KK</th>
                  <th>Nama lengkap</th>
                  <th>Nama ibu</th>
                  <th>Jenis kelamin</th>
                  <th>Tempat lahir</th>
                  <th>Tanggal lahir</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php $no=1 ;?>
              @foreach ($wargas as $value => $warga)
                <tr role="row">
                  <td>{{ $no }}</td>
                  <td>{{ link_to_route('warga.show',$warga->nik_warga,[$warga->nik_warga]) }}</td>
                  <td>{{ $warga->no_kk }}</td>
                  <td>{{ $warga->nm_lengkap }}</td>
                  <td>{{ $warga->nm_ibu }}</td>
                  <td>{{ ($warga->jns_kelamin=='P')? 'Perempuan' : 'Laki-laki'}}</td>
                  <td>{{ $warga->tmp_lahir }}</td>
                  <td>{{ $warga->tgl_lahir }}</td>
                  <td align="center">{!! Form::open(array('route'=>['warga.destroy',$warga->nik_warga],'method'=>'DELETE','onsubmit' => 'return ConfirmDelete()')) !!} 
                              <a href="warga/{{$warga->nik_warga}}/edit " class="btn btn-warning btn-sm"><i class="fa fa-fw fa-edit fa-lg"></i></a>

                              <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i></button>
                      {!! Form::close() !!}
                  </td>
                </tr>
                <?php $no++ ;?>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
@endsection
