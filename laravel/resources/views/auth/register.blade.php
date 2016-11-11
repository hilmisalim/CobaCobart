@extends('layouts.aplikasi')

@section('header')
    
    <h2>Silahkan <strong> Mendaftar</strong></h2>

@endsection


@section('content')

    <!-- Contact Section
    ==========================================-->
    <div id="tf-contact" class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="section-title center">
                        <h2>Masukan data <strong> Sebenarnya</strong></h2>
                        <div class="line">
                            <hr>
                        </div>
                        <div class="clearfix"></div>
                        <small><em>Data yang didaftarkan harus data sebenarnya. Data registrasi ini akan <strong>secara otomatis terdaftar menjadi data default</strong> untuk data warga yang akan dimasukan nantinya</em></small>           
                    </div>
                        <div class="row">
                           <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nama Lengkap</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('rw') ? ' has-error' : '' }}">
                                <label for="rt" class="col-md-4 control-label">RT</label>

                                <div class="col-md-6">
                                    <input id="rt" type="number" class="form-control" name="rt" value="{{ old('rt') }}" required autofocus>

                                    @if ($errors->has('rt'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('rt') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('rw') ? ' has-error' : '' }}">
                                <label for="rw" class="col-md-4 control-label">RW</label>

                                <div class="col-md-6">
                                    <input id="rw" type="number" class="form-control" name="rw" value="{{ old('rw') }}" required autofocus>

                                    @if ($errors->has('rw'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('rw') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('kelurahan') ? ' has-error' : '' }}">
                                <label for="kelurahan" class="col-md-4 control-label">Kelurahan</label>

                                <div class="col-md-6">
                                    <input id="kelurahan" type="text" class="form-control" name="kelurahan" value="{{ old('kelurahan') }}" required autofocus>

                                    @if ($errors->has('kelurahan'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('kelurahan') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('kecamatan') ? ' has-error' : '' }}">
                                <label for="kecamatan" class="col-md-4 control-label">Kecamatan</label>

                                <div class="col-md-6">
                                    <input id="kecamatan" type="text" class="form-control" name="kecamatan" value="{{ old('kecamatan') }}" required autofocus>

                                    @if ($errors->has('kecamatan'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('kecamatan') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('kota') ? ' has-error' : '' }}">
                                <label for="kota" class="col-md-4 control-label">Kota asal</label>

                                <div class="col-md-6">
                                    <input id="kota" type="text" class="form-control" name="kota" value="{{ old('kota') }}" required autofocus>

                                    @if ($errors->has('kota'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('kota') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('provinsi') ? ' has-error' : '' }}">
                                <label for="provinsi" class="col-md-4 control-label">Provinsi</label>

                                <div class="col-md-6">
                                    <input id="provinsi" type="text" class="form-control" name="provinsi" value="{{ old('provinsi') }}" required autofocus>

                                    @if ($errors->has('provinsi'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('provinsi') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('no_hp') ? ' has-error' : '' }}">
                                <label for="no_hp" class="col-md-4 control-label">No. Handphone</label>

                                <div class="col-md-6">
                                    <input id="no_hp" type="text" class="form-control" name="no_hp" value="{{ old('no_hp') }}" required autofocus>

                                    @if ($errors->has('no_hp'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('no_hp') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn tf-btn btn-default">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection