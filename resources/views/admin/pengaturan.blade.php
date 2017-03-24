@extends('layout.master')

@section('css')
    <style type="text/css">
        .btn-special {
            width: 100%;
        }
    </style>
@endsection

@section('content')


    {{-- EDIT 1 --}}
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal1" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Indikator Pencapaian Kecepatan Laporan</h4>
                </div>
                <div class="modal-body">
                    <div class="text-center" id="loading1">
                        <i class="fa fa-cog fa-3x fa-spin"></i>
                        <br>
                        Memuat...
                    </div>
                    <form class="form-horizontal" id="modal-form1">
                        <div class="form-group">
                            <label for="komponen_iku1" class="control-label col-md-4">Komponen IKU</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="" value="Kecepatan Pelaporan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="periode1" class="control-label col-md-4">Periode</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="periode1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="persen1" class="control-label col-md-4">Persentase Nilai</label>
                            <div class="col-md-2">
                                <div class="input-group">
                                    <input type="number" name="persen1" id="persen1" class="form-control" min="0" step="1" max="100" value="0">
                                    <span class="input-group-addon">%</span>                        
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input_tipe1" class="control-label col-md-4">Input Nilai</label>
                            <div class="col-md-8">
                                <div class="col-md-9" id="radioContainer">
                                    <div class="radio">
                                        <label for="input_tipe1">
                                            <input type="radio" id="input_tipe1" name="input_tipe1" checked value="otomatis"> Parameterized
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan1" class="control-label col-md-4">Keterangan</label>
                            <div class="col-md-8">
                                <textarea name="keterangan1" id="keterangan1" class="form-control"></textarea>
                            </div>
                        </div>
                        <hr id="hr">
                        <table class="table table-condensed table-bordered" id="tabel-deskripsi">
                            <tr>
                                <th>Deskripsi Indikator 6</th>
                                <td>
                                    <div class="input-group col-md-6">
                                        <span class="input-group-addon">+</span>
                                        <input type="text" name="definisi1_6" id="definisi1_6" class="form-control" value="">
                                        <span class="input-group-addon">Hari dari batas</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 5</th>
                                <td>
                                    <div class="input-group col-md-6">
                                        <span class="input-group-addon">+</span>
                                        <input type="text" name="definisi1_5" id="definisi1_5" class="form-control" value="">
                                        <span class="input-group-addon">Hari dari batas</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 4</th>
                                <td>
                                    <div class="input-group col-md-6">
                                        <span class="input-group-addon">+</span>
                                        <input type="text" name="definisi1_4" id="definisi1_4" class="form-control" value="">
                                        <span class="input-group-addon">Hari dari batas</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 3</th>
                                <td>
                                    <div class="input-group col-md-6">
                                        <span class="input-group-addon">+</span>
                                        <input type="text" name="definisi1_3" id="definisi1_3" class="form-control" value="">
                                        <span class="input-group-addon">Hari dari batas</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 2</th>
                                <td>
                                    <div class="input-group col-md-6">
                                        <span class="input-group-addon">></span>
                                        <input type="text" name="definisi1_2" id="definisi1_2" class="form-control" value="">
                                        <span class="input-group-addon">Hari dari batas</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 1</th>
                                <td>
                                    <div class="input-group col-md-6">
                                        <span class="input-group-addon">!!!</span>
                                        <input type="text" name="definisi1_1" id="definisi1_1" class="form-control" placeholder="NA" value="">
                                        <span class="input-group-addon">Hari dari batas</span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div class="form-group">
                            <div class="col-md-4">
                                {{csrf_field()}}
                                <input type="hidden" name="sender_id1" id="sender_id1" value="">
                            </div>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-success pull-right" id="modal_simpan1">Simpan <i class="fa fa-save"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- EDIT 2 --}}
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal2" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Indikator Pencapaian Serapan Anggaran</h4>
                </div>
                <div class="modal-body">
                    <div class="text-center" id="loading2">
                        <i class="fa fa-cog fa-3x fa-spin"></i>
                        <br>
                        Memuat...
                    </div>
                    <form class="form-horizontal" id="modal-form2">
                        <div class="form-group">
                            <label for="komponen_iku2" class="control-label col-md-4">Komponen IKU</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="" value="Serapan Anggaran">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="periode2" class="control-label col-md-4">Periode</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="periode2">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="persen2" class="control-label col-md-4">Persentase Nilai</label>
                            <div class="col-md-2">
                                <div class="input-group">
                                    <input type="number" name="persen2" id="persen2" class="form-control" min="0" step="1" max="100" value="0">
                                    <span class="input-group-addon">%</span>                        
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input_tipe2" class="control-label col-md-4">Input Nilai</label>
                            <div class="col-md-8">
                                <div class="col-md-9" id="radioContainer">
                                    <div class="radio">
                                        <label for="input_tipe2">
                                            <input type="radio" id="input_tipe2" name="input_tipe2" checked value="otomatis"> Parameterized
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan2" class="control-label col-md-4">Keterangan</label>
                            <div class="col-md-8">
                                <textarea name="keterangan2" id="keterangan2" class="form-control"></textarea>
                            </div>
                        </div>
                        <hr id="hr">
                        <table class="table table-condensed table-bordered" id="tabel-deskripsi">
                            <tr>
                                <th>Deskripsi Indikator 6</th>
                                <td>
                                    <div class="col-md-6 input-group">
                                        <span class="input-group-addon">>=</span>
                                        <input type="text" name="definisi2_6" id="definisi2_6" class="form-control" value="">
                                        <span class="input-group-addon">%</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 5</th>
                                <td>
                                    <div class="col-md-6 input-group">
                                        <span class="input-group-addon">></span>
                                        <input type="text" name="definisi2_5" id="definisi2_5" class="form-control" value="">
                                        <span class="input-group-addon">%</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 4</th>
                                <td>
                                    <div class="col-md-6 input-group">
                                        <span class="input-group-addon">></span>
                                        <input type="text" name="definisi2_4" id="definisi2_4" class="form-control" value="">
                                        <span class="input-group-addon">%</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 3</th>
                                <td>
                                    <div class="col-md-6 input-group">
                                        <span class="input-group-addon">></span>
                                        <input type="text" name="definisi2_3" id="definisi2_3" class="form-control" value="">
                                        <span class="input-group-addon">%</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 2</th>
                                <td>
                                    <div class="col-md-6 input-group">
                                        <span class="input-group-addon"><=</span>
                                        <input type="text" name="definisi2_2" id="definisi2_2" class="form-control" value="">
                                        <span class="input-group-addon">%</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 1</th>
                                <td>
                                    <div class="col-md-6 input-group">
                                        <span class="input-group-addon">!!!</span>
                                        <input type="text" name="definisi2_1" id="definisi2_1" class="form-control" value="NA">
                                        <span class="input-group-addon">%</span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div class="form-group">
                            <div class="col-md-4">
                                {{csrf_field()}}
                                <input type="hidden" name="sender_id2" id="sender_id2" value="">
                            </div>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-success pull-right" id="modal_simpan2">Simpan <i class="fa fa-save"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- EDIT 3 --}}
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal3" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Indikator Pencapaian Pelaksanaan Program Budaya</h4>
                </div>
                <div class="modal-body">
                    <div class="text-center" id="loading3">
                        <i class="fa fa-cog fa-3x fa-spin"></i>
                        <br>
                        Memuat...
                    </div>
                    <form class="form-horizontal" id="modal-form3">
                        <div class="form-group">
                            <label for="komponen_iku3" class="control-label col-md-4">Komponen IKU</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="" value="Pelaksanaan Program Budaya">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="periode3" class="control-label col-md-4">Periode</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="periode3">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="persen3" class="control-label col-md-4">Persentase Nilai</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="number" name="persen3" id="persen3" class="form-control" min="0" step="1" max="100" value="0">
                                    <span class="input-group-addon">%</span>                        
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tipeprogram" class="control-label col-md-4">Jenis Program Budaya</label>
                            <div class="col-md-6">
                                <select name="jenis_program" id="jenis_program" class="form-control">
                                    <option value="1">OJK Melayani</option>
                                    <option value="2">OJK Peduli</option>
                                    <option value="3">OJK Inovatif</option>
                                </select>
                            </div>
                        </div>
                       {{--  <div class="form-group">
                            <label for="input_tipe3" class="control-label col-md-4">Input Nilai</label>
                            <div class="col-md-8">
                                <div class="col-md-9" id="radioContainer">
                                    <div class="radio">
                                        <label for="input_tipe3_1">
                                            <input type="radio" id="input_tipe3_1" name="input_tipe3" checked value="parameterized"> Parameterized
                                        </label>
                                        <br>
                                        <label for="input_tipe3_2">
                                            <input type="radio" id="input_tipe3_2" name="input_tipe3" value="otomatis"> Otomatis
                                        </label> 
                                         <br> 
                                        <label for="input_tipe3_3">
                                            <input type="radio" id="input_tipe3_3" name="input_tipe3" value="manual"> Manual
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>--}}
                         <input type="hidden" name="input_tipe3" value="otomatis">
                        <div class="form-group">
                            <label for="keterangan3" class="control-label col-md-4">Keterangan</label>
                            <div class="col-md-8">
                                <textarea name="keterangan3_1" id="keterangan3_1" class="form-control"></textarea>
                                <textarea name="keterangan3_2" id="keterangan3_2" class="form-control"></textarea>
                                <textarea name="keterangan3_3" id="keterangan3_3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div id="melayani_container">
                            <table class="table table-condensed table-bordered mtable" id="table_mc">
                                    <tr>
                                        <td colspan="2"><label><input type="checkbox" name="mc" value="1" aria-label="..." id="mc" style="width:36px;height:22px"> Mystery Call</label></td>
                                    </tr>
                                    <tr>
                                        <th>Tipe Nilai</th>
                                        <td>
                                           <label><input type="radio" id="input_tipe3_2_1_a" disabled name="input_tipe3_2_1" value="manual"> Manual</label>
                                           <label><input type="radio" id="input_tipe3_2_1_b" disabled name="input_tipe3_2_1" value="parameterized"> Parameterized</label>
                                        </td>
                                    </tr>
                                @for($i = 6; $i >= 1; $i--)
                                    <tr>
                                        <th>Deskripsi Indikator {{$i}}</th>
                                        <td>
                                            <input type="text" name="mindikator_{{$i}}" id="mindikator_{{$i}}" class="form-control" value="" required>
                                        </td>
                                    </tr>
                                @endfor
                            </table>
                            <table class="table table-condensed table-bordered skstable" id="table_sks">
                                <tr>
                                        <td colspan="2"><label><input type="checkbox" name="sks" value="1" aria-label="..." id="sks" style="width:36px;height:22px"> Survei Kepuasan Stakeholder</label></td>
                                    </tr><tr>
                                        <th>Tipe Nilai</th>
                                        <td>
                                           <label><input type="radio" id="input_tipe3_2_2_a" disabled name="input_tipe3_2_2" value="manual"> Manual</label>
                                           <label><input type="radio" id="input_tipe3_2_2_b"disabled name="input_tipe3_2_2" value="parameterized"> Parameterized</label>
                                        </td>
                                    </tr>
                                @for($i = 6; $i >= 1; $i--)
                                    <tr>
                                        <th>Deskripsi Indikator {{$i}}</th>
                                        <td>
                                            <input type="text" name="sindikator_{{$i}}" id="sindikator_{{$i}}" class="form-control" value="" required>
                                        </td>
                                    </tr>
                                @endfor
                            </table>
                        </div>
                        <div id="peduli_container">
                            <table class="table table-condensed table-bordered kuantitastable" id="table_kuantitas">
                                    <tr> 
                                        <td colspan="2">
                                            <label>
                                                <input type="checkbox" name="kuantitas" value="1" aria-label="..." id="kuantitas"  style="width:36px;height:22px">
                                                 Kuantitas (Frekuensi & Partisipasi)
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tipe Nilai</th>
                                        <td>
                                           <label><input type="radio" id="input_tipe3_1_1_a" disabled name="input_tipe3_1_1" value="manual"> Manual</label>
                                           <label><input type="radio" id="input_tipe3_1_1_b"disabled name="input_tipe3_1_1" value="parameterized"> Parameterized</label>
                                        </td>
                                    </tr>
                                @for($i = 6; $i >= 1; $i--)
                                    <tr>
                                        <th>Deskripsi Indikator {{$i}}</th>
                                        <td>
                                            <input type="text" name="kuantitasindikator_{{$i}}" id="kuantitasindikator_{{$i}}" class="form-control" value="" required>
                                        </td>
                                    </tr>
                                @endfor
                            </table>
                            <table class="table table-condensed table-bordered kualitastable" id="table_kualitas">
                                <tr>
                                        <td colspan="2"><label><input type="checkbox" name="kualitas" value="1" aria-label="..." id="kualitas" style="width:36px;height:22px"> Kualitas (Survey)</label></td>
                                    </tr><tr>
                                        <th>Tipe Nilai</th>
                                        <td>
                                           <label><input type="radio" id="input_tipe3_1_2_a" disabled name="input_tipe3_1_2" value="manual"> Manual</label>
                                           <label><input type="radio" id="input_tipe3_1_2_b"disabled name="input_tipe3_1_2" value="parameterized"> Parameterized</label>
                                        </td>
                                    </tr>
                                @for($i = 6; $i >= 1; $i--)
                                    <tr>
                                        <th>Deskripsi Indikator {{$i}}</th>
                                        <td>
                                            <input type="text" name="kualitasindikator_{{$i}}" id="kualitasindikator_{{$i}}" class="form-control" value="" required>
                                        </td>
                                    </tr>
                                @endfor
                            </table>
                        </div>
                        <div id="inovatif_container">
                            
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                                {{csrf_field()}}
                                <input type="hidden" name="sender_id3" id="sender_id3" value="">

                            </div>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-success pull-right" id="modal_simpan3_1">Simpan <i class="fa fa-save"></i></button>
                                <button type="button" class="btn btn-success pull-right" id="modal_simpan3_2">Simpan <i class="fa fa-save"></i></button>
                                <button type="button" class="btn btn-success pull-right" id="modal_simpan3_3">Simpan <i class="fa fa-save"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- EDIT 4 --}}
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal4" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Indikator Pencapaian Partisipasi Pimpinan</h4>
                </div>
                <div class="modal-body">
                    <div class="text-center" id="loading4">
                        <i class="fa fa-cog fa-3x fa-spin"></i>
                        <br>
                        Memuat...
                    </div>
                    <form class="form-horizontal" id="modal-form4">
                        <div class="form-group">
                            <label for="komponen_iku4" class="control-label col-md-4">Komponen IKU</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="" value="Partisipasi Pimpinan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="periode4" class="control-label col-md-4">Periode</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="periode4">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="persen4" class="control-label col-md-4">Persentase Nilai</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="number" name="persen4" id="persen4" class="form-control" min="0" step="1" max="100" value="0">
                                    <span class="input-group-addon">%</span>                        
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input_tipe4" class="control-label col-md-4">Input Nilai</label>
                            <div class="col-md-8">
                                <div class="col-md-9" id="radioContainer">
                                    <div class="radio">
                                        <label for="input_tipe4">
                                            <input type="radio" id="input_tipe4_parameterized" name="input_tipe4" checked value="parameterized"> Parameterized
                                        </label>
                                        <label for="input_tipe4">
                                            <input type="radio" id="input_tipe4_manual" name="input_tipe4" checked value="manual"> Manual
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan4" class="control-label col-md-4">Keterangan</label>
                            <div class="col-md-8">
                                <textarea name="keterangan4" id="keterangan4" class="form-control"></textarea>
                            </div>
                        </div>
                        <hr id="hr">
                        <table class="table table-condensed table-bordered" id="tabel-deskripsi">
                            <tr>
                                <th>Deskripsi Indikator 6</th>
                                <td>
                                    <input type="text" name="definisi4_6" id="definisi4_6" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 5</th>
                                <td>
                                    <input type="text" name="definisi4_5" id="definisi4_5" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 4</th>
                                <td>
                                    <input type="text" name="definisi4_4" id="definisi4_4" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 3</th>
                                <td>
                                    <input type="text" name="definisi4_3" id="definisi4_3" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 2</th>
                                <td>
                                    <input type="text" name="definisi4_2" id="definisi4_2" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 1</th>
                                <td>
                                    <input type="text" name="definisi4_1" id="definisi4_1" class="form-control" value="">
                                </td>
                            </tr>
                        </table>
                        <div class="form-group">
                            <div class="col-md-4">
                                {{csrf_field()}}
                                <input type="hidden" name="sender_id4" id="sender_id4" value="">
                            </div>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-success pull-right" id="modal_simpan4">Simpan <i class="fa fa-save"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- EDIT 5 --}}
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal5" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Indikator Pencapaian Lomba Kreasi Kreatif</h4>
                </div>
                <div class="modal-body">
                    <div class="text-center" id="loading5">
                        <i class="fa fa-cog fa-3x fa-spin"></i>
                        <br>
                        Memuat...
                    </div>
                    <form class="form-horizontal" id="modal-form5">
                        <div class="form-group">
                            <label for="komponen_iku5" class="control-label col-md-4">Komponen IKU</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="" value="Lomba Kreasi Kreatif">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="periode5" class="control-label col-md-4">Periode</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="periode5">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="persen5" class="control-label col-md-4">Persentase Nilai</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="number" name="persen5" id="persen5" class="form-control" min="0" step="1" max="100" value="0">
                                    <span class="input-group-addon">%</span>                        
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input_tipe5" class="control-label col-md-4">Input Nilai</label>
                            <div class="col-md-8">
                                <div class="col-md-9" id="radioContainer">
                                    <div class="radio">
                                        <label for="input_tipe5">
                                            <input type="radio" id="input_tipe5" name="input_tipe5" checked value="manual"> Manual
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan5" class="control-label col-md-4">Keterangan</label>
                            <div class="col-md-8">
                                <textarea name="keterangan5" id="keterangan5" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                                {{csrf_field()}}
                                <input type="hidden" name="sender_id5" id="sender_id5" value="">
                            </div>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-success pull-right" id="modal_simpan5">Simpan <i class="fa fa-save"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- EDIT 6 --}}
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal6" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Indikator Pencapaian Survei Budaya Internal</h4>
                </div>
                <div class="modal-body">
                    <div class="text-center" id="loading6">
                        <i class="fa fa-cog fa-3x fa-spin"></i>
                        <br>
                        Memuat...
                    </div>
                    <form class="form-horizontal" id="modal-form6">
                        <div class="form-group">
                            <label for="komponen_iku6" class="control-label col-md-4">Komponen Iku</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="" value="Survei Budaya Internal">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="periode6" class="control-label col-md-4">Periode</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="periode6">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="persen6" class="control-label col-md-4">Persentase Nilai</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="number" name="persen6" id="persen6" class="form-control" min="0" step="1" max="100" value="0">
                                    <span class="input-group-addon">%</span>                        
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input_tipe6" class="control-label col-md-4">Input Nilai</label>
                            <div class="col-md-8">
                                <div class="col-md-9" id="radioContainer">
                                    <div class="radio">
                                        <label for="input_tipe6">
                                            <input type="radio" id="input_tipe6" name="input_tipe6" checked value="manual"> Manual
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan6" class="control-label col-md-4">Keterangan</label>
                            <div class="col-md-8">
                                <textarea name="keterangan6" id="keterangan6" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                                {{csrf_field()}}
                                <input type="hidden" name="sender_id6" id="sender_id6" value="">
                            </div>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-success pull-right" id="modal_simpan6">Simpan <i class="fa fa-save"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- EDIT 7 --}}
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal7" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Indikator Pencapaian Survei Budaya Eksternal</h4>
                </div>
                <div class="modal-body">
                    <div class="text-center" id="loading7">
                        <i class="fa fa-cog fa-3x fa-spin"></i>
                        <br>
                        Memuat...
                    </div>
                    <form class="form-horizontal" id="modal-form7">
                        <div class="form-group">
                            <label for="komponen_iku7" class="control-label col-md-4">Komponen IKU</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="" value="Survei Budaya Eksternal">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="periode7" class="control-label col-md-4">Periode</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="periode7">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="persen7" class="control-label col-md-4">Persentase Nilai</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="number" name="persen7" id="persen7" class="form-control" min="0" step="1" max="100" value="0">
                                    <span class="input-group-addon">%</span>                        
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input_tipe7" class="control-label col-md-4">Input Nilai</label>
                            <div class="col-md-8">
                                <div class="col-md-9" id="radioContainer">
                                    <div class="radio">
                                        <label for="input_tipe7">
                                            <input type="radio" id="input_tipe7" name="input_tipe7" checked value="manual"> Manual
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan7" class="control-label col-md-4">Keterangan</label>
                            <div class="col-md-8">
                                <textarea name="keterangan7" id="keterangan7" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                                {{csrf_field()}}
                                <input type="hidden" name="sender_id7" id="sender_id7" value="">
                            </div>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-success pull-right" id="modal_simpan7">Simpan <i class="fa fa-save"></i></button>
                            </div>
                        </div>
                    </form>
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
                    <h1 style="text-transform: uppercase">Salam <b>Perubahan</b></h1>
                    <h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Parameter Program</h4>
                </div>
            </div>
        </div>
    </div>
        <ul class="breadcrumb breadcrumb-top">
            <li><a href="{{url('/')}}">Beranda</a></li>
            <li>Pengaturan</li>
        </ul>

        <div class="block full">
            <form method="get" action="" class="form-inline">
                <div class="form-group">
                    <label for="tahun" class="control-label">Tahun</label>
                    <select name="tahun" class="form-control">
                        @for($i = date('Y'); $i >= date('Y') - 3; $i--)
                            <option value="{{$i}}" @if(null != request('tahun') AND request('tahun') == $i) selected @endif>{{$i}}</option>
                        @endfor
                    </select>
                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                </div>
            </form>
            <table class="table table-condensed table-hover table-stripped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Triwulan I</th>
                        <th>Triwulan II</th>
                        <th>Triwulan III</th>
                        <th>Triwulan IV</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($daftarIndikator as $k => $v)
                        {{-- {{dd($v->persentase[0])}} --}}
                        <tr>
                            <td>
                                <strong>{{$v->name}}</strong>
                            </td>

                            @for($i = 0; $i <= 3; $i++)
                                <td>
                                    <input 
                                        type="text"
                                        name="tw1"
                                        id="i{{$v->id}}_{{$i}}" 
                                        class="form-control kol"
                                        data-id="{{$v->persentase[$i]->hashid}}"
                                        data-triwulan="{{$i}}"
                                        data-component="{{$v->id}}"
                                        data-component-nama="{{$v->name}}"
                                        value="{{$v->persentase[$i]->nilai}} %"

                                        {{-- @if($v->id == 3) --}}
                                            {{-- data-html="true" --}}
                                            {{-- data-toggle="popover" --}}
                                           {{--  data-placement="left"
                                            data-content='
                                                <a  href="{{url('special/tahun') . '/' . $tahun . '/triwulan/' . ($i+1) . '/jenis/1'}}"
                                                    class="btn btn-primary ojk-melayani btn-special"
                                                    id="b{{$v->id}}_{{$i}}"
                                                    data-triwulan="{{$i}}"
                                                    data-component="{{$v->id}}"
                                                >OJK Melayani</a><br>
                                                <a  href="{{url('special/tahun') . '/' . $tahun . '/triwulan/' . ($i+1) . '/jenis/2'}}"
                                                    class="btn btn-warning ojk-peduli btn-special"
                                                    id="b{{$v->id}}_{{$i}}"
                                                    data-triwulan="{{$i}}"
                                                    data-component="{{$v->id}}"
                                                >OJK Peduli</buabr>
                                                <a  href="{{url('special/tahun') . '/' . $tahun . '/triwulan/' . ($i+1) . '/jenis/3'}}"
                                                    class="btn btn-danger ojk-inovatif btn-special"
                                                    id="b{{$v->id}}_{{$i}}"
                                                    data-triwulan="{{$i}}"
                                                    data-component="{{$v->id}}"
                                                >OJK Inovatif</a>' --}}
                                        {{-- @endif --}}
                                        readonly
                                    >
                                </td>
                            @endfor
                        </tr>
                    @empty
                        Belum ada IKU
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        
        $(document).ready(function(){
            $('[id^=loading]').hide();
            $('#inovatif_container').hide().find(':input').prop('disabled', true);
            // $('#peduli_container').hide().find(':input').prop('disabled', true);
            $('#modal_simpan3_2, #modal_simpan3_3').hide();
        });

        $('.kol').on('click', function(){
            $("[data-toggle=popover]").popover('hide');
            let t = $(this);

            if (t.attr('data-component') == 1) {
                $.ajax({
                    url: '{{url('persentase/detail/')}}/' + t.attr('data-id'),
                    type: 'GET',
                    dataType: 'JSON',
                    beforeSend: function() {
                        $('#periode1').val('').val('Triwulan ' + t.attr('data-triwulan'));
                        $('#persen1').val('').val(0);
                        $('#sender_id1').val('').val(t.attr('id'));
                        $('#keterangan1').val('').prop('readonly', false);
                        $('#modal_triwulan1').val('').val((parseInt(t.attr('data-triwulan')) + 1));
                        $('[id^=definisi1_]').val('').prop('readonly', false);

                        $('#modal-form1').hide();
                        $('#loading1').show();
                    },
                    success: function(response) {
                        if (response.status) {
                            $('#periode1').val('').val('Triwulan ' + (parseInt(t.attr('data-triwulan')) + 1));
                            $('#persen1').val('').val(response.data.persentase.nilai).prop('readonly', false);
                            $('#sender_id1').val('').val(t.attr('id'));
                            $('#keterangan1').val(response.data.iku.keterangan);
                            
                            console.log(response);
                            if ($.isArray(response.data.alat_ukur.definisi)) {
                                $.each(response.data.alat_ukur.definisi, function(k, v) {
                                   $('#definisi1_' + (k+1)).val(v.deskripsi);
                                   console.log(k);
                                });
                            }

                            $('#loading1').hide();
                            $('#modal-form1').show();
                        }else{
                            alert('Ups terjadi kesalahan');
                            $('#modal1').modal('hide');
                        }
                    },
                    error: function(response) {
                        alert('Ups terjadi kesalahan');
                        $('#modal1').modal('hide');
                    }
                });
                
                $('#modal1').modal('show');
            } else if (t.attr('data-component') == 2) {
                $.ajax({
                    url: '{{url('persentase/detail/')}}/' + t.attr('data-id'),
                    type: 'GET',
                    dataType: 'JSON',
                    beforeSend: function() {
                        $('#periode2').val('').val('Triwulan ' + t.attr('data-triwulan'));
                        $('#persen2').val('').val(0);
                        $('#sender_id2').val('').val(t.attr('id'));
                        $('#keterangan2').val('').prop('readonly', false);
                        $('#modal_triwulan2').val('').val((parseInt(t.attr('data-triwulan')) + 1));
                        $('[id^=definisi2_]').val('').prop('readonly', false);

                        $('#modal-form2').hide();
                        $('#loading2').show();
                    },
                    success: function(response) {
                        if (response.status) {
                            $('#periode2').val('').val('Triwulan ' + (parseInt(t.attr('data-triwulan')) + 1));
                            $('#persen2').val('').val(response.data.persentase.nilai).prop('readonly', false);
                            $('#sender_id2').val('').val(t.attr('id'));
                            $('#keterangan2').val(response.data.iku.keterangan);
                            
                            console.log(response);
                            if ($.isArray(response.data.alat_ukur.definisi)) {
                                $.each(response.data.alat_ukur.definisi, function(k, v) {
                                   $('#definisi2_' + (k+1)).val(v.deskripsi);
                                   console.log(k);
                                });
                            }

                            $('#loading2').hide();
                            $('#modal-form2').show();
                        }else{
                            alert('Ups terjadi kesalahan');
                            $('#modal2').modal('hide');
                        }
                    },
                    error: function(response) {
                        alert('Ups terjadi kesalahan');
                        $('#modal2').modal('hide');
                    }
                });
                
                $('#modal2').modal('show');
            } else if (t.attr('data-component') == 3) {
                $.ajax({
                    url: '{{url('persentase/detail3/')}}/' + t.attr('data-id'),
                    type: 'GET',
                    dataType: 'JSON',
                    beforeSend: function() {
                        $('#periode3').val('').val('Triwulan ' + t.attr('data-triwulan'));
                        $('#persen3').val('').val(0);
                        $('#sender_id3').val('').val(t.attr('id'));
                        $('#modal_triwulan3').val('').val((parseInt(t.attr('data-triwulan')) + 1));
                        $('[id^=definisi3_]').val('').prop('readonly', false);
                        $('[id^=keterangan3]').val('').prop('readonly', false).hide();
                        $('[id^=kuantitasindikator_]').val('').prop('disabled', true);
                        $('[id^=kualitasindikator_]').val('').prop('disabled', true);
                        $('[id^=mindikator_]').val('').prop('disabled', true);
                        $('[id^=sindikator_]').val('').prop('disabled', true);
 //                       $('[id^=pindikator_]').val('').prop('disabled', false);
                        $('#jenis_program option').prop('selected', false).prop('readonly', false);
                        $('#jenis_program option[value="1"]').prop('selected',true);
                        $('#keterangan3_1').prop('disabled', false).show();
                        $('#peduli_container, #inovatif_container').hide();
                        $('#melayani_container').show();

                        $('#modal-form3').hide();
                        $('#loading3').show();
                    },
                    success: function(response) {
                        if (response.status) {
                            $('#periode3').val('').val('Triwulan ' + (parseInt(t.attr('data-triwulan')) + 1));
                            $('#persen3').val('').val(response.data.persentase.nilai).prop('readonly', false);
                            $('#sender_id3').val('').val(t.attr('id'));
                            $('#keterangan3_1').val(response.data.iku1.keterangan).show();
                            $('#keterangan3_2').val(response.data.iku2.keterangan);
                            $('#keterangan3_3').val(response.data.iku3.keterangan);
                            console.log(response);
                            // yg mc
                            if(response.data.alat_ukur1_1.active > 0) {
                                $('#mc').prop('checked', true);
                                $('[name=input_tipe3_2_1]').prop('disabled',false); 

                                if(response.data.alat_ukur1_1.tipe == "parameterized") {
                                    $('#input_tipe3_2_1_b').prop('checked', true);                              
                                    
                                    if ($.isArray(response.data.definisi1_1)) {
                                        if (response.data.definisi1_1.length > 0) {
                                            $.each(response.data.definisi1_1, function (k, v) {
                                                $('#mindikator_' + (k + 1)).val(v.deskripsi).prop('disabled', false);
                                            });
                                        }else{
                                            $('[id^=mindikator_]').val('');
                                        }
                                    }
                                }else{

                                    if(response.data.alat_ukur1_1.tipe == "manual") {
                                        $('#input_tipe3_2_1_a').prop('checked', true);
                                    }
                                    
                                    $.each(response.data.definisi1_1, function (k, v) {
                                        $('#mindikator_' + (k + 1)).val(v.deskripsi).prop('disabled', true);
                                    });
                                }

                            }else{

                                $('#mc').prop('checked', false);    
                                $('[name=input_tipe3_2_1]').prop('checked', false).prop('disabled',true);   
                                
                                $.each(response.data.definisi1_1, function (k, v) {
                                    $('#mindikator_' + (k + 1)).val(v.deskripsi).prop('disabled', true);
                                });                             
                            }
                            //survey yang
                            if(response.data.alat_ukur1_2.active > 0) {

                                $('#sks').prop('checked', true);
                                $('[name=input_tipe3_2_2]').prop('disabled',false);

                                if(response.data.alat_ukur1_2.tipe == "parameterized") {

                                    $('#input_tipe3_2_2_b').prop('checked', true);                              

                                    if ($.isArray(response.data.definisi1_2)) {

                                        if (response.data.definisi1_2.length > 0) {
                                            
                                            $.each(response.data.definisi1_2, function (k, v) {
                                                $('#sindikator_' + (k + 1)).val(v.deskripsi).prop('disabled', false);
                                            });

                                        }else{

                                            $('[id^=sindikator_]').val('');
                                        }
                                    }
                                }else{

                                    if(response.data.alat_ukur1_2.tipe == "manual") {
                                        $('#input_tipe3_2_2_a').prop('checked', true);
                                    }

                                    $.each(response.data.definisi1_2, function (k, v) {
                                        $('#sindikator_' + (k + 1)).val(v.deskripsi).prop('disabled', true);
                                    });
                                }

                            }else{
                                $('#sks').prop('checked', false);   
                                $('[name=input_tipe3_2_2]').prop('checked', false).prop('disabled',true);   
                                $.each(response.data.definisi1_2, function (k, v) {
                                    $('#sindikator_' + (k + 1)).val(v.deskripsi).prop('disabled', true);
                                });                             
                            }
							// kuantitas 
                            if(response.data.alat_ukur2_1.active > 0) {

                                $('#kuantitas').prop('checked', true);
                                $('[name=input_tipe3_1_1]').prop('disabled',false);

                            if(response.data.alat_ukur2_1.tipe == "parameterized") {

                                $('#input_tipe3_1_1_b').prop('checked', true);                              
                                
                                if ($.isArray(response.data.definisi2_1)) {
                                    
                                    if (response.data.definisi2_1.length > 0) {
                                    
                                        $.each(response.data.definisi2_1, function (k, v) {
                                            $('#kuantitasindikator_' + (k + 1)).val(v.deskripsi).prop('disabled', false);
                                        });
                                    
                                    }else{
                                        $('[id^=kuantitasindikator_]').val('');
                                    }
                                }

                            }else{

                                if(response.data.alat_ukur2_1.tipe == "manual") {
                                    $('#input_tipe3_1_1_a').prop('checked', true);
                                }

                                $.each(response.data.definisi2_1, function (k, v) {
                                    $('#kuantitasindikator_' + (k + 1)).val(v.deskripsi).prop('disabled', true);
                                });
                            }

                        }else{
                            
                            $('#kuantitas').prop('checked', false); 
                            $('[name=input_tipe3_1_1]').prop('checked', false).prop('disabled',true);

                            $.each(response.data.definisi2_1, function (k, v) {
                                $('#kuantitasindikator_' + (k + 1)).val(v.deskripsi).prop('disabled', true);
                            });                             
                        }

                            //kualitas yang
                        if(response.data.alat_ukur2_2.active > 0) {

                            $('#kualitas').prop('checked', true);
                            $('[name=input_tipe3_1_2]').prop('disabled',false); 
                            
                            if(response.data.alat_ukur2_2.tipe == "parameterized") {

                                $('#input_tipe3_1_2_b').prop('checked', true);                              

                                if ($.isArray(response.data.definisi2_2)) {

                                    if (response.data.definisi2_2.length > 0) {

                                        $.each(response.data.definisi2_2, function (k, v) {
                                            $('#kualitasindikator_' + (k + 1)).val(v.deskripsi).prop('disabled', false);
                                        });
                                    }else{
                                        $('[id^=kualitasindikator_]').val('');
                                    }
                                }

                            }else{
                                
                                if(response.data.alat_ukur2_2.tipe == "manual") {
                                    $('#input_tipe3_1_2_a').prop('checked', true);
                                }

                                $.each(response.data.definisi2_2, function (k, v) {
                                    $('#kualitasindikator_' + (k + 1)).val(v.deskripsi).prop('disabled', true);
                                });
                            }
                            
                        }else{

                            $('#kualitas').prop('checked', false);  
                            $('[name=input_tipe3_1_2]').prop('checked', false).prop('disabled',true);   
                            
                            $.each(response.data.definisi2_2, function (k, v) {
                                $('#kualitasindikator_' + (k + 1)).val(v.deskripsi).prop('disabled', true);
                            });                             
                            
                        }                            
                            $('#loading3').hide();
                            $('#modal-form3').show();
                    }else{
                            alert('Ups terjadi kesalahan');
                            $('#modal3').modal('hide');
                    }
                },
                error: function(response) {
                    alert('Ups terjadi kesalahan');
                    $('#modal3').modal('hide');
                }
            });
                
            $('#modal3').modal('show');
                // return false; 
        } else if (t.attr('data-component') == 4) {
            $.ajax({
                url: '{{url('persentase/detail/')}}/' + t.attr('data-id'),
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    $('#periode4').val('').val('Triwulan ' + t.attr('data-triwulan'));
                    $('#persen4').val('').val(0);
                    $('#sender_id4').val('').val(t.attr('id'));
                    $('#keterangan4').val('').prop('readonly', false);
                    $('#modal_triwulan4').val('').val((parseInt(t.attr('data-triwulan')) + 1));
                    $('[id^=definisi4_]').val('').prop('readonly', false);

                    $('#modal-form4').hide();
                    $('#loading4').show();
                },
                success: function(response) {
                    if (response.status) {
                        $('#periode4').val('').val('Triwulan ' + (parseInt(t.attr('data-triwulan')) + 1));
                        $('#persen4').val('').val(response.data.persentase.nilai).prop('readonly', false);
                        $('#sender_id4').val('').val(t.attr('id'));
                        $('#keterangan4').val(response.data.iku.keterangan);
                        
                        console.log(response);
                        if (response.data.iku.tipe == 'parameterized') {
                            $('#input_tipe4_parameterized').prop('checked', true);
                            $('#input_tipe4_manual').prop('checked', false);

                            if ($.isArray(response.data.alat_ukur.definisi)) {
                                $.each(response.data.alat_ukur.definisi, function(k, v) {
                                   $('#definisi4_' + (k+1)).val(v.deskripsi).prop('disabled', false);
                                   console.log(k);
                                });
                            }
                        }else{
                            $('#input_tipe4_parameterized').prop('checked', false);
                            $('#input_tipe4_manual').prop('checked', true);

                            if ($.isArray(response.data.alat_ukur.definisi)) {
                                $.each(response.data.alat_ukur.definisi, function(k, v) {
                                   $('#definisi4_' + (k+1)).prop('disabled', true);
                                   console.log(k);
                                });
                            }
                        }
                        

                        $('#loading4').hide();
                        $('#modal-form4').show();
                    }else{
                        alert('Ups terjadi kesalahan');
                        $('#modal4').modal('hide');
                    }
                },
                error: function(response) {
                    alert('Ups terjadi kesalahan');
                    $('#modal4').modal('hide');
                }
            });
            
            $('#modal4').modal('show');
        } else if (t.attr('data-component') == 5) {
            $.ajax({
                url: '{{url('persentase/detail/')}}/' + t.attr('data-id'),
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    $('#periode5').val('').val('Triwulan ' + t.attr('data-triwulan'));
                    $('#persen5').val('').val(0);
                    $('#sender_id5').val('').val(t.attr('id'));
                    $('#keterangan5').val('').prop('readonly', false);
                    $('#modal_triwulan5').val('').val((parseInt(t.attr('data-triwulan')) + 1));

                    $('#modal-form5').hide();
                    $('#loading5').show();
                },
                success: function(response) {
                    if (response.status) {
                        $('#periode5').val('').val('Triwulan ' + (parseInt(t.attr('data-triwulan')) + 1));
                        $('#persen5').val('').val(response.data.persentase.nilai).prop('readonly', false);
                        $('#sender_id5').val('').val(t.attr('id'));
                        $('#keterangan5').val(response.data.iku.keterangan);

                        $('#loading5').hide();
                        $('#modal-form5').show();
                    }else{
                        alert('Ups terjadi kesalahan');
                        $('#modal5').modal('hide');
                    }
                },
                error: function(response) {
                    alert('Ups terjadi kesalahan');
                    $('#modal5').modal('hide');
                }
            });
            
            $('#modal5').modal('show');
        } else if (t.attr('data-component') == 6) {
            $.ajax({
                url: '{{url('persentase/detail/')}}/' + t.attr('data-id'),
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    $('#periode6').val('').val('Triwulan ' + t.attr('data-triwulan'));
                    $('#persen6').val('').val(0);
                    $('#sender_id6').val('').val(t.attr('id'));
                    $('#keterangan6').val('').prop('readonly', false);
                    $('#modal_triwulan6').val('').val((parseInt(t.attr('data-triwulan')) + 1));

                    $('#modal-form6').hide();
                    $('#loading6').show();
                },
                success: function(response) {
                    if (response.status) {
                        $('#periode6').val('').val('Triwulan ' + (parseInt(t.attr('data-triwulan')) + 1));
                        $('#persen6').val('').val(response.data.persentase.nilai).prop('readonly', false);
                        $('#sender_id6').val('').val(t.attr('id'));
                        $('#keterangan6').val(response.data.iku.keterangan);

                        $('#loading6').hide();
                        $('#modal-form6').show();
                    }else{
                        alert('Ups terjadi kesalahan');
                        $('#modal6').modal('hide');
                    }
                },
                error: function(response) {
                    alert('Ups terjadi kesalahan');
                    $('#modal6').modal('hide');
                }
            });
            
            $('#modal6').modal('show');
        } else if (t.attr('data-component') == 7) {
            $.ajax({
                url: '{{url('persentase/detail/')}}/' + t.attr('data-id'),
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    $('#periode7').val('').val('Triwulan ' + t.attr('data-triwulan'));
                    $('#persen7').val('').val(0);
                    $('#sender_id7').val('').val(t.attr('id'));
                    $('#keterangan7').val('').prop('readonly', false);
                    $('#modal_triwulan7').val('').val((parseInt(t.attr('data-triwulan')) + 1));

                    $('#modal-form7').hide();
                    $('#loading7').show();
                },
                success: function(response) {
                    if (response.status) {
                        $('#periode7').val('').val('Triwulan ' + (parseInt(t.attr('data-triwulan')) + 1));
                        $('#persen7').val('').val(response.data.persentase.nilai).prop('readonly', false);
                        $('#sender_id7').val('').val(t.attr('id'));
                        $('#keterangan7').val(response.data.iku.keterangan);

                        $('#loading7').hide();
                        $('#modal-form7').show();
                    }else{
                        alert('Ups terjadi kesalahan');
                        $('#modal7').modal('hide');
                    }
                },
                error: function(response) {
                    alert('Ups terjadi kesalahan');
                    $('#modal7').modal('hide');
                }
            });
            
            $('#modal7').modal('show');
        }
    });

    $('#modal_simpan1').on('click', function() {
        var s1 = $(this);
        var sender_id = $('#sender_id1').val();
        var sender = $('#' + sender_id);

        if ($('#definisi1_6').val().length < 1) {
            alert('Harap isi semua definisi');
            $('#definisi1_6').focus();

            return false;
        }

        if ($('#definisi1_5').val().length < 1) {
            alert('Harap isi semua definisi');
            $('#definisi1_5').focus();
            
            return false;
        }

        if ($('#definisi1_4').val().length < 1) {
            alert('Harap isi semua definisi');
            $('#definisi1_4').focus();
            
            return false;
        }

        if ($('#definisi1_3').val().length < 1) {
            alert('Harap isi semua definisi');
            $('#definisi1_3').focus();
            
            return false;
        }
        
        if ($('#definisi1_2').val().length < 1) {
            alert('Harap isi semua definisi');
            $('#definisi1_2').focus();
            
            return false;
        }

        if ($('#definisi1_1').val().length < 1) {
            alert('Harap isi semua definisi');
            $('#definisi1_1').focus();
            
            return false;
        }

        $.ajax({
            url: '{{url('persentaseEdit1')}}',
            data: $('#modal-form1').serialize() + '&hashid=' + sender.attr('data-id'),
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function(){
                s1.html('<i class="fa fa-cog fa-spin"></i> Memuat...').prop('disabled', true);
                $('#keterangan1, #persen1, [id^=definisi1_]').prop('readonly', true);
            },
            success: function(response){
                if (response.status) {
                    sender.attr('data-id', response.data.hashid).val(response.data.persen + ' %');
                    $('#modal1').modal('hide');
                }else{
                    alert(response.message);
                    $('#keterangan1, #persen1, [id^=definisi1_]').prop('readonly', false);
                    $('#persen1').focus();

                }
                s1.prop('disabled', false).html('Simpan <i class="fa fa-save"></i>');
                $('#keterangan1, #persen1, [id^=definisi1_]').prop('readonly', false);
            },
            error: function(response) {
                console.log(response);
                alert('error');
            }
        });
    });

    //Simpan 2
    $('#modal_simpan2').on('click', function() {
        var s2 = $(this);
        var sender_id = $('#sender_id2').val();
        var sender = $('#' + sender_id);

        if ($('#definisi2_6').val().length < 1) {
            alert('Harap isi semua definisi');
            $('#definisi2_6').focus();

            return false;
        }

        if ($('#definisi2_5').val().length < 1) {
            alert('Harap isi semua definisi');
            $('#definisi2_5').focus();
            
            return false;
        }

        if ($('#definisi2_4').val().length < 1) {
            alert('Harap isi semua definisi');
            $('#definisi2_4').focus();
            
            return false;
        }

        if ($('#definisi2_3').val().length < 1) {
            alert('Harap isi semua definisi');
            $('#definisi2_3').focus();
            
            return false;
        }
        
        if ($('#definisi2_2').val().length < 1) {
            alert('Harap isi semua definisi');
            $('#definisi2_2').focus();
            
            return false;
        }

        if ($('#definisi2_1').val().length < 1) {
            alert('Harap isi semua definisi');
            $('#definisi2_1').focus();
            
            return false;
        }

        $.ajax({
            url: '{{url('persentaseEdit2')}}',
            data: $('#modal-form2').serialize() + '&hashid=' + sender.attr('data-id'),
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function(){
                s2.html('<i class="fa fa-cog fa-spin"></i> Memuat...').prop('disabled', true);
                $('#keterangan2, #persen2, [id^=definisi2_]').prop('readonly', true);
            },
            success: function(response){
                if (response.status) {
                    sender.attr('data-id', response.data.hashid).val(response.data.persen + ' %');
                    $('#modal2').modal('hide');
                }else{
                    alert(response.message);
                    $('#keterangan2, #persen2, [id^=definisi2_]').prop('readonly', false);
                    $('#persen2').focus();

                }
                s2.prop('disabled', false).html('Simpan <i class="fa fa-save"></i>');
                $('#keterangan2, #persen2, [id^=definisi2_]').prop('readonly', false);
            },
            error: function(response) {
                console.log(response);
                alert('error');
            }
        });
    });

    //Simpan 4
    $('#modal_simpan4').on('click', function() {
        var s4 = $(this);
        var sender_id = $('#sender_id4').val();
        var sender = $('#' + sender_id);

        if ($('#input_tipe4_parameterized').is(':checked')) {
            if ($('#definisi4_6').val().length < 1) {
                alert('Harap isi semua definisi');
                $('#definisi4_6').focus();

                return false;
            }

            if ($('#definisi4_5').val().length < 1) {
                alert('Harap isi semua definisi');
                $('#definisi4_5').focus();
                
                return false;
            }

            if ($('#definisi4_4').val().length < 1) {
                alert('Harap isi semua definisi');
                $('#definisi4_4').focus();
                
                return false;
            }

            if ($('#definisi4_3').val().length < 1) {
                alert('Harap isi semua definisi');
                $('#definisi4_3').focus();
                
                return false;
            }
            
            if ($('#definisi4_2').val().length < 1) {
                alert('Harap isi semua definisi');
                $('#definisi4_2').focus();
                
                return false;
            }

            if ($('#definisi4_1').val().length < 1) {
                alert('Harap isi semua definisi');
                $('#definisi4_1').focus();
                
                return false;
            }
        }

        $.ajax({
            url: '{{url('persentaseEdit4')}}',
            data: $('#modal-form4').serialize() + '&hashid=' + sender.attr('data-id'),
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function(){
                s4.html('<i class="fa fa-cog fa-spin"></i> Memuat...').prop('disabled', true);
                $('#keterangan4, #persen4, [id^=definisi4_]').prop('readonly', true);
            },
            success: function(response){
                if (response.status) {
                    sender.attr('data-id', response.data.hashid).val(response.data.persen + ' %');
                    $('#modal4').modal('hide');
                }else{
                    alert(response.message);
                    $('#keterangan4, #persen4, [id^=definisi4_]').prop('readonly', false);
                    $('#persen4').focus();

                }
                s4.prop('disabled', false).html('Simpan <i class="fa fa-save"></i>');
                $('#keterangan4, #persen4, [id^=definisi4_]').prop('readonly', false);
            },
            error: function(response) {
                console.log(response);
                alert('error');
            }
        });
    });

    //Simpan 5
    $('#modal_simpan5').on('click', function() {
        var s5 = $(this);
        var sender_id = $('#sender_id5').val();
        var sender = $('#' + sender_id);

        $.ajax({
            url: '{{url('persentaseEdit5')}}',
            data: $('#modal-form5').serialize() + '&hashid=' + sender.attr('data-id'),
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function(){
                s5.html('<i class="fa fa-cog fa-spin"></i> Memuat...').prop('disabled', true);
                $('#keterangan5, #persen5').prop('readonly', true);
            },
            success: function(response){
                if (response.status) {
                    sender.attr('data-id', response.data.hashid).val(response.data.persen + ' %');
                    $('#modal5').modal('hide');
                }else{
                    alert(response.message);
                    $('#keterangan5, #persen5').prop('readonly', false);
                    $('#persen5').focus();

                }
                s5.prop('disabled', false).html('Simpan <i class="fa fa-save"></i>');
                $('#keterangan5, #persen5').prop('readonly', false);
            },
            error: function(response) {
                console.log(response);
                alert('error');
            }
        });
    });

    //Simpan 6
    $('#modal_simpan6').on('click', function() {
        var s6 = $(this);
        var sender_id = $('#sender_id6').val();
        var sender = $('#' + sender_id);

        $.ajax({
            url: '{{url('persentaseEdit6')}}',
            data: $('#modal-form6').serialize() + '&hashid=' + sender.attr('data-id'),
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function(){
                s6.html('<i class="fa fa-cog fa-spin"></i> Memuat...').prop('disabled', true);
                $('#keterangan6, #persen6').prop('readonly', true);
            },
            success: function(response){
                if (response.status) {
                    sender.attr('data-id', response.data.hashid).val(response.data.persen + ' %');
                    $('#modal6').modal('hide');
                }else{
                    alert(response.message);
                    $('#keterangan6, #persen6').prop('readonly', false);
                    $('#persen6').focus();

                }
                s6.prop('disabled', false).html('Simpan <i class="fa fa-save"></i>');
                $('#keterangan6, #persen5').prop('readonly', false);
            },
            error: function(response) {
                console.log(response);
                alert('error');
            }
        });
    });

    //Simpan 7
    $('#modal_simpan7').on('click', function() {
        var s7 = $(this);
        var sender_id = $('#sender_id7').val();
        var sender = $('#' + sender_id);

        $.ajax({
            url: '{{url('persentaseEdit7')}}',
            data: $('#modal-form7').serialize() + '&hashid=' + sender.attr('data-id'),
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function(){
                s7.html('<i class="fa fa-cog fa-spin"></i> Memuat...').prop('disabled', true);
                $('#keterangan7, #persen7').prop('readonly', true);
            },
            success: function(response){
                if (response.status) {
                    sender.attr('data-id', response.data.hashid).val(response.data.persen + ' %');
                    $('#modal7').modal('hide');
                }else{
                    alert(response.message);
                    $('#keterangan7, #persen7').prop('readonly', false);
                    $('#persen7').focus();

                }
                s7.prop('disabled', false).html('Simpan <i class="fa fa-save"></i>');
                $('#keterangan7, #persen7').prop('readonly', false);
            },
            error: function(response) {
                console.log(response);
                alert('error');
            }
        });
    });


    // OOOOO

    $(document).on('change', 'select[name="jenis_program"]', function(argument) {

        if ($('select[name="jenis_program"] option:selected').val() == '3') {

//                $('#melayani_container').hide().find(':input').prop('disabled', true);
//                $('#peduli_container').hide().find(':input').prop('disabled', true);
            $('#melayani_container').hide();
            $('#peduli_container').hide();

            $('[id^=keterangan3_]').hide();
            $('[id^=keterangan3_3]').show();
 
             $('[id^=modal_simpan3]').hide().prop('disabled', true);
             $('[id^=modal_simpan3_3]').show().prop('disabled', false);

             $('[id^=input_tipe3_').parent().hide();
            // $('#input_tipe3_3').prop('checked', true).parent().show();

            $('#inovatif_container').show();

        } else if ($('select[name="jenis_program"] option:selected').val() == '2') {

            $('#inovatif_container').hide();
            $('#melayani_container').hide();

            $('[id^=keterangan3_]').hide();
            $('[id^=keterangan3_2]').show();

             $('[id^=modal_simpan3]').hide().prop('disabled', true);
             $('[id^=modal_simpan3_2]').show().prop('disabled', false);

            // $('[id^=input_tipe3_').prop('checked', false).parent().hide();
            // $('#input_tipe3_1').prop('checked', true).parent().show();
            // $('#input_tipe3_3').prop('checked', false).parent().show();
			 $('#input_tipe3_1_1_b').parent().show();
            $('#input_tipe3_1_1_a').parent().show();
            
            $('#input_tipe3_1_2_b').parent().show();
            $('#input_tipe3_1_2_a').parent().show();
            $('#peduli_container').show();
            

        } else if($('select[name="jenis_program"] option:selected').val() == '1') {

            $('#inovatif_container').hide();
            $('#peduli_container').hide();

            $('[id^=keterangan3_]').hide();
            $('[id^=keterangan3_1]').show();
            
            $('[id^=modal_simpan3]').hide();
            $('[id^=modal_simpan3_1]').show();

            $('[id^=input_tipe3_').show().parent().hide();
            // $('#input_tipe3_1').prop('checked', true).parent().show();
            // $('#input_tipe3_3').prop('checked', false).parent().show();
            
            $('#input_tipe3_2_1_b').parent().show();
            $('#input_tipe3_2_1_a').parent().show();
            
            $('#input_tipe3_2_2_b').parent().show();
            $('#input_tipe3_2_2_a').parent().show();
            
           // $('#mc, #sks').prop('disabled', false);

            $('#melayani_container').show();
        }
    });

    $('#sks').on('change', function() {
        if ($(this).is(':checked')) {
            $('[name=input_tipe3_2_2]').prop('disabled', false);
            $('#input_tipe3_2_2_b').prop('checked', true);
            $('[id^=sindikator_]').val('').prop('disabled', false);
        }else{
            $('[name=input_tipe3_2_2]').prop('disabled', true);
            $('#input_tipe3_2_2_b').prop('checked', false);
            $('[id^=sindikator_]').val('').prop('disabled', true);
        }
    });
    $('#input_tipe3_2_2_a').on('change', function() {
        if ($(this).is(':checked')) {
            $('[id^=sindikator_]').val('').prop('disabled', true);
        }else{
            $('[id^=sindikator_]').val('').prop('disabled', false);
        }
    });
    $('#input_tipe3_2_2_b').on('change', function() {
        if ($(this).is(':checked')) {
            $('[id^=sindikator_]').val('').prop('disabled', false);
        }else{
            $('[id^=sindikator_]').val('').prop('disabled', true);
        }
    });

    $('#kuantitas').on('change', function() {
        if ($(this).is(':checked')) {
            $('[name=input_tipe3_1_1]').prop('disabled', false);
            $('#input_tipe3_1_1_b').prop('checked', true);
            $('[id^=kuantitasindikator_]').val('').prop('disabled', false);
        }else{
            $('[name=input_tipe3_1_1]').prop('disabled', true);
            $('#input_tipe3_1_1_b').prop('checked', false);
            $('[id^=kuantitasindikator_]').val('').prop('disabled', true);
        }
    });
    $('#input_tipe3_1_1_a').on('change', function() {
        if ($(this).is(':checked')) {
            $('[id^=kuantitasindikator_]').val('').prop('disabled', true);
        }else{
            $('[id^=kuantitasindikator_]').val('').prop('disabled', false);
        }
    });
    $('#input_tipe3_1_1_b').on('change', function() {
        if ($(this).is(':checked')) {
            $('[id^=kuantitasindikator_]').val('').prop('disabled', false);
        }else{
            $('[id^=kuantitasindikator_]').val('').prop('disabled', true);
        }
    });
    
    $('#kualitas').on('change', function() {
        if ($(this).is(':checked')) {
            $('[name=input_tipe3_1_2]').prop('disabled', false);
            $('#input_tipe3_1_2_b').prop('checked', true);
            $('[id^=kualitasindikator_]').val('').prop('disabled', false);
        }else{
            $('[name=input_tipe3_1_2]').prop('disabled', true);
            $('#input_tipe3_1_2_b').prop('checked', false);
            $('[id^=kualitasindikator_]').val('').prop('disabled', true);
        }
    });
	
