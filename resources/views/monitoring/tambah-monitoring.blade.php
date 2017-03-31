

@extends('layout.master')
@section('content')
<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->
    <div class="content-header content-media">
        <div class="header-section">
            <div class="jumbotron" >
                <div class="col-md-12">
                    <h1>Salam <b>Perubahan</b></h1>
                    <h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Tambah Monitoring</h4>
                </div>
            </div>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{url('/')}}">Beranda</a></li>
        <li><a href="{{url('rekap-monitoring')}}">Rekap Monitoring</a></li>
        <li>Tambah Monitoring</li>
    </ul>
    <!-- END Datatables Header -->

    <!-- Datatables Content -->
    <div class="block full">
    @include('include.alert')
        <form role="form" method="post" enctype="multipart/form-data" action="{{url('proses-tambah-monitoring').'/'.$satker->hashid.'?t='.Hashids::connection('tahun')->encode($t)}}&tw={{Hashids::connection('triwulan')->encode($tw)}}">
        {{csrf_field()}}
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="disabledSelect">Nama Pengisi</label>
                        <input class="form-control" name="nama_pengisi" type="text" placeholder="Nama Pengisi" value="@if(!empty($cekmonitor->namapengisi)) {{$cekmonitor->namapengisi}} @endif">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="disabledSelect">Change Partner</label>
                        <input class="form-control" name="change_partner" type="text" value="@if(!empty($cekmonitor->change_partner)) {{$cekmonitor->change_partner}} @endif">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="disabledSelect">Tanggal Monitoring</label>
                        <input class="form-control" type="text" value="@if(!empty($cekmonitor->tanggal)) {{date('d/m/Y',strtotime($cekmonitor->tanggal))}} @else {{date('d/m/Y')}} @endif" readonly>
                    </div>
                    <div class="form-group">
                        <label for="disabledSelect">Deputi Komisioner</label>
                        <input class="form-control" name="departemen_name" type="text" value="{{$satker->deputi_kom}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="disabledSelect">Departemen/Kantor Regional</label>
                        <input class="form-control" name="satker_name" type="text" value="{{$satker->departemen}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="disabledSelect">Direktorat/KOJK</label>
                        <input class="form-control" name="direktorat_name" type="text" value="{{$satker->kojk}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="disabledSelect">Nama Pimpinan</label>
                        <input class="form-control" name="pimpinan" type="text" value="@if(!empty($cekmonitor->namapimpinan)) {{$cekmonitor->namapimpinan}} @endif">
                    </div>
                    <div class="form-group">
                        <label for="disabledSelect">Jabatan Pimpinan</label>
                        <input class="form-control" name="jabatan" type="text" value="@if(!empty($cekmonitor->jabatanpimpinan)) {{$cekmonitor->jabatanpimpinan}} @endif">
                    </div>
                    <div class="form-group">
                        <label for="disabledSelect">Jumlah Insan OJK</label>
                        <input class="form-control" name="jml" type="text" value="@if(!empty($cekmonitor->jml_insan)) {{$cekmonitor->jml_insan}} @endif">
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="{{url('detail-monitoring').'/'.$satker->hashid.'?t='.Hashids::connection('tahun')->encode($t)}}&p={{Hashids::connection('triwulan')->encode($tw)}}" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                <button type="submit" id="done" class="btn btn-success btn-lg"><i class="fa fa-save"></i> Simpan</button>
                <a href="{{url('wizard-monitoring').'/'.$satker->hashid.'?t='.Hashids::connection('tahun')->encode($t)}}&p={{Hashids::connection('triwulan')->encode($tw)}}" class="btn btn-lg btn-info"><i class="fa fa-arrow-right"></i> Selanjutnya</a>
            </div>
        </form>
    </div>
    <!-- END Datatables Content -->
</div>
<!-- END Page Content -->
<!-- END Page Content -->
@endsection
@section('js')
@endsection