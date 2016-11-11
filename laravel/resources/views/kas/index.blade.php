@extends('layouts.dashboard')
@section('navbar')
    
    <li><a href="/admin" >Dashboard</a></li>
    <li><a href="/warga" >Data warga</a></li>
    <li><a href="/rapat" >Jadwal</a></li>
    <li><a href="/kas"  class="active">Kas</a></li>
    <li><a href="/himbauan" >Himbauan</a></li>
    <li><a href="/surat" >Surat</a></li>

@endsection
@section('header')
    
    <h2>Kas <strong> Warga</strong></h2>

@endsection

@section('content')
    <!-- Main content -->
    <div class="container">
      <div class="space"></div>
        @if(Session::has('message'))
          <div class="alert alert-success">{{ Session::get('message') }}</div>
        @elseif(Session::has('gagal'))
          <div class="alert alert-danger">{{ Session::get('gagal') }}</div>
        @endif
        <div class="row">
          <div class="col-md-8"> 
            {{ link_to_route('kas.create','Tambahkan kas warga',null,['class'=>'btn btn-default btn-lg']) }}
          </div>
          <div class="col-md-4">
            <a href="{{ URL::to('deleteAllKas') }}" class="btn btn-danger" onclick="ConfirmDelete()"> Hapus semua data</a>
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Import data</button>

            <!-- Modal -->
              <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      Import Data Kas
                    </div>
                    <form action="postImportKas" method="post" enctype="multipart/form-data">
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
            <a href="{{ URL::to('getExportKas') }}" class="btn btn-info"> Export data</a>
          </div>
        </div>
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama kas</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Catatan</th>
                    <th>Aksi</tr>
                </thead>
                <?php $no=1; ?>
                <tbody>
                @foreach ($kass as $value=>$ka)
                  <tr>
                    <td>{{ $no }}</td>
                    <td>{{ link_to_route('kas.show',$ka->nm_kas,[$ka->id_kas]) }}</td>
                    <td>{{ $ka->tanggal }}</td>
                    <td>{{ $ka->jumlah }}</td>
                    <?php $stringCut = substr($ka->catatan, 0,50); ?>
                    <td>{{ $stringCut }}</td>
                    <td align="center">{!! Form::open(array('route'=>['kas.destroy',$ka->id_kas],'method'=>'DELETE','onsubmit' => 'return ConfirmDelete()')) !!} 
                                <a href="kas/{{$ka->id_kas}}/edit " class="btn btn-warning btn-sm"><i class="fa fa-fw fa-edit fa-lg"></i></a>

                              <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i></button>
                        {!! Form::close() !!}
                    </td>
                  </tr>
                  <?php $no++;?>
                  @endforeach
                </tbody>
              </table>
            </div><!-- /.box-body -->
          </div><!-- /.box primary-->
    </div><!-- /.container -->
@endsection
