@extends('layout.master')

@section('content')
    {{-- BARU 1 --}}
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
                            <label for="komponen_iku1" class="control-label col-md-4">Komponen Iku</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="komponen_iku1" value="Kecepatan Pelaporan">
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
                                    <input type="number" name="persen1" class="form-control" min="0" step="1" max="100" value="0" id="persen1">
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
                                            <input type="radio" id="input_tipe1" name="input_tipe" checked value="otomatis"> Parameterize
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
                                    <input type="text" name="indikator1_6" id="indikator1_6" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 5</th>
                                <td>
                                    <input type="text" name="indikator1_5" id="indikator1_5" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 4</th>
                                <td>
                                    <input type="text" name="indikator1_4" id="indikator1_4" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 3</th>
                                <td>
                                    <input type="text" name="indikator1_3" id="indikator1_3" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 2</th>
                                <td>
                                    <input type="text" name="indikator1_2" id="indikator1_2" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 1</th>
                                <td>
                                    <input type="text" name="indikator1_1" id="indikator1_1" class="form-control" value="">
                                </td>
                            </tr>
                        </table>
                        <div class="form-group">
                            <div class="col-md-4">
                                {{csrf_field()}}
                                <input type="hidden" name="sender_id1" id="sender_id1" value="">
                                <input type="hidden" name="modal_tahun1" value="{{$tahun}}">
                                <input type="hidden" name="modal_triwulan1" value="" id="modal_triwulan1">
                            </div>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-success pull-right" id="modal_simpan_baru1">Simpan <i class="fa fa-save"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- EDIT 1 --}}
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal1Edit" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Indikator Pencapaian Kecepatan Laporan</h4>
                </div>
                <div class="modal-body">
                    <div class="text-center" id="loading1Edit">
                        <i class="fa fa-cog fa-3x fa-spin"></i>
                        <br>
                        Memuat...
                    </div>
                    <form class="form-horizontal" id="modal-form1Edit">
                        <div class="form-group">
                            <label for="komponen_iku1Edit" class="control-label col-md-4">Komponen Iku</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="komponen_iku1Edit" value="Kecepatan Pelaporan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="periode1Edit" class="control-label col-md-4">Periode</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="periode1Edit">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="persen1Edit" class="control-label col-md-4">Persentase Nilai</label>
                            <div class="col-md-2">
                                <div class="input-group">
                                    <input type="number" name="persen1Edit" class="form-control" min="0" step="1" max="100" value="0" id="persen1Edit">
                                    <span class="input-group-addon">%</span>                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input_tipe1" class="control-label col-md-4">Input Nilai</label>
                            <div class="col-md-8">
                                <div class="col-md-9" id="radioContainer">
                                    <div class="radio">
                                        <label for="input_tipe1Edit">
                                            <input type="radio" id="input_tipe1Edit" name="input_tipe1Edit" checked value="otomatis"> Parameterize
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan1" class="control-label col-md-4">Keterangan</label>
                            <div class="col-md-8">
                                <textarea name="keterangan1Edit" id="keterangan1Edit" class="form-control"></textarea>
                            </div>
                        </div>
                        <hr id="hr">
                        <table class="table table-condensed table-bordered" id="tabel-deskripsi">
                            <tr>
                                <th>Deskripsi Indikator 6</th>
                                <td>
                                    <input type="text" name="indikator1_6Edit" id="indikator1_6Edit" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 5</th>
                                <td>
                                    <input type="text" name="indikator1_5Edit" id="indikator1_5Edit" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 4</th>
                                <td>
                                    <input type="text" name="indikator1_4Edit" id="indikator1_4Edit" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 3</th>
                                <td>
                                    <input type="text" name="indikator1_3Edit" id="indikator1_3Edit" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 2</th>
                                <td>
                                    <input type="text" name="indikator1_2Edit" id="indikator1_2Edit" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 1</th>
                                <td>
                                    <input type="text" name="indikator1_1Edit" id="indikator1_1Edit" class="form-control" value="">
                                </td>
                            </tr>
                        </table>
                        <div class="form-group">
                            <div class="col-md-4">
                                {{csrf_field()}}
                                <input type="hidden" name="sender_id1Edit" id="sender_id1Edit" value="">
                                <input type="hidden" name="modal_tahun1Edit" value="{{$tahun}}">
                                <input type="hidden" name="modal_triwulan1Edit" value="" id="modal_triwulan1Edit">
                            </div>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-success pull-right" id="modal_simpan_baru1Edit">Simpan <i class="fa fa-save"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Baru 2 --}}
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
                            <label for="komponen_iku2" class="control-label col-md-4">Komponen Iku</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="komponen_iku2" value="Serapan Anggaran">
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
                                    <input type="number" name="persen2" class="form-control" min="0" step="1" max="100" value="0" id="persen2">
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
                                            <input type="radio" id="input_tipe2" name="input_tipe2" checked value="otomatis"> Parameterize
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
                                    <input type="text" name="indikator2_6" id="indikator2_6" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 5</th>
                                <td>
                                    <input type="text" name="indikator2_5" id="indikator2_5" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 4</th>
                                <td>
                                    <input type="text" name="indikator2_4" id="indikator2_4" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 3</th>
                                <td>
                                    <input type="text" name="indikator2_3" id="indikator2_3" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 2</th>
                                <td>
                                    <input type="text" name="indikator2_2" id="indikator2_2" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 1</th>
                                <td>
                                    <input type="text" name="indikator2_1" id="indikator2_1" class="form-control" value="">
                                </td>
                            </tr>
                        </table>
                        <div class="form-group">
                            <div class="col-md-4">
                                {{csrf_field()}}
                                <input type="hidden" name="sender_id2" id="sender_id2" value="">
                                <input type="hidden" name="modal_tahun2" value="{{$tahun}}">
                                <input type="hidden" name="modal_triwulan2" value="" id="modal_triwulan2">
                            </div>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-success pull-right" id="modal_simpan_baru2">Simpan <i class="fa fa-save"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- EDIT 2 --}}
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal2Edit" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Indikator Pencapaian Serapan Anggaran</h4>
                </div>
                <div class="modal-body">
                    <div class="text-center" id="loading2Edit">
                        <i class="fa fa-cog fa-3x fa-spin"></i>
                        <br>
                        Memuat...
                    </div>
                    <form class="form-horizontal" id="modal-form2Edit">
                        <div class="form-group">
                            <label for="komponen_iku2Edit" class="control-label col-md-4">Komponen Iku</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="komponen_iku2Edit" value="Serapan Anggaran">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="periode2Edit" class="control-label col-md-4">Periode</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="periode2Edit">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="persen2Edit" class="control-label col-md-4">Persentase Nilai</label>
                            <div class="col-md-2">
                                <div class="input-group">
                                    <input type="number" name="persen2Edit" class="form-control" min="0" step="1" max="100" value="0" id="persen2Edit">
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
                            <label for="keterangan2" class="control-label col-md-4">Keterangan</label>
                            <div class="col-md-8">
                                <textarea name="keterangan2Edit" id="keterangan2Edit" class="form-control"></textarea>
                            </div>
                        </div>
                        <hr id="hr">
                        <table class="table table-condensed table-bordered" id="tabel-deskripsi">
                            <tr>
                                <th>Deskripsi Indikator 6</th>
                                <td>
                                    <input type="text" name="indikator2_6Edit" id="indikator2_6Edit" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 5</th>
                                <td>
                                    <input type="text" name="indikator2_5Edit" id="indikator2_5Edit" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 4</th>
                                <td>
                                    <input type="text" name="indikator2_4Edit" id="indikator2_4Edit" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 3</th>
                                <td>
                                    <input type="text" name="indikator2_3Edit" id="indikator2_3Edit" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 2</th>
                                <td>
                                    <input type="text" name="indikator2_2Edit" id="indikator2_2Edit" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 1</th>
                                <td>
                                    <input type="text" name="indikator2_1Edit" id="indikator2_1Edit" class="form-control" value="">
                                </td>
                            </tr>
                        </table>
                        <div class="form-group">
                            <div class="col-md-4">
                                {{csrf_field()}}
                                <input type="hidden" name="sender_id2Edit" id="sender_id2Edit" value="">
                                <input type="hidden" name="modal_tahun2Edit" value="{{$tahun}}">
                                <input type="hidden" name="modal_triwulan2Edit" value="" id="modal_triwulan2Edit">
                            </div>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-success pull-right" id="modal_simpan_baru2Edit">Simpan <i class="fa fa-save"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Baru 4 --}}
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
                            <label for="komponen_iku4" class="control-label col-md-4">Komponen Iku</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="komponen_iku4" value="Partisipasi Pimpinan">
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
                            <div class="col-md-2">
                                <div class="input-group">
                                    <input type="number" name="persen4" class="form-control" min="0" step="1" max="100" value="0" id="persen4">
                                    <span class="input-group-addon">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input_tipe2" class="control-label col-md-4">Input Nilai</label>
                            <div class="col-md-8">
                                <div class="col-md-9" id="radioContainer">
                                    <div class="radio">
                                        <label for="input_tipe4">
                                            <input type="radio" id="input_tipe4" name="input_tipe4" checked value="otomatis"> Parameterize
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
                                    <input type="text" name="indikator4_6" id="indikator4_6" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 5</th>
                                <td>
                                    <input type="text" name="indikator4_5" id="indikator4_5" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 4</th>
                                <td>
                                    <input type="text" name="indikator4_4" id="indikator4_4" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 3</th>
                                <td>
                                    <input type="text" name="indikator4_3" id="indikator4_3" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 2</th>
                                <td>
                                    <input type="text" name="indikator4_2" id="indikator4_2" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 1</th>
                                <td>
                                    <input type="text" name="indikator4_1" id="indikator4_1" class="form-control" value="">
                                </td>
                            </tr>
                        </table>
                        <div class="form-group">
                            <div class="col-md-4">
                                {{csrf_field()}}
                                <input type="hidden" name="sender_id4" id="sender_id4" value="">
                                <input type="hidden" name="modal_tahun4" value="{{$tahun}}">
                                <input type="hidden" name="modal_triwulan4" value="" id="modal_triwulan4">
                            </div>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-success pull-right" id="modal_simpan_baru4">Simpan <i class="fa fa-save"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- EDIT 4 --}}
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal4Edit" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Indikator Pencapaian Partisipasi Pimpinan</h4>
                </div>
                <div class="modal-body">
                    <div class="text-center" id="loading4Edit">
                        <i class="fa fa-cog fa-3x fa-spin"></i>
                        <br>
                        Memuat...
                    </div>
                    <form class="form-horizontal" id="modal-form4Edit">
                        <div class="form-group">
                            <label for="komponen_iku4Edit" class="control-label col-md-4">Komponen Iku</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="komponen_iku4Edit" value="Partisipasi Pimpinan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="periode4Edit" class="control-label col-md-4">Periode</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="periode4Edit">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="persen4Edit" class="control-label col-md-4">Persentase Nilai</label>
                            <div class="col-md-2">
                                <div class="input-group">
                                    <input type="number" name="persen4Edit" class="form-control" min="0" step="1" max="100" value="0" id="persen4Edit">
                                    <span class="input-group-addon">%</span>                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input_tipe4" class="control-label col-md-4">Input Nilai</label>
                            <div class="col-md-8">
                                <div class="col-md-9" id="radioContainer">
                                    <div class="radio">
                                        <label for="input_tipe4Edit">
                                            <input type="radio" id="input_tipe4Edit" name="input_tipe4Edit" checked value="otomatis"> Parameterize
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan4" class="control-label col-md-4">Keterangan</label>
                            <div class="col-md-8">
                                <textarea name="keterangan4Edit" id="keterangan4Edit" class="form-control"></textarea>
                            </div>
                        </div>
                        <hr id="hr">
                        <table class="table table-condensed table-bordered" id="tabel-deskripsi">
                            <tr>
                                <th>Deskripsi Indikator 6</th>
                                <td>
                                    <input type="text" name="indikator4_6Edit" id="indikator4_6Edit" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 5</th>
                                <td>
                                    <input type="text" name="indikator4_5Edit" id="indikator4_5Edit" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 4</th>
                                <td>
                                    <input type="text" name="indikator4_4Edit" id="indikator4_4Edit" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 3</th>
                                <td>
                                    <input type="text" name="indikator4_3Edit" id="indikator4_3Edit" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 2</th>
                                <td>
                                    <input type="text" name="indikator4_2Edit" id="indikator4_2Edit" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 1</th>
                                <td>
                                    <input type="text" name="indikator4_1Edit" id="indikator4_1Edit" class="form-control" value="">
                                </td>
                            </tr>
                        </table>
                        <div class="form-group">
                            <div class="col-md-4">
                                {{csrf_field()}}
                                <input type="hidden" name="sender_id4Edit" id="sender_id4Edit" value="">
                                <input type="hidden" name="modal_tahun4Edit" value="{{$tahun}}">
                                <input type="hidden" name="modal_triwulan4Edit" value="" id="modal_triwulan4Edit">
                            </div>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-success pull-right" id="modal_simpan_baru4Edit">Simpan <i class="fa fa-save"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Baru 5 --}}
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
                            <label for="komponen_iku5" class="control-label col-md-4">Komponen Iku</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="komponen_iku5" value="Lomba Kreasi Kreatif">
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
                            <div class="col-md-2">
                                <div class="input-group">
                                    <input type="number" name="persen5" class="form-control" min="0" step="1" max="100" value="0" id="persen5">
                                    <span class="input-group-addon">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input_tipe2" class="control-label col-md-4">Input Nilai</label>
                            <div class="col-md-8">
                                <div class="col-md-9" id="radioContainer">
                                    <div class="radio">
                                        <label for="input_tipe5">
                                            <input type="radio" id="input_tipe5" name="input_tipe5" checked value="otomatis"> Manual
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
                                <input type="hidden" name="modal_tahun5" value="{{$tahun}}">
                                <input type="hidden" name="modal_triwulan5" value="" id="modal_triwulan5">
                            </div>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-success pull-right" id="modal_simpan_baru5">Simpan <i class="fa fa-save"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- EDIT 5 --}}
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal5Edit" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Indikator Pencapaian Lomba Kreasi Kreatif</h4>
                </div>
                <div class="modal-body">
                    <div class="text-center" id="loading5Edit">
                        <i class="fa fa-cog fa-3x fa-spin"></i>
                        <br>
                        Memuat...
                    </div>
                    <form class="form-horizontal" id="modal-form5Edit">
                        <div class="form-group">
                            <label for="komponen_iku5Edit" class="control-label col-md-4">Komponen Iku</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="komponen_iku5Edit" value="Lomba Kreasi Kreatif">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="periode5Edit" class="control-label col-md-4">Periode</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="periode5Edit">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="persen5Edit" class="control-label col-md-4">Persentase Nilai</label>
                            <div class="col-md-2">
                                <div class="input-group">
                                    <input type="number" name="persen5Edit" class="form-control" min="0" step="1" max="100" value="0" id="persen5Edit">
                                    <span class="input-group-addon">%</span>                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input_tipe5" class="control-label col-md-4">Input Nilai</label>
                            <div class="col-md-8">
                                <div class="col-md-9" id="radioContainer">
                                    <div class="radio">
                                        <label for="input_tipe5Edit">
                                            <input type="radio" id="input_tipe5Edit" name="input_tipe5Edit" checked value="manual"> Manual
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan5" class="control-label col-md-4">Keterangan</label>
                            <div class="col-md-8">
                                <textarea name="keterangan5Edit" id="keterangan5Edit" class="form-control"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-4">
                                {{csrf_field()}}
                                <input type="hidden" name="sender_id5Edit" id="sender_id5Edit" value="">
                                <input type="hidden" name="modal_tahun5Edit" value="{{$tahun}}">
                                <input type="hidden" name="modal_triwulan5Edit" value="" id="modal_triwulan5Edit">
                            </div>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-success pull-right" id="modal_simpan_baru5Edit">Simpan <i class="fa fa-save"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Baru 6 --}}
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
                                <input type="text" class="form-control" readonly id="komponen_iku6" value="Survei Budaya Internal">
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
                            <div class="col-md-2">
                                <div class="input-group">
                                    <input type="number" name="persen6" class="form-control" min="0" step="1" max="100" value="0" id="persen6">
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
                                <input type="hidden" name="modal_tahun6" value="{{$tahun}}">
                                <input type="hidden" name="modal_triwulan6" value="" id="modal_triwulan6">
                            </div>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-success pull-right" id="modal_simpan_baru6">Simpan <i class="fa fa-save"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- EDIT 6 --}}
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal6Edit" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Indikator Pencapaian Survei Budaya Internal</h4>
                </div>
                <div class="modal-body">
                    <div class="text-center" id="loading6Edit">
                        <i class="fa fa-cog fa-3x fa-spin"></i>
                        <br>
                        Memuat...
                    </div>
                    <form class="form-horizontal" id="modal-form6Edit">
                        <div class="form-group">
                            <label for="komponen_iku6Edit" class="control-label col-md-4">Komponen Iku</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="komponen_iku6Edit" value="Survei Budaya Internal">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="periode6Edit" class="control-label col-md-4">Periode</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="periode6Edit">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="persen6Edit" class="control-label col-md-4">Persentase Nilai</label>
                            <div class="col-md-2">
                                <div class="input-group">
                                    <input type="number" name="persen6Edit" class="form-control" min="0" step="1" max="100" value="0" id="persen6Edit">
                                    <span class="input-group-addon">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input_tipe6" class="control-label col-md-4">Input Nilai</label>
                            <div class="col-md-8">
                                <div class="col-md-9" id="radioContainer">
                                    <div class="radio">
                                        <label for="input_tipe6Edit">
                                            <input type="radio" id="input_tipe6Edit" name="input_tipe6Edit" checked value="manual"> Manual
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan6" class="control-label col-md-4">Keterangan</label>
                            <div class="col-md-8">
                                <textarea name="keterangan6Edit" id="keterangan6Edit" class="form-control"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-4">
                                {{csrf_field()}}
                                <input type="hidden" name="sender_id6Edit" id="sender_id6Edit" value="">
                                <input type="hidden" name="modal_tahun6Edit" value="{{$tahun}}">
                                <input type="hidden" name="modal_triwulan6Edit" value="" id="modal_triwulan6Edit">
                            </div>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-success pull-right" id="modal_simpan_baru6Edit">Simpan <i class="fa fa-save"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Baru 7 --}}
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
                            <label for="komponen_iku7" class="control-label col-md-4">Komponen Iku</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="komponen_iku7" value="Survei Budaya Eksternal">
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
                            <div class="col-md-2">
                                <div class="input-group">
                                    <input type="number" name="persen7" class="form-control" min="0" step="1" max="100" value="0" id="persen7">
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
                                <input type="hidden" name="modal_tahun7" value="{{$tahun}}">
                                <input type="hidden" name="modal_triwulan7" value="" id="modal_triwulan7">
                            </div>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-success pull-right" id="modal_simpan_baru7">Simpan <i class="fa fa-save"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- EDIT 7 --}}
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal7Edit" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Indikator Pencapaian Survei Budaya Eksternal</h4>
                </div>
                <div class="modal-body">
                    <div class="text-center" id="loading7Edit">
                        <i class="fa fa-cog fa-3x fa-spin"></i>
                        <br>
                        Memuat...
                    </div>
                    <form class="form-horizontal" id="modal-form7Edit">
                        <div class="form-group">
                            <label for="komponen_iku7Edit" class="control-label col-md-4">Komponen Iku</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="komponen_iku7Edit" value="Survei Budaya Eksternal">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="periode7Edit" class="control-label col-md-4">Periode</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="periode7Edit">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="persen7Edit" class="control-label col-md-4">Persentase Nilai</label>
                            <div class="col-md-2">
                                <div class="input-group">
                                    <input type="number" name="persen7Edit" class="form-control" min="0" step="1" max="100" value="0" id="persen7Edit">
                                    <span class="input-group-addon">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input_tipe7" class="control-label col-md-4">Input Nilai</label>
                            <div class="col-md-8">
                                <div class="col-md-9" id="radioContainer">
                                    <div class="radio">
                                        <label for="input_tipe7Edit">
                                            <input type="radio" id="input_tipe7Edit" name="input_tipe7Edit" checked value="manual"> Manual
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan7" class="control-label col-md-4">Keterangan</label>
                            <div class="col-md-8">
                                <textarea name="keterangan7Edit" id="keterangan7Edit" class="form-control"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-4">
                                {{csrf_field()}}
                                <input type="hidden" name="sender_id7Edit" id="sender_id7Edit" value="">
                                <input type="hidden" name="modal_tahun7Edit" value="{{$tahun}}">
                                <input type="hidden" name="modal_triwulan7Edit" value="" id="modal_triwulan7Edit">
                            </div>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-success pull-right" id="modal_simpan_baru7Edit">Simpan <i class="fa fa-save"></i></button>
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

                    @forelse($komponenIku as $k => $v)
                        <tr>
                            <th>{{$v->name}}</th>
                            @php

                                // $touch1 = $v->iku->where('tahun', $tahun)->where('triwulan', 1)->touch();
                                // $touch2 = $v->iku->where('tahun', $tahun)->where('triwulan', 2)->touch();
                                // $touch3 = $v->iku->where('tahun', $tahun)->where('triwulan', 3)->touch();
                                // $touch4 = $v->iku->where('tahun', $tahun)->where('triwulan', 4)->touch();

                                $inputValue1 = $v->iku->where('tahun', $tahun)->where('triwulan', 1)->sum('persen');
                                $inputValue2 = $v->iku->where('tahun', $tahun)->where('triwulan', 2)->sum('persen');
                                $inputValue3 = $v->iku->where('tahun', $tahun)->where('triwulan', 3)->sum('persen');
                                $inputValue4 = $v->iku->where('tahun', $tahun)->where('triwulan', 4)->sum('persen');

                                if ($v->id == 3) {
                                    $dataId1 = 'special';
                                    $dataId2 = 'special';
                                    $dataId3 = 'special';
                                    $dataId4 = 'special';
                                    
                                    $inputValue1 = $v->iku->where('tahun', $tahun)->where('triwulan', 1)->sum('persen') / 4;
                                    $inputValue2 = $v->iku->where('tahun', $tahun)->where('triwulan', 2)->sum('persen') / 4;
                                    $inputValue3 = $v->iku->where('tahun', $tahun)->where('triwulan', 3)->sum('persen') / 4;
                                    $inputValue4 = $v->iku->where('tahun', $tahun)->where('triwulan', 4)->sum('persen') / 4;
                                }else{
                                    //Triwulan 1
                                    $iku1 = $v->iku->where('tahun', $tahun)->where('triwulan', 1)->first(); 
                                    if (count($iku1) == 1) {
                                        $dataId1 = $iku1->hashid;
                                    }else{
                                        $dataId1 = 0;
                                    }
                                    //Triwulan 2
                                    $iku2 = $v->iku->where('tahun', $tahun)->where('triwulan', 2)->first(); 
                                    if (count($iku2) == 1) {
                                        $dataId2 = $iku2->hashid;
                                    }else{
                                        $dataId2 = 0;
                                    }
                                    //Triwulan 3
                                    $iku3 = $v->iku->where('tahun', $tahun)->where('triwulan', 3)->first(); 
                                    if (count($iku3) == 1) {
                                        $dataId3 = $iku3->hashid;
                                    }else{
                                        $dataId3 = 0;
                                    }
                                    //Triwulan 4
                                    $iku4 = $v->iku->where('tahun', $tahun)->where('triwulan', 4)->first(); 
                                    if (count($iku4) == 1) {
                                        $dataId4 = $iku4->hashid;
                                    }else{
                                        $dataId4 = 0;
                                    }
                                }
                            @endphp
                                
                            <td>
                                <input 
                                    type="text"
                                    name="tw1"
                                    id="i{{$v->id}}_1" 
                                    class="form-control kol"
                                    data-id="{{$dataId1}}"
                                    data-triwulan="1"
                                    data-component="{{$v->id}}"
                                    data-component-nama="{{$v->name}}"
                                    value="{{$inputValue1}} %"
                                    @if($v->id == 3)
                                        data-html="true"
                                        data-toggle="popover"
                                        data-placement="left"
                                        data-content="
                                            <button class='btn btn-primary ojk-melayani'>OJK Melayani</button><br>
                                            <button class='btn btn-warning ojk-peduli'>OJK Peduli</button><br>
                                            <button class='btn btn-danger ojk-inovatif'>OJK Inovatif</button>"
                                    @endif
                                    
                                    readonly
                                >
                            </td>
                            <td>
                                <input 
                                    type="text"
                                    name="tw2"
                                    id="i{{$v->id}}_2" 
                                    class="form-control kol"
                                    data-id="{{$dataId2}}"
                                    data-triwulan="2"
                                    data-component="{{$v->id}}"
                                    data-component-nama="{{$v->name}}"
                                    value="{{$inputValue2}} %"
                                    @if($v->id == 3)
                                        data-html="true"
                                        data-toggle="popover"
                                        data-placement="left"
                                        data-content="
                                            <button class='btn btn-primary ojk-melayani'>OJK Melayani</button><br>
                                            <button class='btn btn-warning ojk-peduli'>OJK Peduli</button><br>
                                            <button class='btn btn-danger ojk-inovatif'>OJK Inovatif</button>"
                                    @endif
                                    
                                    readonly
                                >
                            </td>
                            <td>
                                <input 
                                    type="text"
                                    name="tw3"
                                    id="i{{$v->id}}_3" 
                                    class="form-control kol"
                                    data-id="{{$dataId3}}"
                                    data-triwulan="3"
                                    data-component="{{$v->id}}"
                                    data-component-nama="{{$v->name}}"
                                    value="{{$inputValue3}} %"
                                    @if($v->id == 3)
                                        data-html="true"
                                        data-toggle="popover"
                                        data-placement="left"
                                        data-content="
                                            <button class='btn btn-primary ojk-melayani'>OJK Melayani</button><br>
                                            <button class='btn btn-warning ojk-peduli'>OJK Peduli</button><br>
                                            <button class='btn btn-danger ojk-inovatif'>OJK Inovatif</button>"
                                    @endif
                                    readonly
                                >
                            </td>
                            <td>
                                <input 
                                    type="text"
                                    name="tw4"
                                    id="i{{$v->id}}_4" 
                                    class="form-control kol"
                                    data-id="{{$dataId4}}"
                                    data-triwulan="4"
                                    data-component="{{$v->id}}"
                                    data-component-nama="{{$v->name}}"
                                    value="{{$inputValue4}} %"
                                    @if($v->id == 3)
                                        data-html="true"
                                        data-toggle="popover"
                                        data-placement="left"
                                        data-content="
                                            <button class='btn btn-primary ojk-melayani'>OJK Melayani</button><br>
                                            <button class='btn btn-warning ojk-peduli'>OJK Peduli</button><br>
                                            <button class='btn btn-danger ojk-inovatif'>OJK Inovatif</button>"
                                    @endif
                                    
                                    readonly
                                >
                            </td>
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
            
            $("[data-toggle=popover]").popover();
        });

        $('.kol').on('click', function(){
            $("[data-toggle=popover]").popover('hide');
            let t = $(this);

            if (t.attr('data-id') == 'special') {
                return false;
            } else if(t.attr('data-id') == 0){
                if (t.attr('data-component') == 1) {
                    $('#periode1').val('').val('Triwulan ' + t.attr('data-triwulan'));
                    $('#persen1').val('').val(0);
                    $('#sender_id1').val('').val(t.attr('id'));
                    $('#keterangan1').val('');
                    $('#modal_triwulan1').val('').val(t.attr('data-triwulan'));
                    $('[id^=indikator1_]').val('').prop('readonly', false);

                    $('#modal1').modal('show');
                }else if(t.attr('data-component') == 2){
                    $('#periode2').val('').val('Triwulan ' + t.attr('data-triwulan'));
                    $('#persen2').val('').val(0);
                    $('#sender_id2').val('').val(t.attr('id'));
                    $('#keterangan2').val('');
                    $('#modal_triwulan2').val('').val(t.attr('data-triwulan'));
                    $('[id^=indikator1_]').val('').prop('readonly', false);

                    $('#modal2').modal('show');
                }else if(t.attr('data-component') == 4){
                    $('#periode4').val('').val('Triwulan ' + t.attr('data-triwulan'));
                    $('#persen4').val('').val(0);
                    $('#sender_id4').val('').val(t.attr('id'));
                    $('#keterangan4').val('');
                    $('#modal_triwulan4').val('').val(t.attr('data-triwulan'));
                    $('[id^=indikator4_]').val('').prop('readonly', false);

                    $('#modal4').modal('show');
                }else if(t.attr('data-component') == 5){
                    $('#periode5').val('').val('Triwulan ' + t.attr('data-triwulan'));
                    $('#persen5').val('').val(0);
                    $('#sender_id5').val('').val(t.attr('id'));
                    $('#keterangan5').val('');
                    $('#modal_triwulan5').val('').val(t.attr('data-triwulan'));

                    $('#modal5').modal('show');
                }else if(t.attr('data-component') == 6){
                    $('#periode6').val('').val('Triwulan ' + t.attr('data-triwulan'));
                    $('#persen6').val('').val(0);
                    $('#sender_id6').val('').val(t.attr('id'));
                    $('#keterangan6').val('');
                    $('#modal_triwulan6').val('').val(t.attr('data-triwulan'));

                    $('#modal6').modal('show');
                }else if(t.attr('data-component') == 7){
                    $('#periode7').val('').val('Triwulan ' + t.attr('data-triwulan'));
                    $('#persen7').val('').val(0);
                    $('#sender_id7').val('').val(t.attr('id'));
                    $('#keterangan7').val('');
                    $('#modal_triwulan7').val('').val(t.attr('data-triwulan'));

                    $('#modal7').modal('show');
                }
            } else {
                if (t.attr('data-component') == 1) {
                    $.ajax({
                        url: '{{url('iku/detail/')}}/' + t.attr('data-id'),
                        type: 'GET',
                        dataType: 'JSON',
                        beforeSend: function() {
                            $('#periode1Edit').val('').val('Triwulan ' + t.attr('data-triwulan'));
                            $('#persen1Edit').val('').val(0);
                            $('#sender_id1Edit').val('').val(t.attr('id'));
                            $('#keterangan1Edit').val('').prop('readonly', false);
                            $('#modal_triwulan1Edit').val('').val(t.attr('data-triwulan'));
                            $('[id^=indikator1_]').val('').prop('readonly', false);

                            $('#modal-form1Edit').hide();
                            $('#loading1Edit').show();
                        },
                        success: function(response) {
                            if (response.status) {
                                $('#periode1Edit').val('').val('Triwulan ' + t.attr('data-triwulan'));
                                $('#persen1Edit').val('').val(response.data.persen).prop('readonly', false);
                                $('#sender_id1Edit').val('').val(t.attr('id'));
                                $('#keterangan1Edit').val(response.data.keterangan);
                                $('#modal_triwulan1Edit').val('').val(t.attr('data-triwulan'));

                                
                                console.log(response);
                                if ($.isArray(response.data.indikator)) {
                                    $.each(response.data.indikator, function(k, v) {
                                       $('#indikator1_' + (k+1) + 'Edit').val(v.deskripsi);
                                       console.log(k);
                                    });
                                }

                                $('#loading1Edit').hide();
                                $('#modal-form1Edit').show();
                            }else{
                                alert('Ups terjadi kesalahan');
                                $('#modal1Edit').modal('hide');
                            }
                        },
                        error: function(response) {
                            alert('Ups terjadi kesalahan');
                            $('#modal1Edit').modal('hide');
                        }
                    });
                    
                    $('#modal1Edit').modal('show');
                } else if (t.attr('data-component') == 2) {
                    $.ajax({
                        url: '{{url('iku/detail/')}}/' + t.attr('data-id'),
                        type: 'GET',
                        dataType: 'JSON',
                        beforeSend: function() {
                            $('#periode2Edit').val('').val('Triwulan ' + t.attr('data-triwulan'));
                            $('#persen2Edit').val('').val(0);
                            $('#sender_id2Edit').val('').val(t.attr('id'));
                            $('#keterangan2Edit').val('').prop('readonly', false);
                            $('#modal_triwulan2Edit').val('').val(t.attr('data-triwulan'));
                            $('[id^=indikator2_]').val('').prop('readonly', false);

                            $('#modal-form2Edit').hide();
                            $('#loading2Edit').show();
                        },
                        success: function(response) {
                            if (response.status) {
                                $('#periode2Edit').val('').val('Triwulan ' + t.attr('data-triwulan'));
                                $('#persen2Edit').val('').val(response.data.persen).prop('readonly', false);
                                $('#sender_id2Edit').val('').val(t.attr('id'));
                                $('#keterangan2Edit').val(response.data.keterangan);
                                $('#modal_triwulan2Edit').val('').val(t.attr('data-triwulan'));

                                
                                console.log(response);
                                if ($.isArray(response.data.indikator)) {
                                    $.each(response.data.indikator, function(k, v) {
                                       $('#indikator2_' + (k+1) + 'Edit').val(v.deskripsi);
                                       console.log(k);
                                    });
                                }

                                $('#loading2Edit').hide();
                                $('#modal-form2Edit').show();
                            }else{
                                alert('Ups terjadi kesalahan');
                                $('#modal2Edit').modal('hide');
                            }
                        },
                        error: function(response) {
                            alert('Ups terjadi kesalahan');
                            $('#modal2Edit').modal('hide');
                        }
                    });
                    
                    $('#modal2Edit').modal('show');
                } else if (t.attr('data-component') == 4) {
                    $.ajax({
                        url: '{{url('iku/detail/')}}/' + t.attr('data-id'),
                        type: 'GET',
                        dataType: 'JSON',
                        beforeSend: function() {
                            $('#periode4Edit').val('').val('Triwulan ' + t.attr('data-triwulan'));
                            $('#persen4Edit').val('').val(0);
                            $('#sender_id4Edit').val('').val(t.attr('id'));
                            $('#keterangan4Edit').val('').prop('readonly', false);
                            $('#modal_triwulan4Edit').val('').val(t.attr('data-triwulan'));
                            $('[id^=indikator4_]').val('').prop('readonly', false);

                            $('#modal-form4Edit').hide();
                            $('#loading4Edit').show();
                        },
                        success: function(response) {
                            if (response.status) {
                                $('#periode4Edit').val('').val('Triwulan ' + t.attr('data-triwulan'));
                                $('#persen4Edit').val('').val(response.data.persen).prop('readonly', false);
                                $('#sender_id4Edit').val('').val(t.attr('id'));
                                $('#keterangan4Edit').val(response.data.keterangan);
                                $('#modal_triwulan4Edit').val('').val(t.attr('data-triwulan'));

                                
                                console.log(response);
                                if ($.isArray(response.data.indikator)) {
                                    $.each(response.data.indikator, function(k, v) {
                                       $('#indikator4_' + (k+1) + 'Edit').val(v.deskripsi);
                                       console.log(k);
                                    });
                                }

                                $('#loading4Edit').hide();
                                $('#modal-form4Edit').show();
                            }else{
                                alert('Ups terjadi kesalahan');
                                $('#modal4Edit').modal('hide');
                            }
                        },
                        error: function(response) {
                            alert('Ups terjadi kesalahan');
                            $('#modal4Edit').modal('hide');
                        }
                    });
                    
                    $('#modal4Edit').modal('show');
                } else if (t.attr('data-component') == 5) {
                    $.ajax({
                        url: '{{url('iku/detail/')}}/' + t.attr('data-id'),
                        type: 'GET',
                        dataType: 'JSON',
                        beforeSend: function() {
                            $('#periode5Edit').val('').val('Triwulan ' + t.attr('data-triwulan'));
                            $('#persen5Edit').val('').val(0);
                            $('#sender_id5Edit').val('').val(t.attr('id'));
                            $('#keterangan5Edit').val('').prop('readonly', false);
                            $('#modal_triwulan5Edit').val('').val(t.attr('data-triwulan'));

                            $('#modal-form5Edit').hide();
                            $('#loading5Edit').show();
                        },
                        success: function(response) {
                            if (response.status) {
                                $('#periode5Edit').val('').val('Triwulan ' + t.attr('data-triwulan'));
                                $('#persen5Edit').val('').val(response.data.persen).prop('readonly', false);
                                $('#sender_id5Edit').val('').val(t.attr('id'));
                                $('#keterangan5Edit').val(response.data.keterangan);
                                $('#modal_triwulan5Edit').val('').val(t.attr('data-triwulan'));
                                console.log(response);

                                $('#loading5Edit').hide();
                                $('#modal-form5Edit').show();
                            }else{
                                alert('Ups terjadi kesalahan');
                                $('#modal5Edit').modal('hide');
                            }
                        },
                        error: function(response) {
                            alert('Ups terjadi kesalahan');
                            $('#modal5Edit').modal('hide');
                        }
                    });
                    
                    $('#modal5Edit').modal('show');
                } else if (t.attr('data-component') == 6) {
                    $.ajax({
                        url: '{{url('iku/detail/')}}/' + t.attr('data-id'),
                        type: 'GET',
                        dataType: 'JSON',
                        beforeSend: function() {
                            $('#periode6Edit').val('').val('Triwulan ' + t.attr('data-triwulan'));
                            $('#persen6Edit').val('').val(0);
                            $('#sender_id6Edit').val('').val(t.attr('id'));
                            $('#keterangan6Edit').val('').prop('readonly', false);
                            $('#modal_triwulan6Edit').val('').val(t.attr('data-triwulan'));

                            $('#modal-form6Edit').hide();
                            $('#loading6Edit').show();
                        },
                        success: function(response) {
                            if (response.status) {
                                $('#periode6Edit').val('').val('Triwulan ' + t.attr('data-triwulan'));
                                $('#persen6Edit').val('').val(response.data.persen).prop('readonly', false);
                                $('#sender_id6Edit').val('').val(t.attr('id'));
                                $('#keterangan6Edit').val(response.data.keterangan);
                                $('#modal_triwulan6Edit').val('').val(t.attr('data-triwulan'));
                                console.log(response);

                                $('#loading6Edit').hide();
                                $('#modal-form6Edit').show();
                            }else{
                                alert('Ups terjadi kesalahan');
                                $('#modal6Edit').modal('hide');
                            }
                        },
                        error: function(response) {
                            alert('Ups terjadi kesalahan');
                            $('#modal6Edit').modal('hide');
                        }
                    });
                    
                    $('#modal6Edit').modal('show');
                } else if (t.attr('data-component') == 7) {
                    $.ajax({
                        url: '{{url('iku/detail/')}}/' + t.attr('data-id'),
                        type: 'GET',
                        dataType: 'JSON',
                        beforeSend: function() {
                            $('#periode7Edit').val('').val('Triwulan ' + t.attr('data-triwulan'));
                            $('#persen7Edit').val('').val(0);
                            $('#sender_id7Edit').val('').val(t.attr('id'));
                            $('#keterangan7Edit').val('').prop('readonly', false);
                            $('#modal_triwulan7Edit').val('').val(t.attr('data-triwulan'));

                            $('#modal-form7Edit').hide();
                            $('#loading7Edit').show();
                        },
                        success: function(response) {
                            if (response.status) {
                                $('#periode7Edit').val('').val('Triwulan ' + t.attr('data-triwulan'));
                                $('#persen7Edit').val('').val(response.data.persen).prop('readonly', false);
                                $('#sender_id7Edit').val('').val(t.attr('id'));
                                $('#keterangan7Edit').val(response.data.keterangan);
                                $('#modal_triwulan7Edit').val('').val(t.attr('data-triwulan'));
                                console.log(response);

                                $('#loading7Edit').hide();
                                $('#modal-form7Edit').show();
                            }else{
                                alert('Ups terjadi kesalahan');
                                $('#modal7Edit').modal('hide');
                            }
                        },
                        error: function(response) {
                            alert('Ups terjadi kesalahan');
                            $('#modal7Edit').modal('hide');
                        }
                    });
                    
                    $('#modal7Edit').modal('show');
                }
            }
        });

        // Baru 1
        $('#modal_simpan_baru1').on('click', function() {
            let s1 = $(this);
            let sender_id = $('#sender_id1').val();
            var sender = $('#' + sender_id);

            if ($('#indikator1_6').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator1_6').focus();

                return false;
            }

            if ($('#indikator1_5').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator1_5').focus();
                
                return false;
            }

            if ($('#indikator1_4').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator1_4').focus();
                
                return false;
            }

            if ($('#indikator1_3').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator1_3').focus();
                
                return false;
            }
            
            if ($('#indikator1_2').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator1_2').focus();
                
                return false;
            }

            if ($('#indikator1_1').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator1_1').focus();
                
                return false;
            }

            $.ajax({
                url: '{{url('ikuBaru1')}}',
                data: $('#modal-form1').serialize(),
                type: 'POST',
                dataType: 'JSON',
                beforeSend: function(){
                    s1.html('<i class="fa fa-cog fa-spin"></i> Memuat...').prop('disabled', true);
                    $('#keterangan1, #persen1, [id^=indikator1_]').prop('readonly', true);
                },
                success: function(response){
                    if (response.status) {
                        sender.attr('data-id', response.data.hashid).val(response.data.persen + ' %');
                        $('#modal1').modal('hide');
                    }else{
                        alert(response.message);
                        $('#persen1').focus();
                    }
                    s1.prop('disabled', false).html('Simpan <i class="fa fa-save"></i>');
                    $('#keterangan1, #persen1, [id^=indikator1_]').prop('readonly', false);
                }
            });
        });
        //Edit1
        $('#modal_simpan_baru1Edit').on('click', function() {
            let s1 = $(this);
            let sender_id = $('#sender_id1Edit').val();
            var sender = $('#' + sender_id);

            if ($('#indikator1_6Edit').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator1_6Edit').focus();

                return false;
            }

            if ($('#indikator1_5Edit').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator1_5Edit').focus();
                
                return false;
            }

            if ($('#indikator1_4Edit').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator1_4Edit').focus();
                
                return false;
            }

            if ($('#indikator1_3Edit').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator1_3Edit').focus();
                
                return false;
            }
            
            if ($('#indikator1_2Edit').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator1_2Edit').focus();
                
                return false;
            }

            if ($('#indikator1_1Edit').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator1_1Edit').focus();
                
                return false;
            }

            $.ajax({
                url: '{{url('ikuEdit1')}}',
                data: $('#modal-form1Edit').serialize() + '&hashid=' + sender.attr('data-id'),
                type: 'POST',
                dataType: 'JSON',
                beforeSend: function(){
                    s1.html('<i class="fa fa-cog fa-spin"></i> Memuat...').prop('disabled', true);
                    $('#keterangan1Edit, #persen1Edit, [id^=indikator1_]').prop('readonly', true);
                },
                success: function(response){
                    if (response.status) {
                        sender.attr('data-id', response.data.hashid).val(response.data.persen + ' %');
                        $('#modal1Edit').modal('hide');
                    }else{
                        alert(response.message);
                        $('#keterangan1Edit, #persen1Edit, [id^=indikator1_]').prop('readonly', false);
                        $('#persen1Edit').focus();

                    }
                    s1.prop('disabled', false).html('Simpan <i class="fa fa-save"></i>');
                    $('#keterangan1, #persen1, [id^=indikator1_]').prop('readonly', false);
                }
            });
        });

        // Baru 2
        $('#modal_simpan_baru2').on('click', function() {
            let s2 = $(this);
            let sender_id = $('#sender_id2').val();
            var sender = $('#' + sender_id);

            if ($('#indikator2_6').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator2_6').focus();

                return false;
            }

            if ($('#indikator2_5').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator2_5').focus();
                
                return false;
            }

            if ($('#indikator2_4').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator2_4').focus();
                
                return false;
            }

            if ($('#indikator2_3').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator2_3').focus();
                
                return false;
            }
            
            if ($('#indikator2_2').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator2_2').focus();
                
                return false;
            }

            if ($('#indikator2_1').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator2_1').focus();
                
                return false;
            }

            $.ajax({
                url: '{{url('ikuBaru2')}}',
                data: $('#modal-form2').serialize(),
                type: 'POST',
                dataType: 'JSON',
                beforeSend: function(){
                    s2.html('<i class="fa fa-cog fa-spin"></i> Memuat...').prop('disabled', true);
                    $('#keterangan2, #persen2, [id^=indikator2_]').prop('readonly', true);
                },
                success: function(response){
                    if (response.status) {
                        sender.attr('data-id', response.data.hashid).val(response.data.persen + ' %');
                        $('#modal2').modal('hide');
                    }else{
                        alert(response.message);
                        $('#persen2').focus();
                    }
                    s2.prop('disabled', false).html('Simpan <i class="fa fa-save"></i>');
                    $('#keterangan2, #persen2, [id^=indikator2_]').prop('readonly', false);
                }
            });
        });
        //Edit2
        $('#modal_simpan_baru2Edit').on('click', function() {
            let s2 = $(this);
            let sender_id = $('#sender_id2Edit').val();
            var sender = $('#' + sender_id);

            if ($('#indikator2_6Edit').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator2_6Edit').focus();

                return false;
            }

            if ($('#indikator2_5Edit').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator2_5Edit').focus();
                
                return false;
            }

            if ($('#indikator2_4Edit').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator2_4Edit').focus();
                
                return false;
            }

            if ($('#indikator2_3Edit').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator2_3Edit').focus();
                
                return false;
            }
            
            if ($('#indikator2_2Edit').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator2_2Edit').focus();
                
                return false;
            }

            if ($('#indikator2_1Edit').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator2_1Edit').focus();
                
                return false;
            }

            $.ajax({
                url: '{{url('ikuEdit2')}}',
                data: $('#modal-form2Edit').serialize() + '&hashid=' + sender.attr('data-id'),
                type: 'POST',
                dataType: 'JSON',
                beforeSend: function(){
                    s2.html('<i class="fa fa-cog fa-spin"></i> Memuat...').prop('disabled', true);
                    $('#keterangan2Edit, #persen2Edit, [id^=indikator2_]').prop('readonly', true);
                },
                success: function(response){
                    if (response.status) {
                        sender.attr('data-id', response.data.hashid).val(response.data.persen + ' %');
                        $('#modal2Edit').modal('hide');
                    }else{
                        alert(response.message);
                        $('#keterangan2Edit, #persen2Edit, [id^=indikator2_]').prop('readonly', false);
                        $('#persen2Edit').focus();

                    }
                    s2.prop('disabled', false).html('Simpan <i class="fa fa-save"></i>');
                    $('#keterangan2, #persen2, [id^=indikator2_]').prop('readonly', false);
                }
            });
        });

        // Baru 4
        $('#modal_simpan_baru4').on('click', function() {
            let s4 = $(this);
            let sender_id = $('#sender_id4').val();
            var sender = $('#' + sender_id);

            if ($('#indikator4_6').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator4_6').focus();

                return false;
            }

            if ($('#indikator4_5').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator4_5').focus();
                
                return false;
            }

            if ($('#indikator4_4').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator4_4').focus();
                
                return false;
            }

            if ($('#indikator4_3').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator4_3').focus();
                
                return false;
            }
            
            if ($('#indikator4_2').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator4_2').focus();
                
                return false;
            }

            if ($('#indikator4_1').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator4_1').focus();
                
                return false;
            }

            $.ajax({
                url: '{{url('ikuBaru4')}}',
                data: $('#modal-form4').serialize(),
                type: 'POST',
                dataType: 'JSON',
                beforeSend: function(){
                    s4.html('<i class="fa fa-cog fa-spin"></i> Memuat...').prop('disabled', true);
                    $('#keterangan4, #persen4, [id^=indikator4_]').prop('readonly', true);
                },
                success: function(response){
                    if (response.status) {
                        sender.attr('data-id', response.data.hashid).val(response.data.persen + ' %');
                        $('#modal4').modal('hide');
                    }else{
                        alert(response.message);
                        $('#persen4').focus();
                    }
                    s4.prop('disabled', false).html('Simpan <i class="fa fa-save"></i>');
                    $('#keterangan4, #persen4, [id^=indikator4_]').prop('readonly', false);
                }
            });
        });
        //Edit4
        $('#modal_simpan_baru4Edit').on('click', function() {
            let s4 = $(this);
            let sender_id = $('#sender_id4Edit').val();
            var sender = $('#' + sender_id);

            if ($('#indikator4_6Edit').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator4_6Edit').focus();

                return false;
            }

            if ($('#indikator4_5Edit').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator4_5Edit').focus();
                
                return false;
            }

            if ($('#indikator4_4Edit').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator4_4Edit').focus();
                
                return false;
            }

            if ($('#indikator4_3Edit').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator4_3Edit').focus();
                
                return false;
            }
            
            if ($('#indikator4_2Edit').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator4_2Edit').focus();
                
                return false;
            }

            if ($('#indikator4_1Edit').val().length < 1) {
                alert('Harap isi semua indikator');
                $('#indikator4_1Edit').focus();
                
                return false;
            }

            $.ajax({
                url: '{{url('ikuEdit4')}}',
                data: $('#modal-form4Edit').serialize() + '&hashid=' + sender.attr('data-id'),
                type: 'POST',
                dataType: 'JSON',
                beforeSend: function(){
                    s4.html('<i class="fa fa-cog fa-spin"></i> Memuat...').prop('disabled', true);
                    $('#keterangan4Edit, #persen4Edit, [id^=indikator4_]').prop('readonly', true);
                },
                success: function(response){
                    if (response.status) {
                        sender.attr('data-id', response.data.hashid).val(response.data.persen + ' %');
                        $('#modal4Edit').modal('hide');
                    }else{
                        alert(response.message);
                        $('#keterangan4Edit, #persen4Edit, [id^=indikator4_]').prop('readonly', false);
                        $('#persen4Edit').focus();

                    }
                    s4.prop('disabled', false).html('Simpan <i class="fa fa-save"></i>');
                    $('#keterangan4, #persen4, [id^=indikator4_]').prop('readonly', false);
                }
            });
        });

        // Baru 5
        $('#modal_simpan_baru5').on('click', function() {
            let s5 = $(this);
            let sender_id = $('#sender_id5').val();
            var sender = $('#' + sender_id);


            $.ajax({
                url: '{{url('ikuBaru5')}}',
                data: $('#modal-form5').serialize(),
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
                        $('#persen6').focus();
                    }
                    s5.prop('disabled', false).html('Simpan <i class="fa fa-save"></i>');
                    $('#keterangan5, #persen5').prop('readonly', false);
                }
            });
        });
        //Edit5
        $('#modal_simpan_baru5Edit').on('click', function() {
            let s5 = $(this);
            let sender_id = $('#sender_id5Edit').val();
            var sender = $('#' + sender_id);

            $.ajax({
                url: '{{url('ikuEdit5')}}',
                data: $('#modal-form5Edit').serialize() + '&hashid=' + sender.attr('data-id'),
                type: 'POST',
                dataType: 'JSON',
                beforeSend: function(){
                    s5.html('<i class="fa fa-cog fa-spin"></i> Memuat...').prop('disabled', true);
                    $('#keterangan5Edit, #persen5Edit').prop('readonly', true);
                },
                success: function(response){
                    if (response.status) {
                        sender.attr('data-id', response.data.hashid).val(response.data.persen + ' %');
                        $('#modal5Edit').modal('hide');
                    }else{
                        alert(response.message);
                        $('#keterangan5Edit, #persen5Edit').prop('readonly', false);
                        $('#persen5Edit').focus();
                    }
                    s5.prop('disabled', false).html('Simpan <i class="fa fa-save"></i>');
                    $('#keterangan5, #persen5').prop('readonly', false);
                }
            });
        });

        // Baru 6
        $('#modal_simpan_baru6').on('click', function() {
            let s6 = $(this);
            let sender_id = $('#sender_id6').val();
            var sender = $('#' + sender_id);

            $.ajax({
                url: '{{url('ikuBaru6')}}',
                data: $('#modal-form6').serialize(),
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
                        $('#persen6').focus();
                    }
                    s6.prop('disabled', false).html('Simpan <i class="fa fa-save"></i>');
                    $('#keterangan6, #persen6').prop('readonly', false);
                }
            });
        });
        //Edit6
        $('#modal_simpan_baru6Edit').on('click', function() {
            let s6 = $(this);
            let sender_id = $('#sender_id6Edit').val();
            var sender = $('#' + sender_id);

            $.ajax({
                url: '{{url('ikuEdit6')}}',
                data: $('#modal-form6Edit').serialize() + '&hashid=' + sender.attr('data-id'),
                type: 'POST',
                dataType: 'JSON',
                beforeSend: function(){
                    s6.html('<i class="fa fa-cog fa-spin"></i> Memuat...').prop('disabled', true);
                    $('#keterangan6Edit, #persen6Edit').prop('readonly', true);
                },
                success: function(response){
                    if (response.status) {
                        sender.attr('data-id', response.data.hashid).val(response.data.persen + ' %');
                        $('#modal6Edit').modal('hide');
                    }else{
                        alert(response.message);
                        $('#keterangan6Edit, #persen6Edit').prop('readonly', false);
                        $('#persen6Edit').focus();
                    }
                    s6.prop('disabled', false).html('Simpan <i class="fa fa-save"></i>');
                    $('#keterangan6, #persen6').prop('readonly', false);
                }
            });
        });

        // Baru 7
        $('#modal_simpan_baru7').on('click', function() {
            let s7 = $(this);
            let sender_id = $('#sender_id7').val();
            var sender = $('#' + sender_id);

            $.ajax({
                url: '{{url('ikuBaru7')}}',
                data: $('#modal-form7').serialize(),
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
                        $('#persen7').focus();
                    }
                    s7.prop('disabled', false).html('Simpan <i class="fa fa-save"></i>');
                    $('#keterangan7, #persen7').prop('readonly', false);
                }
            });
        });
        //Edit6
        $('#modal_simpan_baru7Edit').on('click', function() {
            let s7 = $(this);
            let sender_id = $('#sender_id7Edit').val();
            var sender = $('#' + sender_id);

            $.ajax({
                url: '{{url('ikuEdit7')}}',
                data: $('#modal-form7Edit').serialize() + '&hashid=' + sender.attr('data-id'),
                type: 'POST',
                dataType: 'JSON',
                beforeSend: function(){
                    s7.html('<i class="fa fa-cog fa-spin"></i> Memuat...').prop('disabled', true);
                    $('#keterangan7Edit, #persen7Edit').prop('readonly', true);
                },
                success: function(response){
                    if (response.status) {
                        sender.attr('data-id', response.data.hashid).val(response.data.persen + ' %');
                        $('#modal7Edit').modal('hide');
                    }else{
                        alert(response.message);
                        $('#keterangan7Edit, #persen7Edit').prop('readonly', false);
                        $('#persen7Edit').focus();
                    }
                    s6.prop('disabled', false).html('Simpan <i class="fa fa-save"></i>');
                    $('#keterangan7, #persen7').prop('readonly', false);
                }
            });
        });

    </script>
@endsection