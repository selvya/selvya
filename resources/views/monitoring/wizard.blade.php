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
        <li><a href="{{url('detail-monitoring').'/'.$satker->hashid.'?t='.Hashids::connection('tahun')->encode($t)}}&p={{Hashids::connection('triwulan')->encode($tw)}}">Detail Monitoring</a></li>
        <li>Tambah Monitoring</li>
    </ul>
    <!-- Clickable Wizard Block -->
    <div class="block">
        <!-- Clickable Wizard Title -->
        <div class="block-title">
            <h2><strong>Clickable</strong> Wizard</h2>
        </div>
        <!-- END Clickable Wizard Title -->

        <!-- Clickable Wizard Content -->
        <form id="clickable-wizard" action="{{url('proses-wizard').'/'.$satker->hashid.'?t='.Hashids::connection('tahun')->encode($t)}}&tw={{Hashids::connection('triwulan')->encode($tw)}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
        {{csrf_field()}}


            <!-- MELAYANI -->
            <div id="clickable-first" class="step">
                <!-- Step Info -->
                <div class="form-group">
                    <div class="col-xs-12">
                        <ul class="nav nav-pills nav-justified clickable-steps">
                            @if($melayani != null)
                            <li class="active"><a href="javascript:void(0)" data-gotostep="clickable-first"><strong>1. OJK Melyani</strong></a></li>
                            @endif
                            @if($peduli != null)
                            <li><a href="javascript:void(0)" data-gotostep="clickable-second"><strong>2. OJK Peduli</strong></a></li>
                            @endif
                            @if($inovatif != null)
                            <li><a href="javascript:void(0)" data-gotostep="clickable-third"><strong>3. OJK Inovatif</strong></a></li>
                            @endif
                            <li><a href="javascript:void(0)" data-gotostep="clickable-fourth"><strong>4. Peran Pimpnan</strong></a></li>
                        </ul>
                    </div>
                </div>
                <!-- END Step Info -->
                @php
                    $data_isi_mel = \App\SelfAssesment::where('user_id', Auth::user()->id)->where('tahun', $t)->where('triwulan', $tw)->where('iku_id',$melayani->id)->first();
                    $data_isi_ped = \App\SelfAssesment::where('user_id', Auth::user()->id)->where('tahun', $t)->where('triwulan', $tw)->where('iku_id',$peduli->id)->first();
                    $data_isi_ino = \App\SelfAssesment::where('user_id', Auth::user()->id)->where('tahun', $t)->where('triwulan', $tw)->where('iku_id',$inovatif->id)->first();
                    $data_isi_pim = \App\ReportAssessment::where('user_id', Auth::user()->id)->where('tahun', $t)->where('triwulan', $tw)->where('daftarindikator_id','4')->first();
                @endphp

                <div class="form-group">
                    <label class="col-md-2 control-label" for="example-clickable-username">Penjelasan</label>
                    <div class="col-md-10">
                        <textarea name="des_melayani" id="" class="form-control" cols="30" rows="10" placeholder="Jelaskan program budaya yang dilakukan, seberapa sering dilakukan, media kampanye yang digunakan, monitoring yang dilakukan, dan lainnya.">@if(!empty($data_isi_mel)) {{$data_isi_mel->deskripsi}} @endif</textarea>
                        <input type="hidden" name="iku_mel" value="{{$melayani->id}}">
                    </div>
                </div>

                @foreach($alatukur_melayani as $a => $data_alat_melayani)
                    @php 
                        $nama[$a] = collect(explode('#', $data_alat_melayani->name));
                        $nilaiygdiinput[$a] = DB::table('selfassesment')->where('alatukur_id',$data_alat_melayani->id)->where('user_id',Auth::user()->id)->where('iku_id',$melayani->id)->where('triwulan', $tw)->where('tahun',$t)->value('skala_nilai');
                    @endphp
                    <div class="form-group">
                        <label class="col-md-2 control-label">Alat Ukur</label>
                        <div class="col-md-10">
                            <h5><b>{{title_case(str_replace('_', ' ', $nama[$a]->last()))}}</b></h5>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="example-clickable-username">Nilai</label>
                        <div class="col-md-10">
                            <input type="number" name="nilai_melayani[]" class="form-control numberbox" step="0.01" min="0" max="6" value="{{$nilaiygdiinput[$a]}}">
                            <input type="hidden" name="alat_mel[]" value="{{$data_alat_melayani->id}}">
                            <small>Isi dengan index 0-6 (Cth: 4.50)</small>
                        </div>
                    </div>
                @endforeach
                <div class="form-group">
                    <label class="col-md-2 control-label" for="example-clickable-username">Lampiran</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control" name="file_melayani">
                        @if(!empty($data_isi_mel))
                            <a href="{{asset('attachment/lampiran_monitoring/'.$data_isi_mel->filelampiran)}}" class="btn btn-warning">{{$data_isi_mel->filelampiran}}</a><br>
                        @endif
                        <small>Data Lampiran (Ukuran Maksimal 20MB) (.pdf,.zip,.rar,.jpg,.jpeg,.png,.doc,.docx)  </small>
                    </div>
                </div>  
            </div>
            <!-- TUTUP MELAYANI -->

            <!-- Second Step -->
            <div id="clickable-second" class="step">
                <!-- Step Info -->
                <div class="form-group">
                    <div class="col-xs-12">
                        <ul class="nav nav-pills nav-justified clickable-steps">
                            <li><a href="javascript:void(0)" data-gotostep="clickable-first"><i class="fa fa-check"></i> <strong>1. OJK Melyani</strong></a></li>
                            <li class="active"><a href="javascript:void(0)" data-gotostep="clickable-second"><strong>2. OJK Peduli</strong></a></li>
                            <li><a href="javascript:void(0)" data-gotostep="clickable-third"><strong>3. OJK Inovatif</strong></a></li>
                            <li><a href="javascript:void(0)" data-gotostep="clickable-fourth"><strong>4. Peran Pimpnan</strong></a></li>
                        </ul>
                    </div>
                </div>
                <!-- END Step Info -->
                <div class="form-group">
                    <label class="col-md-2 control-label" for="example-clickable-username">Penjelasan</label>
                    <div class="col-md-10">
                        <textarea name="des_peduli" id="" class="form-control" cols="30" rows="10" placeholder="Jelaskan program budaya yang dilakukan, seberapa sering dilakukan, media kampanye yang digunakan, monitoring yang dilakukan, dan lainnya.">@if(!empty($data_isi_ped)) {{$data_isi_ped->deskripsi}} @endif</textarea>
                        <input type="hidden" name="iku_ped" value="{{$peduli->id}}">
                    </div>
                </div>

               @foreach($alatukur_peduli as $b => $data_alat_peduli)
                    @php 
                        $nama[$b] = collect(explode('#', $data_alat_peduli->name));
                        $nilaiygdiinput[$b] = DB::table('selfassesment')->where('alatukur_id',$data_alat_peduli->id)->where('user_id',Auth::user()->id)->where('iku_id',$peduli->id)->where('triwulan', $tw)->where('tahun',$t)->value('skala_nilai');
                    @endphp
                    <div class="form-group">
                        <label class="col-md-2 control-label">Alat Ukur</label>
                        <div class="col-md-10">
                            <h5><b>{{title_case(str_replace('_', ' ', $nama[$b]->last()))}}</b></h5>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="example-clickable-username">Nilai</label>
                        <div class="col-md-10">
                            @if(!empty($nilaiygdiinput[$b]))
                                <input type="number" name="nilai_peduli[]" class="form-control numberbox" step="0.01" min="0" max="6" value="{{$nilaiygdiinput[$b]}}">
                            @else
                                <input type="number" name="nilai_peduli[]" class="form-control numberbox" step="0.01" min="0" max="6">
                            @endif
                            <input type="hidden" name="alat_ped[]" value="{{$data_alat_peduli->id}}">
                            <small>Isi dengan index 0-6 (Cth: 4.50)</small>
                        </div>
                    </div>
                @endforeach

                <div class="form-group">
                    <label class="col-md-2 control-label" for="example-clickable-username">Lampiran</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control" name="file_peduli">
                        @if(!empty($data_isi_ped))  
                            <a href="{{url('attachment/lampiran_monitoring/'.$data_isi_ped->filelampiran)}}" class="btn btn-warning">{{$data_isi_ped->filelampiran}}</a> <br>
                        @endif
                        <small>Data Lampiran (Ukuran Maksimal 20MB) (.pdf,.zip,.rar,.jpg,.jpeg,.png,.doc,.docx)  </small>
                    </div>
                </div>
            </div>
            <!-- END Second Step -->

            <!-- Third Step -->
            <div id="clickable-third" class="step">
                <!-- Step Info -->
                <div class="form-group">
                    <div class="col-xs-12">
                        <ul class="nav nav-pills nav-justified clickable-steps">
                            <li><a href="javascript:void(0)" data-gotostep="clickable-first"><i class="fa fa-check"></i> <strong>1. OJK Melyani</strong></a></li>
                            <li><a href="javascript:void(0)" data-gotostep="clickable-second"><i class="fa fa-check"></i> <strong>2. OJK Peduli</strong></a></li>
                            <li class="active"><a href="javascript:void(0)" data-gotostep="clickable-third"><strong>3. OJK Inovatif</strong></a></li>
                            <li><a href="javascript:void(0)" data-gotostep="clickable-fourth"><strong>4. Peran Pimpnan</strong></a></li>
                        </ul>
                    </div>
                </div>
                <!-- END Step Info -->
                <div class="form-group">
                    <label class="col-md-2 control-label" for="example-clickable-username">Nama Program</label>
                    <div class="col-md-10">
                        <h4>{{$inovatif->namaprogram}}</h4>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="example-clickable-username">Deskripsi Program</label>
                    <div class="col-md-10">
                        <h4>{{$inovatif->keterangan}}</h4>
                        <input type="hidden" name="iku_ino" value="{{$inovatif->id}}">
                    </div>
                </div>

                @foreach($alatukur_inovatif as $c => $data_alat_inovatif)
                    @php 
                        $nama[$c] = collect(explode('#', $data_alat_inovatif->name));
                        $nilaiygdiinput[$c] = DB::table('selfassesment')->where('alatukur_id',$data_alat_inovatif->id)->where('user_id',Auth::user()->id)->where('iku_id',$inovatif->id)->where('triwulan', $tw)->where('tahun',$t)->value('skala_nilai');
                    @endphp
                    <div class="form-group">
                        <label class="col-md-2 control-label">Alat Ukur</label>
                        <div class="col-md-10">
                            <h5><b>{{title_case(str_replace('_', ' ', $nama[$c]->last()))}}</b></h5>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="example-clickable-username">Nilai</label>
                        <div class="col-md-10">
                        @if(!empty($nilaiygdiinput[$c]))
                            <input type="number" name="nilai_inovatif[]" class="form-control numberbox" step="0.01" min="0" max="6" value="{{$nilaiygdiinput[$c]}}">
                        @else
                            <input type="number" name="nilai_inovatif[]" class="form-control numberbox" step="0.01" min="0" max="6">
                        @endif                            
                            <input type="hidden" name="alat_ino[]" value="{{$data_alat_inovatif->id}}">
                            <small>Isi dengan index 0-6 (Cth: 4.50)</small>
                        </div>
                    </div>
                @endforeach

                <div class="form-group">
                    <label class="col-md-2 control-label" for="example-clickable-username">Lampiran</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control" name="file_inovatif">
                         @if(!empty($data_isi_ino))  
                            <a href="{{url('attachment/lampiran_monitoring/'.$data_isi_ino->filelampiran)}}" class="btn btn-warning">{{$data_isi_ino->filelampiran}}</a> <br>
                        @endif
                        <small>Data Lampiran (Ukuran Maksimal 20MB) (.pdf,.zip,.rar,.jpg,.jpeg,.png,.doc,.docx)  </small>
                    </div>
                </div>

            </div>
            <!-- END Third Step -->

            <!-- Third Step -->
            <div id="clickable-fourth" class="step">
                <!-- Step Info -->
                <div class="form-group">
                    <div class="col-xs-12">
                        <ul class="nav nav-pills nav-justified clickable-steps">
                            <li><a href="javascript:void(0)" data-gotostep="clickable-first"><i class="fa fa-check"></i> <strong>1. OJK Melyani</strong></a></li>
                            <li><a href="javascript:void(0)" data-gotostep="clickable-second"><i class="fa fa-check"></i> <strong>2. OJK Peduli</strong></a></li>
                            <li><a href="javascript:void(0)" data-gotostep="clickable-third"><i class="fa fa-check"></i> <strong>3. OJK Inovatif</strong></a></li>
                            <li class="active"><a href="javascript:void(0)" data-gotostep="clickable-fourth"><strong>4. Peran Pimpnan</strong></a></li>
                        </ul>
                    </div>
                </div>
                <!-- END Step Info -->

                <div class="form-group">
                    <label class="col-md-2 control-label" for="example-clickable-username">Penjelasan</label>
                    <div class="col-md-10">
                        <textarea name="des_pimpinan" id="" class="form-control" cols="30" rows="10" placeholder="Jelaskan program budaya yang dilakukan, seberapa sering dilakukan, media kampanye yang digunakan, monitoring yang dilakukan, dan lainnya.">@if(!empty($data_isi_pim)) {{$data_isi_pim->deskripsi}} @endif</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="example-clickable-username">Nilai</label>
                    <div class="col-md-10">
                        @if(!empty($data_isi_pim->nilai))
                            <input type="number" name="nilai_pimpinan" class="form-control numberbox" step="0.01" min="0" max="6" value="{{$data_isi_pim->nilai}}">
                        @else
                            <input type="number" name="nilai_pimpinan" class="form-control numberbox" step="0.01" min="0" max="6">
                        @endif
                        <small>Isi dengan index 0-6 (Cth: 4.50)</small>
                    </div>
                </div>
                
            </div>
            <!-- END Third Step -->

            <!-- Form Buttons -->
            <div class="form-group form-actions">
                <div class="col-md-8 col-md-offset-4">
                    <button type="reset" class="btn btn-lg btn-warning" id="back4"><i class="fa fa-arrow-left"></i> Kembali</button>
                    <button type="submit" class="btn btn-lg btn-success" id="next4"><i class="fa fa-save"></i> Simpan</button>
                    <button type="submit" class="btn btn-lg btn-info" id="next4">Selanjutnya <i class="fa fa-arrow-right"></i></button>
                </div>
            </div>
            <!-- END Form Buttons -->
        </form>
        <!-- END Clickable Wizard Content -->
    </div>
    <!-- END Clickable Wizard Block -->
    @endsection
    @section('js')
    <script src="{{asset('vendor/js/pages/formsWizard.js')}}"></script>
    <script>$(function(){ FormsWizard.init(); });</script>
    <script>
        $('.numberbox').keyup(function(){
        if($(this).val() > 6){
            alert("Maksimum nilai yang dimasukan adalah 6");
            $(this).val('6');
        }else if ($(this).val() < 0){
            alert("Minimum nilai yang dimasukan adalah 0");
            $(this).val('0');
        }  
    });
    </script>
    @endsection