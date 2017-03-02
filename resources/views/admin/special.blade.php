@extends('layout.master')

@section('css')
@endsection

@section('content')
    <!-- Page content -->
    <div id="page-content">
        <!-- Datatables Header -->
        <div class="content-header">
            <div class="header-section">
                <h1>
                    <i class="fa fa-cogs"></i>
                    <b>Pengaturan</b>
                </h1>
            </div>
        </div>
        <ul class="breadcrumb breadcrumb-top">
            <li><a href="{{url('/')}}">Beranda</a></li>
            <li>Pengaturan Iku</li>
        </ul>
    
        <div class="block full">

            @if($jenis == 'OJK Melayani')
                <form class="form-horizontal" method="post" action="{{url('ikuOjkMelayani')}}">
                    <div class="form-group">
                        <label for="komponen_iku" class="control-label col-md-4">Komponen Iku</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" readonly id="komponen_iku" value="Program Budaya Spesifik: {{$jenis}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="periode" class="control-label col-md-4">Periode</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" readonly id="periode" value="Triwulan {{$triwulan}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="persen" class="control-label col-md-4">Persentase Nilai</label>
                        <div class="col-md-2">
                            <div class="input-group">
                                <input type="number" name="persen" class="form-control" min="0" step="1" max="100" value="{{$iku->persen}}" id="persen" required>
                                <span class="input-group-addon">%</span>                                
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input_tipe2" class="control-label col-md-4">Input Nilai</label>
                        <div class="col-md-8">
                            <div class="col-md-9" id="radioContainer">
                                <div class="radio">
                                    <label for="input_tipe2Edit">
                                        <input type="radio" id="input_tipe2Edit" name="input_tipe2Edit" checked value="otomatis"> Parameterize
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan" class="control-label col-md-4">Keterangan</label>
                        <div class="col-md-8">
                            <textarea name="keterangan" id="keterangan" class="form-control">{{$iku->keterangan}}</textarea>
                        </div>
                    </div>
                    
                    @php
                        $mc = array_values((array) $iku->indikator->where('type', 'mysteri_call'));
                        $sks = array_values((array) $iku->indikator->where('type', 'sks'));

                    @endphp
                    
                    {{-- @if($iku->indikator->where('type', 'mysteri_call')->count() > 0) --}}
                    @if(count($mc[0]) > 0)
                        <table class="table table-condensed table-bordered mtable" id="tabel-deskripsi">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox" name="mc" value="1" aria-label="..." id="mc" checked>
                                        </span>
                                        <input type="text" class="form-control" aria-label="..." value="Mysteri Call" readonly>
                                    </div><!-- /input-group -->
                                </div><!-- /.col-lg-6 -->
                            </div><!-- /.row -->
                            @for($i = 6; $i >= 1; $i--)
                                <tr>
                                    <th>Deskripsi Indikator {{$i}}</th>
                                    <td>
                                        {{-- <input type="text" name="mindikator_{{$i}}" id="mindikator_{{$i}}" class="form-control" value="{{$iku->indikator->where('type', 'mysteri_call')[$i-1]->deskripsi}}" required> --}}
                                        <input type="text" name="mindikator_{{$i}}" id="mindikator_{{$i}}" class="form-control" value="{{$mc[0][$i-1]->deskripsi}}" required>
                                    </td>
                                </tr>
                            @endfor
                            
                        </table>
                    @else
                        <table class="table table-condensed table-bordered mtable" id="tabel-deskripsi">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox" name="mc" value="1" aria-label="..." id="mc" checked>
                                        </span>
                                        <input type="text" class="form-control" aria-label="..." value="Mysteri Call" readonly>
                                    </div><!-- /input-group -->
                                </div><!-- /.col-lg-6 -->
                            </div><!-- /.row -->

                            <tr>
                                <th>Deskripsi Indikator 6</th>
                                <td>
                                    <input type="text" name="mindikator_6" id="mindikator_6" class="form-control" value="" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 5</th>
                                <td>
                                    <input type="text" name="mindikator_5" id="mindikator_5" class="form-control" value="" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 4</th>
                                <td>
                                    <input type="text" name="mindikator_4" id="mindikator_4" class="form-control" value="" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 3</th>
                                <td>
                                    <input type="text" name="mindikator_3" id="mindikator_3" class="form-control" value="" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 2</th>
                                <td>
                                    <input type="text" name="mindikator_2" id="mindikator_2" class="form-control" value="" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 1</th>
                                <td>
                                    <input type="text" name="mindikator_1" id="mindikator_1" class="form-control" value="" required>
                                </td>
                            </tr>
                        </table>
                    @endif

                    <br>
                    <br>
                    
                    {{-- @if($iku->indikator->where('type', 'sks')->count() > 0) --}}
                    @if(count($sks) > 0)
                        {{-- {{dd($iku->indikator->where('type', 'sks'))}} --}}
                        <table class="table table-condensed table-bordered stable" id="tabel-deskripsi">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox" name="sks" value="1" aria-label="..." id="sks" checked>
                                        </span>
                                        <input type="text" class="form-control" aria-label="..." value="Survei Kepuasan Stakeholder" readonly>
                                    </div><!-- /input-group -->
                                </div><!-- /.col-lg-6 -->
                            </div><!-- /.row -->
                            @for($i = 6; $i >=1 ; $i--)
                                <tr>
                                    <th>Deskripsi Indikator {{$i}}</th>
                                    <td>
                                        {{-- <input type="text" name="sindikator_{{$i}}" id="sindikator_{{$i}}" class="form-control" value="{{$iku->indikator->where('type', 'sks')[$i]->deskripsi}}" required> --}}
                                        <input type="text" name="sindikator_{{$i}}" id="sindikator_{{$i}}" class="form-control" value="{{$sks[0][$i-1]->deskripsi}}" required>
                                    </td>
                                </tr>
                            @endfor
                            
                        </table>
                    @else
                        <table class="table table-condensed table-bordered stable" id="tabel-deskripsi">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox" name="sks" value="1" id="sks" aria-label="..." checked>
                                        </span>
                                        <input type="text" class="form-control" aria-label="..." value="Survei Kepuasan Stakeholder" readonly>
                                    </div><!-- /input-group -->
                                </div><!-- /.col-lg-6 -->
                            </div><!-- /.row -->

                            <tr>
                                <th>Deskripsi Indikator 6</th>
                                <td>
                                    <input type="text" name="sindikator_6" id="sindikator_6" class="form-control" value="" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 5</th>
                                <td>
                                    <input type="text" name="sindikator_5" id="sindikator_5" class="form-control" value="" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 4</th>
                                <td>
                                    <input type="text" name="sindikator_4" id="sindikator_4" class="form-control" value="" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 3</th>
                                <td>
                                    <input type="text" name="sindikator_3" id="sindikator_3" class="form-control" value="" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 2</th>
                                <td>
                                    <input type="text" name="sindikator_2" id="sindikator_2" class="form-control" value="" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 1</th>
                                <td>
                                    <input type="text" name="sindikator_1" id="sindikator_1" class="form-control" value="" required>
                                </td>
                            </tr>
                        </table>

                    @endif
                    <div class="form-group">
                        <div class="col-md-4">
                            {{csrf_field()}}
                            <input type="hidden" name="hashid" id="hashid" value="{{$iku->hashid}}">
                        </div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-success pull-right" id="modal_simpan_baru">Simpan <i class="fa fa-save"></i></button>
                        </div>
                    </div>
                </form>
            @elseif($jenis == 'OJK Peduli')
                <form class="form-horizontal" method="post" action="{{url('ikuOjkPeduli')}}">
                    <div class="form-group">
                        <label for="komponen_iku" class="control-label col-md-4">Komponen Iku</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" readonly id="komponen_iku" value="Program Budaya Spesifik: {{$jenis}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="periode" class="control-label col-md-4">Periode</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" readonly id="periode" value="Triwulan {{$triwulan}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="persen" class="control-label col-md-4">Persentase Nilai</label>
                        <div class="col-md-2">
                            <div class="input-group">
                                <input type="number" name="persen" class="form-control" min="0" step="1" max="100" value="{{$iku->persen}}" id="persen" required>
                                <span class="input-group-addon">%</span>                                
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input_tipe2" class="control-label col-md-4">Input Nilai</label>
                        <div class="col-md-8">
                            <div class="col-md-9" id="radioContainer">
                                <div class="radio">
                                    <label for="input_tipe2Edit">
                                        <input type="radio" id="input_tipe2Edit" name="input_tipe2Edit" checked value="otomatis"> Parameterize
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan" class="control-label col-md-4">Keterangan</label>
                        <div class="col-md-8">
                            <textarea name="keterangan" id="keterangan" class="form-control">{{$iku->keterangan}}</textarea>
                        </div>
                    </div>
                    <hr id="hr">
                    <table class="table table-condensed table-bordered" id="tabel-deskripsi">
                        @if(count($iku->indikator) > 0)

                            @for($i = 6; $i >= 1; $i--) 
                                {{-- //$iku->indikator as $k => $v) --}}
                                <tr>
                                    <th>Deskripsi Indikator {{$i}}</th>
                                    <td>
                                        <input type="text" name="indikator_{{$i}}" id="indikator_{{$i}}" class="form-control" value="{{$iku->indikator[$i-1]->deskripsi}}" required>
                                    </td>
                                </tr>
                            @endfor
                        @else
                            <tr>
                                <th>Deskripsi Indikator 6</th>
                                <td>
                                    <input type="text" name="indikator_6" id="indikator_6" class="form-control" value="" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 5</th>
                                <td>
                                    <input type="text" name="indikator_5" id="indikator_5" class="form-control" value="" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 4</th>
                                <td>
                                    <input type="text" name="indikator_4" id="indikator_4" class="form-control" value="" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 3</th>
                                <td>
                                    <input type="text" name="indikator_3" id="indikator_3" class="form-control" value="" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 2</th>
                                <td>
                                    <input type="text" name="indikator_2" id="indikator_2" class="form-control" value="" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 1</th>
                                <td>
                                    <input type="text" name="indikator_1" id="indikator_1" class="form-control" value="" required>
                                </td>
                            </tr>
                        @endif
                    </table>
                    <div class="form-group">
                        <div class="col-md-4">
                            {{csrf_field()}}
                            <input type="hidden" name="hashid" id="hashid" value="{{$iku->hashid}}">
                        </div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-success pull-right" id="modal_simpan_baru">Simpan <i class="fa fa-save"></i></button>
                        </div>
                    </div>
                </form>
            @elseif($jenis == 3)
            @endif
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $('#sks').on('change', function() {
            if ($(this).is(':checked')) {
                $('[id^=sindikator_]').val('').prop('disabled', false);
            }else{
                $('[id^=sindikator_]').val('').prop('disabled', true);
            }
        });

        $('#mc').on('change', function() {
            if ($(this).is(':checked')) {
                $('[id^=mindikator_]').val('').prop('disabled', false);
            }else{
                $('[id^=mindikator_]').val('').prop('disabled', true);
            }
        });
    </script>
@endsection