@extends('layouts.dashboard')
@section('navbar')
    
    <li><a href="/admin" >Dashboard</a></li>
    <li><a href="/warga" >Data warga</a></li>
    <li><a href="/rapat" >Jadwal</a></li>
    <li><a href="/kas" >Kas</a></li>
    <li><a href="/himbauan" class="active" >Himbauan</a></li>
    <li><a href="/surat">Surat</a></li>

@endsection
@section('header')
    
    <h2>Himbauan untuk <strong> Warga</strong></h2>

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
              {{ link_to_route('himbauan.create','Buat himbauan warga',null,['class'=>'btn btn-default btn-lg']) }}
            </div>
            <div class="col-md-4">
              <a href="{{ URL::to('deleteAllHimb') }}" class="btn btn-danger" onclick="ConfirmDelete()"> Hapus semua data</a>
              <!-- Trigger the modal with a button -->
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Import data</button>

              <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        Import Data Himbauan
                      </div>
                      <form action="postImportHimb" method="post" enctype="multipart/form-data">
                      <div class="modal-body">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="file" name="himbauan">
                      </div>
                      <div class="modal-footer">
                        <input type="submit" class="btn btn-default" value="Import">
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              <a href="{{ URL::to('getExportHimb') }}" class="btn btn-info"> Export data</a>
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
                        <th>Nama himbauan</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Catatan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <?php $no=1;?>
                    <tbody>
                    @foreach ($himbauans as $value => $himbauan)
                      <tr>
                        <td>{{ $no }}</td>
                        <td>{{ link_to_route('himbauan.show',$himbauan->nm_himbauan,[$himbauan->id_himbauan]) }}</td>
                        <td>{{ $himbauan->tanggal }}</td>
                        <td>{{ $himbauan->jam }}</td>
                        <?php $stringCut = substr($himbauan->catatan, 0,50); ?>
                        <td>{{ $stringCut }}</td>
                        <td align="center">{!! Form::open(array('route'=>['himbauan.destroy',$himbauan->id_himbauan],'method'=>'DELETE','onsubmit' => 'return ConfirmDelete()')) !!} 
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i></button>
                            {!! Form::close() !!}
                        </td>
                      </tr>
                      <?php $no++ ; ?>
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box primary-->
          </div><!-- /.col 12 -->
        </div><!-- /.row -->
    </div><!-- /.content -->
@endsection
