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
                            <label for="komponen_iku1" class="control-label col-md-4">Komponen Iku</label>
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
                                            <input type="radio" id="input_tipe1" name="input_tipe1" checked value="otomatis"> Parameterize
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
                                    <input type="text" name="definisi1_6" id="definisi1_6" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 5</th>
                                <td>
                                    <input type="text" name="definisi1_5" id="definisi1_5" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 4</th>
                                <td>
                                    <input type="text" name="definisi1_4" id="definisi1_4" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 3</th>
                                <td>
                                    <input type="text" name="definisi1_3" id="definisi1_3" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 2</th>
                                <td>
                                    <input type="text" name="definisi1_2" id="definisi1_2" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 1</th>
                                <td>
                                    <input type="text" name="definisi1_1" id="definisi1_1" class="form-control" value="">
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
                            <label for="komponen_iku2" class="control-label col-md-4">Komponen Iku</label>
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
                                    <input type="text" name="definisi2_6" id="definisi2_6" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 5</th>
                                <td>
                                    <input type="text" name="definisi2_5" id="definisi2_5" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 4</th>
                                <td>
                                    <input type="text" name="definisi2_4" id="definisi2_4" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 3</th>
                                <td>
                                    <input type="text" name="definisi2_3" id="definisi2_3" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 2</th>
                                <td>
                                    <input type="text" name="definisi2_2" id="definisi2_2" class="form-control" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi Indikator 1</th>
                                <td>
                                    <input type="text" name="definisi2_1" id="definisi2_1" class="form-control" value="">
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
                            <label for="komponen_iku3" class="control-label col-md-4">Komponen Iku</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="" value="Partisipasi Pimpinan">
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
                        <div class="form-group">
                            <label for="input_tipe3" class="control-label col-md-4">Input Nilai</label>
                            <div class="col-md-8">
                                <div class="col-md-9" id="radioContainer">
                                    <div class="radio">
                                        <label for="input_tipe3">
                                            <input type="radio" id="input_tipe3" name="input_tipe3" checked value="otomatis"> Parameterize
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan3" class="control-label col-md-4">Keterangan</label>
                            <div class="col-md-8">
                                <textarea name="keterangan3" id="keterangan3" class="form-control"></textarea>
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <div class="col-md-4">
                                {{csrf_field()}}
                                <input type="hidden" name="sender_id3" id="sender_id3" value="">
                            </div>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-success pull-right" id="modal_simpan3">Simpan <i class="fa fa-save"></i></button>
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
                            <label for="komponen_iku4" class="control-label col-md-4">Komponen Iku</label>
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
                            <label for="komponen_iku5" class="control-label col-md-4">Komponen Iku</label>
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
                            <label for="komponen_iku7" class="control-label col-md-4">Komponen Iku</label>
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

                                        @if($v->id == 3)
                                            data-html="true"
                                            {{-- data-toggle="popover" --}}
                                            data-placement="left"
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
                                                >OJK Inovatif</a>'
                                        @endif
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
            // $("[data-toggle=popover]").popover();
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
                        $('#keterangan3').val('').prop('readonly', false);
                        $('#modal_triwulan3').val('').val((parseInt(t.attr('data-triwulan')) + 1));
                        $('[id^=definisi3_]').val('').prop('readonly', false);

                        $('#modal-form3').hide();
                        $('#loading3').show();
                    },
                    success: function(response) {
                        if (response.status) {
                            $('#periode3').val('').val('Triwulan ' + (parseInt(t.attr('data-triwulan')) + 1));
                            $('#persen3').val('').val(response.data.persentase.nilai).prop('readonly', false);
                            $('#sender_id3').val('').val(t.attr('id'));
                            $('#keterangan3').val(response.data.iku1.keterangan);
                            
                            console.log(response);
                            if ($.isArray(response.data.alat_ukur1.definisi)) {
                                $.each(response.data.alat_ukur1.definisi, function(k, v) {
                                   $('#definisi3_' + (k+1)).val(v.deskripsi);
                                   console.log(k);
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
                            if ($.isArray(response.data.alat_ukur.definisi)) {
                                $.each(response.data.alat_ukur.definisi, function(k, v) {
                                   $('#definisi4_' + (k+1)).val(v.deskripsi);
                                   console.log(k);
                                });
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
            let s1 = $(this);
            let sender_id = $('#sender_id1').val();
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
            let s2 = $(this);
            let sender_id = $('#sender_id2').val();
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
            let s4 = $(this);
            let sender_id = $('#sender_id4').val();
            var sender = $('#' + sender_id);

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
            let s5 = $(this);
            let sender_id = $('#sender_id5').val();
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
            let s6 = $(this);
            let sender_id = $('#sender_id6').val();
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
            let s7 = $(this);
            let sender_id = $('#sender_id7').val();
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

    </script>
@endsection