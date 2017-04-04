@extends('layout.master')
@section('content')
<style>
    .melayani,.peduli,.inovatif{display: none;}
</style>
<div id="page-content">
    <!-- Wizard Header -->
    <div class="content-header content-media">
        <div class="header-section">
            <div class="jumbotron" >
                <div class="col-md-12">
                    <h1>Salam <b>Perubahan</b></h1>
                    <h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Tambah Budaya Internal</h4>
                </div>
            </div>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{url('/')}}">Beranda</a></li>
        <li><a href="{{url('budaya-internal')}}">Budaya Internal</a></li>
        <li>Tambah Budaya Internal</li>
    </ul>
    <!-- END Wizard Header -->

    <!-- Wizards Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="block-title">
                    <h2><strong>Satker</strong></h2>
                </div>
                <div class="container" style="max-width:100%">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Deputi Komisioner</label>
                        <div class="col-md-10">
                            <h4>{{$satker->nm_deputi_komisioner}}</h4>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">KOJK</label>
                        <div class="col-md-10">
                            <h4>{{$satker->nm_deputi_direktur}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="block">
                <div class="block-title">
                    <h2><strong>Form </strong></h2>
                </div>
                <div class="container" style="max-width:100%">

                    @include('include.alert')
                    <?php 
                    $nama = collect(explode('#', $iku->namaprogram));
                    $isinya =  \App\SelfAssesment::where('tahun',date('Y'))->where('triwulan',$triwulan['current']['triwulan'])->where('iku_id',$iku->id)->where('user_id',$satker->id)->first();
                    ?>
                    <form action="{{url('proses-internal/'.$satker->id)}}" method="POST" onchange="change()">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Nama Program</label>
                            <div class="col-md-10">
                                <input type="text" name="namaprogram" class="form-control" placeholder="{{title_case(str_replace('_',' ',$nama->first()))}}" value="@if(!empty($isinya)) {{$isinya->namaprogram}} @endif">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Deskripsi Program</label>
                            <div class="col-md-10">
                                <textarea name="des_program" cols="30" rows="10" class="form-control" placeholder="{{$iku->keterangan}}">@if(!empty($isinya)) {{$isinya->deskripsi}} @endif</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Nilai <span class="text-danger">*</span></label>
                            <div class="col-md-10">
                                @if(!empty($isinya))
                                <input type="number" name="nilai" min="0" step="0.01" max="6" class="form-control numberbox" value="{{$isinya->skala_nilai}}">
                                @else
                                <input type="number" name="nilai" min="0" step="0.01" max="6" class="form-control numberbox">
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Stakeholder <span class="text-danger">*</span></label>
                            <div class="col-md-10">
                                <select name="stake" class="form-control" id="pilih">
                                    <option value="0">-- Pilih Program Budaya --</option>
                                    <option value="1">OJK Inovatif</option>
                                    <option value="2">OJK Melayani</option>
                                    <option value="3">OJK Peduli</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10 col-lg-offset-2" style="padding: 0px;">
                            <style>
                                .table tbody > tr > td{border: none;}
                            </style>
                                <table class="table">
                                    <!-- INOVATIF -->
                                    <tr class="inovatif">
                                        <td colspan="4"><h4><b>OJK INOVATIF</b></h4></td>
                                    </tr>
                                    @foreach($self_ino as $data_self_ino)
                                        <?php 
                                            $stake_ino = \App\StakeHolder::where('selfassesment_id', $data_self_ino->id)->where('user_id', $satker->id)->get(); 
                                        ?>
                                        @foreach($stake_ino as $data_stake_ino)
                                            <tr class="inovatif">
                                                <td><input type="text" class="form-control" disabled value="{{$data_stake_ino->nama}}"></td>
                                                <td><input type="text" class="form-control" disabled value="{{$data_stake_ino->email}}"></td>
                                                <td><input type="text" class="form-control" disabled value="{{$data_stake_ino->instansi}}"></td>
                                                <td><input type="text" class="form-control" disabled value="{{$data_stake_ino->no_hp}}"></td>
                                            </tr>
                                        @endforeach
                                    @endforeach

                                    <!-- MELAYANI -->
                                    <tr class="melayani">
                                        <td colspan="4"><h4><b>OJK MELAYANI</b></h4></td>
                                    </tr>
                                    @foreach($self_mel as $data_self_mel)
                                        <?php 
                                            $stake_mel = \App\StakeHolder::where('selfassesment_id', $data_self_mel->id)->where('user_id', $satker->id)->get(); 
                                        ?>
                                        @foreach($stake_mel as $data_stake_mel)
                                        
                                            <tr class="melayani">
                                                <td><input type="text" class="form-control" disabled value="{{$data_stake_mel->nama}}"></td>
                                                <td><input type="text" class="form-control" disabled value="{{$data_stake_mel->email}}"></td>
                                                <td><input type="text" class="form-control" disabled value="{{$data_stake_mel->instansi}}"></td>
                                                <td><input type="text" class="form-control" disabled value="{{$data_stake_mel->no_hp}}"></td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                    
                                    <!-- PEDULI -->
                                    <tr class="peduli">
                                        <td colspan="4"><h4><b>OJK PEDULI</b></h4></td>
                                    </tr>
                                    @foreach($self_ped as $data_self_ped)
                                            <?php 
                                                $stake_ped = \App\StakeHolder::where('selfassesment_id', $data_self_ped->id)->where('user_id', $satker->id)->get(); 
                                            ?>
                                        @foreach($stake_ped as $data_stake_ped)
                                            <tr class="peduli">
                                                <td><input type="text" class="form-control" disabled value="{{$data_stake_ped->nama}}"></td>
                                                <td><input type="text" class="form-control" disabled value="{{$data_stake_ped->email}}"></td>
                                                <td><input type="text" class="form-control" disabled value="{{$data_stake_ped->instansi}}"></td>
                                                <td><input type="text" class="form-control" disabled value="{{$data_stake_ped->no_hp}}"></td>
                                            </tr>
                                        @endforeach
                                    @endforeach

                                </table>
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label class="col-md-2 col-form-label">File Lampiran <span class="text-danger">*</span></label>
                            <div class="col-md-10">
                                <input type="file" name="file" min="0" max="6" class="form-control">
                            </div>
                        </div> --}}
                        
                        <div class="form-group row">
                            <div class="col-md-12 text-center">
                                <a href="{{url('budaya-internal')}}" class="btn btn-default btn-lg"><i class="fa fa-arrow-left"></i> Kembali</a>
                                <button class="btn btn-primary btn-lg" type="submit" name="simpan" value="t"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END Wizards Row -->    
</div>
@endsection
@section('js')
<script>
 $(document).on('change', '#pilih', function(argument) {
        if ($('#pilih option:selected').val() == '1') {
           $('.melayani, .peduli').css('display','none');
           $('.inovatif').css('display','block');
        }else if($('#pilih option:selected').val() == '2') {
           $('.inovatif, .peduli').css('display','none');
           $('.melayani').css('display','block');
        }else if($('#pilih option:selected').val() == '3') {
           $('.inovatif, .melayani').css('display','none');
           $('.peduli').css('display','block');
        } else if($('#pilih option:selected').val() == '0') {
           $('.inovatif, .melayani,.peduli').css('display','none');
        } 
    })
</script>
@endsection