$('#input_tipe3_1_2_a').on('change', function() {
        if ($(this).is(':checked')) {
            $('[id^=kualitasindikator_]').val('').prop('disabled', true);
        }else{
            $('[id^=kualitasindikator_]').val('').prop('disabled', false);
        }
    });
    $('#input_tipe3_1_2_b').on('change', function() {
        if ($(this).is(':checked')) {
            $('[id^=kualitasindikator_]').val('').prop('disabled', false);
        }else{
            $('[id^=kualitasindikator_]').val('').prop('disabled', true);
        }
    });

    $('#mc').on('change', function() {
        if ($(this).is(':checked')) {
            $('[name=input_tipe3_2_1]').prop('disabled', false);
            $('#input_tipe3_2_1_b').prop('checked', true);
            $('[id^=mindikator_]').val('').prop('disabled', false);
        }else{
            $('[name=input_tipe3_2_1]').prop('disabled', true);
            $('#input_tipe3_2_1_b').prop('checked', false);
            $('[id^=mindikator_]').val('').prop('disabled', true);
        }
    });
     $('#input_tipe3_2_1_a').on('change', function() {
        if ($(this).is(':checked')) {
            $('[id^=mindikator_]').val('').prop('disabled', true);
        }else{
            $('[id^=mindikator_]').val('').prop('disabled', false);
        }
    });
    $('#input_tipe3_2_1_b').on('change', function() {
        if ($(this).is(':checked')) {
            $('[id^=mindikator_]').val('').prop('disabled', false);
        }else{
            $('[id^=mindikator_]').val('').prop('disabled', true);
        }
    });
    $(document).on('change', 'input[name="input_tipe3"]', function() {

        if ($('#input_tipe3_1').is(':checked')) {

            if ($('#jenis_program').val() == 1) {
        
                $('#mc, #sks').prop('checked', true).prop('disabled', false);
                $('[id^=mindikator_], [id^=sindikator_]').val('').prop('disabled', false);
        
            } else if($('#jenis_program').val() == 2) {
        
                $('[id^=pindikator_]').val('').prop('disabled', false);
            }
        
        } else if ($('#input_tipe3_3').is(':checked')){
        
            if ($('#jenis_program').val() == 1) {
        
                $('#mc, #sks').prop('checked', false).prop('disabled', true);
                $('[id^=mindikator_], [id^=sindikator_]').val('').prop('disabled', true);
        
            } else if ($('#jenis_program').val() == 2) {
        
                $('[id^=pindikator_]').val('').prop('disabled', true);
        
            }
        }
    });

    //Simpan 3_1
    $('#modal_simpan3_1').on('click', function() {
        var s3_1 = $(this);
        var sender_id = $('#sender_id3').val();
        var sender = $('#' + sender_id);

        $.ajax({
            url: '{{url('persentaseEdit3_1')}}',
            data: $('#modal-form3').serialize() + '&hashid=' + sender.attr('data-id'),
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function(){
                s3_1.html('<i class="fa fa-cog fa-spin"></i> Memuat...').prop('disabled', true);
                $('#keterangan3_1, #persen3').prop('readonly', true);
            },
            success: function(response){
                if (response.status) {
                    sender.attr('data-id', response.data.hashid).val(response.data.persen + ' %');
                    $('#keterangan3_1, #persen3').prop('readonly', false);
                    $('#modal3').modal('hide');
                }else{
                    alert(response.message);
                    $('#keterangan3_1, #persen3').prop('readonly', false);
                    $('#persen3').focus();
                }

                s3_1.prop('disabled', false).html('Simpan <i class="fa fa-save"></i>');
                $('#keterangan3_1, #persen3').prop('readonly', false);
            },
            error: function(response) {
                console.log(response);
                alert('error');
            }
        });
    });

    //Simpan 3_2
    $('#modal_simpan3_2').on('click', function() {
        var s3_2 = $(this);
        var sender_id = $('#sender_id3').val();
        var sender = $('#' + sender_id);

        $.ajax({
            url: '{{url('persentaseEdit3_2')}}',
            data: $('#modal-form3').serialize() + '&hashid=' + sender.attr('data-id'),
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function(){
                s3_2.html('<i class="fa fa-cog fa-spin"></i> Memuat...').prop('disabled', true);
                $('#keterangan3_2, #persen3').prop('readonly', true);
            },
            success: function(response){
                if (response.status) {
                    sender.attr('data-id', response.data.hashid).val(response.data.persen + ' %');
                    $('#keterangan3_2, #persen3').prop('readonly', false);
                    $('#modal3').modal('hide');
                }else{
                    alert(response.message);
                    $('#keterangan3_2, #persen3').prop('readonly', false);
                    $('#persen3').focus();

                }
                s3_2.prop('disabled', false).html('Simpan <i class="fa fa-save"></i>');
                $('#keterangan3_2, #persen3').prop('readonly', false);
            },
            error: function(response) {
                console.log(response);
                alert('error');
            }
        });
    });

    //Simpan 3_3
    $('#modal_simpan3_3').on('click', function() {
        var s3_3 = $(this);
        var sender_id = $('#sender_id3').val();
        var sender = $('#' + sender_id);

        $.ajax({
            url: '{{url('persentaseEdit3_3')}}',
            data: $('#modal-form3').serialize() + '&hashid=' + sender.attr('data-id'),
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function(){
                s3_3.html('<i class="fa fa-cog fa-spin"></i> Memuat...').prop('disabled', true);
                $('#keterangan3_3, #persen3').prop('readonly', true);
            },
            success: function(response){
                if (response.status) {
                    sender.attr('data-id', response.data.hashid).val(response.data.persen + ' %');
                    $('#keterangan3_3, #persen3').prop('readonly', false);
                    $('#modal3').modal('hide');
                }else{
                    alert(response.message);
                    $('#keterangan3_3, #persen3').prop('readonly', false);
                    $('#persen3').focus();

                }
                s3_3.prop('disabled', false).html('Simpan <i class="fa fa-save"></i>');
                $('#keterangan3_3, #persen3').prop('readonly', false);
            },
            error: function(response) {
                console.log(response);
                alert('error');
            }
        });
    });


    $(document).on('click', '#input_tipe4_manual', function(){
        for (var i = 1; i <= 6; i++) {
            $('#definisi4_' + i).prop('disabled', true);
        }
    });


    $(document).on('click', '#input_tipe4_parameterized', function(){
        for (var i = 1; i <= 6; i++) {
            $('#definisi4_' + i).prop('disabled', false);
        }
    });
</script>
@endsection