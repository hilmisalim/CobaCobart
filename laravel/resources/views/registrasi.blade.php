@extends('layouts.aplikasi')

@section('header')
    
    <h2>Silahkan<strong>Mendaftar</strong></h2>

@endsection


@section('content')

    <!-- Contact Section
    ==========================================-->
    <div id="tf-contact" class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="section-title center">
                        <h2>Masukan data <strong>Sebenarnya</strong></h2>
                        <div class="line">
                            <hr>
                        </div>
                        <div class="clearfix"></div>
                        <small><em>Data yang didaftarkan harus data sebenarnya. Data registrasi ini akan <strong>secara otomatis terdaftar menjadi data default</strong> untuk data warga yang akan dimasukan nantinya</em></small>            
                    </div>
                    <div class="row">
                        <form class="form" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <em>Belum memiliki akun? Silahkan <a href ="{{ url('/register') }}">Daftar</a><br />
                            <a href="{{ url('/password/reset') }}">Lupa Password?</a></em>
                            <button type="submit" class="btn tf-btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection