@extends('layouts.app')

@section('content')
<style type="text/css">
    .overlay{
        position: absolute;
        top: 0;
        display: block;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,.6);
    }
</style>
<div class="container" style="margin-top: 85px;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body" style="padding: 0;">
                    <div class="col-md-6">
                        <br>
                        <h3 class="text-center">
                            <img src="{{asset('img/logo2.png')}}" style="margin: 0px 10px;">
                        </h3>
                        <br>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('customlogin') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <div class="col-md-8 col-md-offset-2">
                                    <input id="username" type="text" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}" title="Masukan Username" required autofocus>

                                    @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="col-md-8 col-md-offset-2">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required title="Masukan Password">
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <button type="submit" style="width: 100%; padding: 8px; background: #00AAFF; color: #fff; border: none;">
                                    LOGIN
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 hidden-xs hidden-sm" style="background: url({{asset('img/Gedung-OJK.jpg')}})center center no-repeat; height: 400px; background-size: cover; padding: 0; overflow: hidden;">
                    <div class="overlay"></div>
                    <div style="color: #fff; z-index: 9999; position: relative; padding: 80px 0px;" class="text-center">
                        <h2><b>OJKWay Assesment</b></h2>
                        <h4><b>Otoritas Jasa Keuangan</b></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
