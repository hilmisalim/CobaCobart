@extends('layouts.aplikasi')

@section('header')
    
    <h2>Silahkan <strong> Masuk</strong></h2>

@endsection

@section('content')

<div id="tf-contact" class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                        <div class="row">
                           <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

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

                            <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>

                            </div>
                            </div>

                        <div class="form-group">  
                        <div class="col-md-6 col-md-offset-4">                
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>

                                <button type="submit" class="btn tf-btn btn-default">
                                    Login
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
