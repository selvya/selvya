@extends('layout.master')

@section('css')
@endsection

@section('content')

    <div id="page-content">
        <div class="content-header">
            <div class="header-section">
                <h1>
                    <i class="gi gi-imac"></i>
                    <b>Hirarki</b>
                </h1>
            </div>
        </div>
        <ul class="breadcrumb breadcrumb-top">
            <li><a href="{{url('/')}}">Beranda</a></li>
            <li>Hirarki</li>
        </ul>

        @if(Session::has('msg'))
            {!!Session('msg')!!}
        @endif

        <div class="block full">
            <form role="form" class="form-horizontal" method="POST" action="">
                <div class="form-group">
                    <label for="induk" class="control-label col-md-2">Induk</label>
                    <div class="col-md-4">
                        <select name="induk" class="form-control" required>
                            <option value="1">Kantor Pusat</option>
                            <option value="2">Kantor Cabang</option>
                            <option value="3">Kantor KOJK</option>
                            <option value="4">OJK-Wide</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="departemen" class="control-label col-md-2">Departemen</label>
                    <div class="col-md-4">
                        <select name="departemen" class="form-control" required>
                            <option>--PILIH DEPARTEMEN--</option>

                            @forelse($departemen as $k => $v)
                                <option value="{{$v->id}}">{{$v->departemen_name}}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="direktorat" class="control-label col-md-2">Direktorat</label>
                    <div class="col-md-4">
                        <select name="direktorat" class="form-control" required>
                            <option>--PILIH DIREKTORAT--</option>

                            @forelse($direktorat as $k => $v)
                                <option value="{{$v->id}}">{{$v->direktorat_name}}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="komisioner" class="control-label col-md-2">KOMINIONER</label>
                    <div class="col-md-4">
                        <select name="komisioner" class="form-control" required>
                            <option>--PILIH KOMINIONER--</option>

                            @forelse($komisioner as $k => $v)
                                <option value="{{$v->id}}">{{$v->komisioner_name}}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-2">
                        {{csrf_field()}}
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-success pull-right">Simpan <i class="fa fa-save"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
@endsection
