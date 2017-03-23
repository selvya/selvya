@extends('layout.master')
@section('css')

@endsection
@section('content')
<style type="text/css">
    .table thead > tr > th, .table tbody > tr > th, .table tfoot > tr > th, .table thead > tr > td, .table tbody > tr > td, .table tfoot > tr > td, .table tbody + tbody, .table-bordered, .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td{
        border:none;
    }
    .form-bordered .form-group{
        padding: 10px 15px!important;
    }
    .red{background: #e74c3c;}
    .red > a{color: #fff;}
    .red > a:hover{background: #e74c3c!important;}
    .hijau{background: #1abc9c!important;}
    .hijau >a{color: #fff;}
    .hijau >a:hover{background: #1abc9c!important;}

    /*.redd{background: #e74c3c;}*/
    .redd > a{color: #e74c3c;}
    /*.redd > a:hover{background: #e74c3c!important;}*/
    /*.hijauu{background: #1abc9c!important;}*/
    .hijauu >a{color: #1abc9c!important;}
    /*.hijauu >a:hover{background: #1abc9c!important;}*/
</style>

@php
    $triwulan = cekCurrentTriwulan();
    $rep = \App\ReportAssessment::where('tahun', date('Y'))
        ->where('triwulan', cekCurrentTriwulan()['current']->triwulan)
        ->where('daftarindikator_id', 1)
        ->where('user_id', getSatker())
        ->first();
    if (count($rep) > 0) {
        $rep = \Carbon\Carbon::parse($rep->updated_at);
    }else{
        $rep = null;
    }
@endphp


<div id="page-content">
    <!-- Wizard Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="fa fa-magic"></i>
                Edit Self Assessment
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{url('/')}}">Beranda</a></li>
        <li><a href="{{url('lembar-self-assessment')}}">Self Assessment</a></li>
        <li>Edit Self Assessment</li>
    </ul>
    <!-- END Wizard Header -->
    
    <!-- Wizards Row -->
    <div class="row">
        <div class="col-md-12">
            <!-- Wizard with Validation Block -->
            <div class="block">

                
                    <!-- Wizard with Validation Title -->
                    <div class="block-title">
                        <h2><strong>Form</strong></h2>
                    </div>
                    <!-- END Wizard with Validation Title -->
        
                    <!-- Wizard with Validation Content -->
                    <form action="{{url('proses/programbudaya')}}" method="POST" class="form-horizontal form-bordered">
                        <!-- First Step -->
                        @include('include.alert')
                        <div id="clickable-first" class="step">

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <ul class="nav nav-pills nav-justified clickable-steps">
                                        @php
                                        $belumFinal = false;
                                        $bbbb = \App\ReportAssessment::where('tahun', date('Y'))
                                                  ->where('triwulan',cekCurrentTriwulan()['current']->triwulan)
                                                  ->where('user_id', getSatker())
                                                  ->where('daftarindikator_id','3')
                                                 
                                                  ->first();

                                        if (count($bbbb) > 0) {
                                            $belumFinal = true;
                                        }
                                    @endphp
                                    
                                    @if(($inovatif != null ) || ($melayani != null) || ($peduli != null))
                                    <li class="@if(!$belumFinal) red @else hijau @endif">
                                        <a href="{{url('edit-self-assessment/'.$reportall->last()->hashid.'/programbudaya')}}" data-gotostep="clickable-first">
                                            <strong>Pelaksanaan Program Budaya <br> 
                                                <big>{{$reportall->last()->hasil}}%</big> <big>[{{$persen->nilai}}%]</big>
                                            </strong>
                                        </a>
                                    </li>
                                    @endif

                                        @if($anggaran != null)

                                            @php
                                                $agg = \App\AnggaranTahun::where('tahun', date('Y'))
                                                    ->where('user_id', getSatker())
                                                    ->first()
                                                    ->anggaran_triwulan
                                                    ->where('triwulan', cekCurrentTriwulan()['current']->triwulan)
                                                    ->first();

                                                    if ($agg->file != null) {
                                                        $atasWizard = (hitungNilaiSerapan(date('Y'), cekCurrentTriwulan()['current']->triwulan, Auth::user()->id) / 6) * cekPersenSerapan(date('Y'), 2, cekCurrentTriwulan()['current']->triwulan)->nilai;
                                                    
                                                    }else{
                                                        $atasWizard = 0;
                                                    }

                                            @endphp

                                            <li class="@if($atasWizard == 0) redd @else hijauu @endif">
                                                <a href="{{url('edit-self-assessment/'.Request::segment(2).'/serapan-anggaran')}}" data-gotostep="clickable-second"><strong>
                                                    Serapan Anggaran <br> <big>{{$atasWizard}}% [{{$anggaran->nilai}}%]</big></strong>
                                                </a>
                                            </li>
                                        @endif

                                        @if($pimpinan != null)
                                            @php
                                                $nilaiPim = cekNilaiPimpinan(date('Y'), cekCurrentTriwulan()['current']->triwulan, getSatker());
                                                $pimF = false;
                                                $pimpinanFFF = \App\ReportAssessment::where('tahun', date('Y'))
                                                      ->where('triwulan', cekCurrentTriwulan()['current']->triwulan)
                                                      ->where('user_id', getSatker())
                                                      ->where('daftarindikator_id','4')
                                      ->where('nilai','>','0')
                                                      ->first();
                                                if (count($pimpinanFFF)) {
                                                    $pimF = true;
                                                }
                                            @endphp

                                            <li class="@if(!$pimF) redd @else hijauu @endif">
                                                <a href="{{url('edit-self-assessment/'.Request::segment(2).'/partisipasi-pimpinan')}}" data-gotostep="clickable-third">                                    
                                                    <strong>Partisipan Pimpinan <br> <big>{{$nilaiPim}}% [{{$pimpinan->nilai}}%]</big></strong>
                                                </a>
                                            </li>
                                        @endif

                                        @if($pelaporan != null)
                                            <li class="@if(( ((int) cekSimpanPelaporan($rep)) / 6) * cekPersenLaporan(date('Y'), 1, cekCurrentTriwulan()['current']->triwulan)->nilai == 0) redd @else hijauu @endif">
                                                <a href="{{url('edit-self-assessment/'.Request::segment(2).'/kecepatan-pelaporan')}}" data-gotostep="clickable-fourth">
                                                    <strong>Kecepatan Pelaporan <br> <big>{{ ( ((int) cekSimpanPelaporan($rep)) / 6) * cekPersenLaporan(date('Y'), 1, cekCurrentTriwulan()['current']->triwulan)->nilai}}% [{{$pelaporan->nilai}}%]</big></strong>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>

                            <br>

                            <!-- ACCORDION -->
                            <div class="container" style="max-width: 1000px; overflow: hidden;"> <?php $reportidnya = DB::table('report_assesment')->where('daftarindikator_id','3')->where('user_id',Auth::user()->id)->where('triwulan', $triwulan['current']['triwulan'])->where('tahun',date('Y'))->value('id'); ?>
                            <!-- OJK MELAYANI -->
                            <div class="block">
                                <div class="block-title">
                                    <div class="block-options pull-right">

                                        @if($reportall !=  null)
                                            <label class="label label-success">{{$reportall->last()->hasil_melayani}} %</label>
                                        @endif

                                        <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-content">
                                            <i class="fa fa-arrows-v"></i>
                                        </a>
                                    </div>
                                    <h2><strong>OJK MELAYANI</strong></h2>
                                </div>

                                <div class="block-content">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Nama Program </label>
                                        <div class="col-md-9">
                                            <h4>Ojk Melayani</h4>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Deskripsi</label>
                                        <div class="col-md-9">
                                            <h4>{{$melayani->keterangan}}</h4>
                                        </div>
                                    </div>

                                    @if(count($alatmelayani) > 0)

                                @foreach($alatmelayani as $k => $v)
                                    @php
                                        $nama[$k] = collect(explode('#', $v->name));

                                    @endphp
                                    <!-- MYSTERY CALL -->
                                    <div class="">
                                        <h5><b>{{title_case(str_replace('_', ' ', $nama[$k]->last()))}}</b></h5>

                                        @if($v->tipe == 'manual')
                                            <!-- MANUAL -->
                                            @php 

                                                $definisi_manual_melayani = \App\DefinisiNilai::where('alatukur_id',$v->id)->where('iku_id',$v->iku_id)->where('triwulan', $triwulan['current']['triwulan'])->first();
                                            @endphp

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Nilai <span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <input type="number" name="nilai_manual_melayani[]" min="0" max="6" step="0.01" class="numberbox form-control" pattern="[0-9]+([\.,][0-9]+)?"  value="<?php echo DB::table('selfassesment')->where('alatukur_id',$v->id)->where('user_id',Auth::user()->id)->where('iku_id',$v->iku_id)->where('triwulan', $triwulan['current']['triwulan'])->where('definisinilai_id',$definisi_manual_melayani->id)->where('tahun',date('Y'))->where('reportassesment_id',$reportidnya)->value('skala_nilai'); ?>"   title="Nilai yang dimasukan antara 0-6 dengan 2 angka di belakang desimal." required>
                                                    <input type="hidden" name="alatukur_id_melayani_manual[]" value="{{$v->id}}">
                                                    <input type="hidden" name="iku_id_melayani_manual[]" value="{{$v->iku_id}}">
                                                    <input type="hidden" name="def_id_melayani_manual[]" value="{{$definisi_manual_melayani->id}}">
                                                </div>
                                            </div>
                                            <!-- TUTUP MANUAL -->

                                        @elseif($v->tipe == 'parameterized')

                                            @php 
                                                $definisi = \App\DefinisiNilai::where('alatukur_id',$v->id)->where('triwulan', $triwulan['current']['triwulan'])->orderBy('skala_nilai','DESC')->get();
												$nilaiygdiinput = DB::table('selfassesment')->where('alatukur_id',$v->id)->where('user_id',Auth::user()->id)->where('iku_id',$v->iku_id)->where('triwulan', $triwulan['current']['triwulan'])->where('tahun',date('Y'))->value('skala_nilai');
                                            @endphp
                                            <!-- PARAMETERIZE -->
                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Masukan Nilai <span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <select class="form-control" name="alatukur_melayani[]">
                                                        @foreach($definisi as $c => $data )
                                                        <option value="{{$v->iku_id}}#{{$v->id}}#{{$data->id}}#{{($data->skala_nilai)}}" @if($nilaiygdiinput == $data->skala_nilai) selected @endif>{{($data->skala_nilai)}} - {{$data->deskripsi}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- TUTUP PARAMETERIZE -->
                                        @endif
                                    </div><!-- CLOSE MYSTERY CALL -->
                                @endforeach
                            @else
                                Tidak ada Alat Ukur
                            @endif

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Lampiran Berkas <span class="text-danger">*</span></label>
                                    <div class="col-md-9"><?php
								$lampiran = DB::table('selfassesment')->where('user_id',Auth::user()->id)->where('iku_id',$v->iku_id)->where('triwulan', $triwulan['current']['triwulan'])->where('tahun',date('Y'))->first();
                                ?>
                                        <input type="file" name="file_melayani" class="form-control" @if(count($lampiran) > 0)
								@if($lampiran->filelampiran !== '') @else required @endif @endif>
										@if(count($lampiran) > 0) <a href="" class="label label-info">{{$lampiran->filelampiran}} </a>@endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Kontak Stakeholder <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <table class="table"><?php $stakelayan = 0;?>@if(count($lampiran) > 0)<?php 
								$stakeholder = DB::table('stakeholder')->where('user_id',Auth::user()->id)->where('selfassesment_id',$lampiran->id)->get();
								$stakelayan = count($stakeholder);
                                ?>@foreach($stakeholder as $holder)
								  <tr id="fieldz{{$holder->id}}">
                                            <td>
                                                <input type="text"readonly class="form-control" value="{{$holder->nama}}">
                                            </td>
                                            <td><input type="email" readonly class="form-control" value="{{$holder->email}}"></td>
                                            <td><input type="text" readonly class="form-control" value="{{$holder->instansi}}"></td>
                                            <td><input type="text" readonly class="form-control" value='{{$holder->no_hp}}'></td>
                                            <td><a onclick="kurang_OM($holder->id)" data-toggle="tooltip" title="Hapus Stakeholder" class="btn btn-danger"><i class="fa fa-minus"></i></a>
											<!-- belum dibuat function --></td>
                                        </tr>
								
								@endforeach @endif
								<?php if(cekCurrentTriwulan()['current']->triwulan == 1){$faktorlayan = 2;}else{$faktorpeduli = 10;}
									while($stakelayan < $faktorlayan){ $stakelayan++; ?>
                                            <tr id="field<?php if($stakelayan == $faktorlayan){?>1<?php }?>">
                                                <td>
                                                    <input type="text" name="nama_stake_melayani[]" class="form-control" placeholder="Nama" required>
                                                </td>
                                                <td><input type="email" name="email_stake_melayani[]" class="form-control" placeholder="Email"></td>
                                                <td><input type="text" name="instansi_stake_melayani[]" class="form-control" placeholder="Instansi" required></td>
                                                <td><input type="text" name="telp_stake_melayani[]" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" title="Masukan nomer handphone" placeholder="No Telp" required></td>
                                                <td><?php if($stakelayan == $faktorlayan){?><a onclick="tambah_MC()" data-toggle="tooltip" title="Tambah Stakeholder" class="btn btn-success"><i class="fa fa-plus"></i></a>
										<?php } ?></td>
                                            </tr>
									<?php }?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- OJK MELAYANI -->


                        <!-- OJK PEDULI -->
                        <div class="block">
                            <div class="block-title">
                                <div class="block-options pull-right">
                                    @if($reportall !=  null)
                                    <label class="label label-success">{{$reportall->last()->hasil_peduli}} %</label>
                                    @endif
                                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-content">
                                        <i class="fa fa-arrows-v"></i>
                                    </a>
                                </div>
                                <h2><strong>OJK PEDULI</strong></h2>
                            </div><?php // menampilkan program
						$sasa =  DB::table('selfassesment')->where('reportassesment_id',$reportidnya)->where('user_id',Auth::user()->id)->where('triwulan', $triwulan['current']['triwulan'])->where('tahun',date('Y'))->where('namaprogram','!=','')->first();?>
                            <div class="block-content">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nama Program </label>
                                    <div class="col-md-9">
                                        <!-- <h4>Ojk Peduli</h4> -->
                                        <input type="text" name="peduli_program" class="form-control" @if(count($sasa) > 0) value="{{$sasa->namaprogram}}" @endif  placeholder="Nama Program" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Deskripsi</label>
                                    <div class="col-md-9">
                                        <!-- <h4>{{$peduli->keterangan}}</h4> -->
                                        <input type="text" name="deskripsi_program" placeholder="Deskripsi Program" @if(count($sasa) > 0)  value="{{$sasa->deskripsi}}" @endif class="form-control">
                                    </div>
                                </div>

                                @if(count($alatpeduli) > 0)

                                @foreach($alatpeduli as $k => $v)
                                <?php
                                $nama[$k] = collect(explode('#', $v->name));

                                ?>

                                <div class="">
                                    <h5><b>{{title_case(str_replace('_', ' ', $nama[$k]->last()))}}</b></h5>


                                    @if($v->tipe == 'manual')
                                    <!-- MANUAL -->
                                    <?php $definisi_manual_peduli = \App\DefinisiNilai::where('alatukur_id',$v->id)->where('iku_id',$v->iku_id)->where('triwulan', $triwulan['current']['triwulan'])->first();?>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Nilai <span class="text-danger">*</span></label>
                                        <div class="col-md-9">
                                            <input type="number" name="nilai_manual_peduli[]" value="<?php echo DB::table('selfassesment')->where('alatukur_id',$v->id)->where('user_id',Auth::user()->id)->where('iku_id',$v->iku_id)->where('triwulan', $triwulan['current']['triwulan'])->where('definisinilai_id',$definisi_manual_peduli->id)->where('reportassesment_id',$reportidnya)->where('tahun',date('Y'))->value('skala_nilai'); ?>" min="0" max="6" step="0.01" class="numberbox form-control" pattern="[0-9]+([\.,][0-9]+)?"    title="Nilai yang dimasukan antara 0-6 dengan 2 angka di belakang desimal." required>
                                            <input type="hidden" name="alatukur_id_peduli_manual[]" value="{{$v->id}}">
                                            <input type="hidden" name="iku_id_peduli_manual[]" value="{{$v->iku_id}}"> 
                                            <input type="hidden" name="def_peduli_manual[]" value="{{$definisi_manual_peduli->id}}"> 
                                        </div>
                                    </div>
                                    <!-- TUTUP MANUAL -->
                                    @else
                                    <?php 
                                    $definisi = \App\DefinisiNilai::where('iku_id', $v->iku_id)->where('alatukur_id',$v->id)->where('triwulan', $triwulan['current']['triwulan'])->orderBy('skala_nilai','DESC')->get();
									$nilaiygdiinput = DB::table('selfassesment')->where('alatukur_id',$v->id)->where('user_id',Auth::user()->id)->where('iku_id',$v->iku_id)->where('triwulan', $triwulan['current']['triwulan'])->where('tahun',date('Y'))->value('skala_nilai');
                                    ?>
                                    <!-- PARAMETERIZE -->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Masukan Nilai <span class="text-danger">*</span></label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="alatukur_peduli[]">
                                                @foreach($definisi as $b => $data)
                                                <option value="{{$v->iku_id}}#{{$v->id}}#{{$data->id}}#{{($data->skala_nilai)}}"@if($nilaiygdiinput == $data->skala_nilai) selected @endif>{{($data->skala_nilai)}} - {{$data->deskripsi}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- TUTUP PARAMETERIZE -->
                                    @endif
                                </div>
                                @endforeach
                                @else
                                KOSONG
                                @endif

 <div class="form-group">
                                <label class="col-md-3 control-label">Lampiran Berkas <span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                  <?php
								$lampiran = DB::table('selfassesment')->where('user_id',Auth::user()->id)->where('iku_id',$v->iku_id)->where('triwulan', $triwulan['current']['triwulan'])->where('tahun',date('Y'))->first();
                                 ?>  <input type="file" name="file_peduli" class="form-control" 
								@if(count($lampiran) > 0)
									@if($lampiran->filelampiran !== '') @else required @endif
								@endif> @if(count($lampiran) > 0)<a href="" class="label label-info">{{$lampiran->filelampiran}}</a>@endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Kontak Stakeholder <span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <table class="table"><?php $stakepedul = 0;?>@if(count($lampiran) > 0)
								<?php 
								$stakeholder = DB::table('stakeholder')->where('user_id',Auth::user()->id)->where('selfassesment_id',$lampiran->id)->get();
								$stakepedul = count($stakeholder);
                                ?>@foreach($stakeholder as $holder)
								  <tr id="fieldz{{$holder->id}}">
                                            <td>
                                                <input type="text"readonly class="form-control" value="{{$holder->nama}}">
                                            </td>
                                            <td><input type="email" readonly class="form-control" value="{{$holder->email}}"></td>
                                            <td><input type="text" readonly class="form-control" value="{{$holder->instansi}}"></td>
                                            <td><input type="text" readonly class="form-control" value='{{$holder->no_hp}}'></td>
                                            <td><a onclick="kurang_OP($holder->id)" data-toggle="tooltip" title="Hapus Stakeholder" class="btn btn-danger"><i class="fa fa-minus"></i></a>
											<!-- belum dibuat function --></td>
                                        </tr>
								
								@endforeach
								@endif
								<?php  if(cekCurrentTriwulan()['current']->triwulan == 1){$faktorpeduli = 2;}else{$faktorpeduli = 3;}
									while($stakepedul < $faktorpeduli){ $stakepedul++; ?>
                                            <tr id="field<?php if($stakepedul == $faktorpeduli){?>3<?php }?>">
                                            <td>
                                                <input type="text" name="nama_stake_peduli[]" class="form-control" placeholder="Nama" required>
                                            </td>
                                            <td><input type="email" name="email_stake_peduli[]" class="form-control" placeholder="Email"></td>
                                            <td><input type="text" name="instansi_stake_peduli[]" class="form-control" placeholder="Instansi" required></td>
                                            <td><input type="text" name="telp_stake_peduli[]" class="form-control" title="Masukan nomer handphone" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" placeholder="No Telp" required></td>
                                            <td><?php if($stakepedul == $faktorpeduli){?><a onclick="tambah_OP()" data-toggle="tooltip" title="Tambah Stakeholder" class="btn btn-success"><i class="fa fa-plus"></i></a><?php }?></td>
                                        </tr><?php }?>
                                    </table>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- CLOSE OJK PEDULI -->

                        <!-- OJK INOVATIF -->
                        <div class="block">
                            <div class="block-title">
                                <div class="block-options pull-right">
                                    @if($reportall !=  null)
                                    <label class="label label-success">{{$reportall->last()->hasil_inovatif}} %</label>
                                    @endif
                                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-content">
                                        <i class="fa fa-arrows-v"></i>
                                    </a>
                                </div>
                                <h2><strong>OJK INOVATIF</strong></h2>
                            </div>
                            <div class="block-content">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nama Program </label>
                                    <div class="col-md-9">
                                        <h4>{{$inovatif->namaprogram}}</h4>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Deskripsi</label>
                                    <div class="col-md-9">
                                        <h4>{{$inovatif->keterangan}}</h4>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Latarbelakang </label>
                                    <div class="col-md-9">
                                        <h4>{{$inovatif->latarbelakang}}</h4>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Sasaran </label>
                                    <div class="col-md-9">
                                        <h4>{{$inovatif->sasaran}}</h4>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tahapan </label>
                                    <div class="col-md-9">
                                        <h4>{{$inovatif->tahapan}}</h4>
                                    </div>
                                </div>


                                @if(count($alatino) > 0)

                                @foreach($alatino as $k => $v)
                                <?php
                                $nama[$k] = collect(explode('#', $v->name));

                                ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nama alat ukur {{$k+1}}</label>
                                    <div class="col-md-9">
                                        <h4>{{$v->name}}</h4>
                                    </div>
                                </div>

                                <div class="">
                                    @if($v->tipe == 'iku')
                                    @if($inovatif->tipe == 'parameterized')
                                    <?php                                       

                                    $definisi = \App\DefinisiNilai::where('alatukur_id',$v->id)->where('triwulan', $triwulan['current']['triwulan'])->orderBy('skala_nilai','DESC')->get();

								$nilaiygdiinput = DB::table('selfassesment')->where('alatukur_id',$v->id)->where('user_id',Auth::user()->id)->where('iku_id',$v->iku_id)->where('triwulan', $triwulan['current']['triwulan'])->where('tahun',date('Y'))->value('skala_nilai');
                                
                                    ?>
                                    <!-- PARAMETERIZE -->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Masukan Nilai <span class="text-danger">*</span></label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="alatukur_inovatif[]">
                                                @foreach($definisi as $data)
                                                <option value="{{$v->iku_id}}#{{$v->id}}#{{$data->id}}#{{$data->skala_nilai}}" @if($nilaiygdiinput == $data->skala_nilai) selected @endif>{{$data->skala_nilai}} - {{$data->deskripsi}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- TUTUP PARAMETERIZE -->
                                    @endif
                                    @endif
                                </div>
                                @endforeach
                                @else
                                Belum ada OJK Inovatif
                                @endif

 <div class="form-group">
                                <label class="col-md-3 control-label">Lampiran Berkas <span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                   <?php
								$lampiran = DB::table('selfassesment')->where('user_id',Auth::user()->id)->where('iku_id',$v->iku_id)->where('triwulan', $triwulan['current']['triwulan'])->where('tahun',date('Y'))->first();
                                ?> <input type="file" name="file_inovatif" class="form-control"@if(count($lampiran) > 0) @if($lampiran->filelampiran !== '') @else required @endif
								@endif>
								@if(count($lampiran) > 0)<a href="" class="label label-info">{{$lampiran->filelampiran}}</a> @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Kontak Stakeholder</label>
                                <div class="col-md-9">
                                    <table class="table">@if(count($lampiran) > 0)
								<?php 
								$stakeholder = DB::table('stakeholder')->where('user_id',Auth::user()->id)->where('selfassesment_id',$lampiran->id)->get();
								
                                ?>@foreach($stakeholder as $holder)
								  <tr id="fieldz{{$holder->id}}">
                                            <td>
                                                <input type="text"readonly class="form-control" value="{{$holder->nama}}">
                                            </td>
                                            <td><input type="email" readonly class="form-control" value="{{$holder->email}}"></td>
                                            <td><input type="text" readonly class="form-control" value="{{$holder->instansi}}"></td>
                                            <td><input type="text" readonly class="form-control" value='{{$holder->no_hp}}'></td>
                                            <td><a onclick="kurang_OI($holder->id)" data-toggle="tooltip" title="Hapus Stakeholder" class="btn btn-danger"><i class="fa fa-minus"></i></a>
											<!-- belum dibuat function --></td>
                                        </tr>
								
								@endforeach
								@endif
                                        <tr id="field4">
                                            <td><input type="text" name="nama_stake_inovatif[]" class="form-control" placeholder="Nama" ></td>
                                            <td><input type="email" name="email_stake_inovatif[]" class="form-control" placeholder="Email" ></td>
                                            <td><input type="text" name="instansi_stake_inovatif[]" class="form-control" placeholder="Instansi" ></td>
                                            <td><input type="text" name="telp_stake_inovatif[]" title="Masukan nomer handphone" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" placeholder="No Telp"></td>
                                            <td><a onclick="tambah_INO()" data-toggle="tooltip" title="Tambah Stakeholder" class="btn btn-success"><i class="fa fa-plus"></i></a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- CLOSE OJK INOVATIF -->
                    </div>
                    <!-- CLOSE CONTAINER -->
                </div>
                <!-- END First Step -->

                <!-- Form Buttons -->
                <div class="form-group form-actions">
                    <div class="col-md-8 col-md-offset-6">
                        {{csrf_field()}}
                        <input type="hidden" name="report_id" value="{{Request::segment(2)}}">
                        
                        <button name="simpan" class="btn btn-lg btn-primary" value="0" id="next2" @if($reportall->last()->hasil >  0) onclick="return confirm('Apa anda yakin ingin menyimpan data ini ? data yang sebelumnya akan di update dengan data yg anda masukan saat ini');" @endif>
                            Simpan    
                        </button>

                    </div>
                </div>
                <!-- END Form Buttons -->
            </form>

        <!-- END Wizard with Validation Content -->
    </div>
    <!-- END Wizard with Validation Block -->
</div>
</div>
<!-- END Wizards Row -->    
</div>
@endsection
@section('js')
<script src="{{asset('vendor/js/pages/formsWizard.js')}}"></script>
<script>$(function(){ FormsWizard.init(); });</script>
<script type="text/javascript">

    function tambah_MC(){
        $('<tr id="baru">'+
            '<td style="text-align:center;">'+
            '<input type="text" name="nama_stake_melayani[]" placeholder="Nama" class="form-control">'+
            '</td>'+
            '<td>'+
            '<input type="email" name="email_stake_melayani[]" placeholder="Email" class="form-control" >'+
            '<td>'+
            '<input type="text" name="instansi_stake_melayani[]" placeholder="Instansi" class="form-control" >'+
            '</td>'+
            '<td>'+
            '<input type="text" name="telp_stake_melayani[]" placeholder="No Telp" title="Masukan nomer handphone"onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" class="form-control" >'+
            '</td>'+
            '<td>'+
            '<a data-toggle="tooltip" title="Hapus Field" class="remove_field btn btn-danger"><i class="fa fa-trash-o"></i></a>'+
            '</td>'+
            '</tr>').insertAfter('#field1');
        $(".remove_field").click(function(){
            $(this).closest("tr").remove();
        });
    }

    function tambah_OP(){
        $('<tr id="baru">'+
            '<td style="text-align:center;">'+
            '<input type="text" name="nama_stake_peduli[]" placeholder="Nama" class="form-control" >'+
            '</td>'+
            '<td>'+
            '<input type="email" name="email_stake_peduli[]" placeholder="Email" class="form-control" >'+
            '<td>'+
            '<input type="text" name="instansi_stake_peduli[]" placeholder="Instansi" class="form-control" >'+
            '</td>'+
            '<td>'+
            '<input type="text" name="telp_stake_peduli[]" title="Masukan nomer handphone" placeholder="No Telp" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" class="form-control" >'+
            '</td>'+
            '<td>'+
            '<a data-toggle="tooltip" title="Hapus Field" class="remove_field btn btn-danger"><i class="fa fa-trash-o"></i></a>'+
            '</td>'+
            '</tr>').insertAfter('#field3');
        $(".remove_field").click(function(){
            $(this).closest("tr").remove();
        });
    }

    function tambah_INO(){
        $('<tr id="baru">'+
            '<td style="text-align:center;">'+
            '<input type="text" name="nama_stake_inovatif[]" placeholder="Nama" class="form-control">'+
            '</td>'+
            '<td>'+
            '<input type="email" name="email_stake_inovatif[]" placeholder="Email" class="form-control">'+
            '<td>'+
            '<input type="text" name="instansi_stake_inovatif[]" placeholder="Instansi" class="form-control">'+
            '</td>'+
            '<td>'+
            '<input type="text" name="telp_stake_inovatif[]" placeholder="No Telp" title="Masukan nomer handphone" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" class="form-control">'+
            '</td>'+
            '<td>'+
            '<a data-toggle="tooltip" title="Hapus Field" class="remove_field btn btn-danger"><i class="fa fa-trash-o"></i></a>'+
            '</td>'+
            '</tr>').insertAfter('#field4');
        $(".remove_field").click(function(){
            $(this).closest("tr").remove();
        });
    }
    $('.numberbox').keyup(function(){
      if ($(this).val() > 6){
        alert("Maksimum nilai yang dimasukan adalah 6");
        $(this).val('6');
    }else if ($(this).val() < 0){
        alert("Minimum nilai yang dimasukan adalah 0");
        $(this).val('0');
    }  
});$('input.numberbox').blur(function(){
    var num = parseFloat($(this).val());
    var cleanNum = num.toFixed(2);
    $(this).val(cleanNum);
    if(num/cleanNum < 1){
        $('#error').text('Please enter only 2 decimal places, we have truncated extra points');
    }
});									 <?php 
									   if (count($bbbb) > 0) {
                                            if($bbbb->final_status){ ?>
												$(".form-bordered :input").attr("disabled", true);
												$('.form-bordered [type=submit],button#next2,.form-bordered [type=file]').hide();
												$('.table a').hide();
												$('.table a.btn.btn-danger.btn-block').show();
											<?php  }
                                        }
										?>
</script>
@endsection