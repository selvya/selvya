@extends('layout.master')

@section('css')
    <style type="text/css">
        .shtct {
            width: 100%;
            margin-bottom: 20px;
        }
    </style>
@endsection


@section('content')
    
    <div class="modal fade" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="menuModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{-- <h4 class="modal-title" id="menuModal">Pilih Jenis Perjalanan Dinas</h4> --}}
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form method="post" action="" id="revisicp">
                                <button type="submit" class="btn btn-sm shtct btn-danger">
                                    <i class="fa fa-trash-o fa-2x"></i><br>Hapus Anggaran
                                </button>
                                <input type="hidden" name="satker_id" id="satker_id" value="">
                                <input type="hidden" name="t" id="t" value="{{Hashids::connection('tahun')->encode($t)}}">
                                {{csrf_field()}}
                            </form>
                        </div>
                        <div class="col-md-6">
                            <a href="" target="_blank" id="lihat" class="btn btn-sm shtct btn-success">
                                <i class="fa fa-eye fa-2x"></i><br>Lihat Hasil Self Assesment
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div id="page-content">
        <!-- Datatables Header -->
        <div class="content-header content-media">
            <div class="header-section">
                <div class="jumbotron" >
                    <div class="col-md-12">
                        <h1 >Salam <b>Perubahan</b></h1>
                        <h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Rekap Self Assessment</h4>
                    </div>
                </div>
            </div>
        </div>
        <ul class="breadcrumb breadcrumb-top">
            <li><a href="{{url('/')}}">Beranda</a></li>
            <li>Anggaran Budaya</li>
        </ul>
        <!-- END Datatables Header -->

        <!-- Datatables Content -->
        <div class="block full">
            <form method="get" enctype="multipart/form-data" action="">
                <div class="col-md-2">
                    <select name="tahun" class="form-control">
                        @for($i = date('Y'); $i >= date('Y') - 2; $i--)
                            <option value="{{$i}}" @if($t == $i) selected @endif>{{$i}}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-block">Lihat <i class="fa fa-eye"></i></button>
                </div>
            </form>

            <div class="col-md-12">
                <div class="btn btn-success">
                    <small>Sudah Memiliki</small>
                    <br>
                    {{$sudahMemiliki}}<br>
                </div>
                <div class="btn btn-warning">
                    <small>Belum Memiliki</small>
                    <br>
                    {{$belumMemiliki}}<br>
                </div>
            </div>
            <br><br>
            <br>
            <br>
            <br>
            <br>
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Deputi Komisioner</td>
                        <td>Departemen</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($satker as $k => $v)
                        <tr>
                            <td>{{$k+1}}</td>
                            <td>{{$v->nm_deputi_komisioner}}</td>
                            <td>{{$v->nm_departemen}}</td>
                            <td>
                                @php
                                    $anggaranTahun[$k] = \App\AnggaranTahun::where('tahun', $t)
                                                        ->where('total_anggaran', '>', 0)
                                                        ->where('user_id', $v->id)
                                                        ->count();
                                @endphp
                                @if($anggaranTahun[$k] > 0)
                                    <button class="btn btn-success btn-sm btn-block ck" data-id="{{$v->hashid}}" data-tahun="{{Hashids::connection('tahun')->encode($t)}}" type="button"><i class="fa fa-check-o"></i> Sudah Memiliki</button>
                                @else
                                    <button class="btn btn-danger btn-sm btn-block" disabled data-id="{{$v->hashid}}" data-tahun="{{Hashids::connection('tahun')->encode($t)}}" type="button"><i class="fa fa-times"></i> Belum Memiliki</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('vendor/js/pages/tablesDatatables.js')}}"></script>
    <script>$(function(){ TablesDatatables.init(); });</script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#myTable').DataTable();
        });

        $(document).on('click', '.ck', function() {
            var c = $(this).attr('data-id');
            var lr = '{{url('hapusAnggaran')}}';
            var ll = '{{url('lihatAnggaran')}}/' + c + '?t={{$t}}';


            $('#revisicp').prop('action', '').prop('action', lr);
            $('#satker_id').val(c);
            $('#lihat').prop('href', '').prop('href', ll);
            $('#menuModal').modal('show');
        });
    </script>
@endsection