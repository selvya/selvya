@extends('layout.master')

@section('content')
    <!-- Large modal -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Indikator Pencapaian</h4>
                </div>
                <div class="modal-body">
                    <div class="text-center" id="loading">
                        <i class="fa fa-cog fa-3x fa-spin"></i>
                        <br>
                        Memuat...
                    </div>
                    <form class="form-horizontal" id="modal-form">
                        <div class="form-group">
                            <label for="komponen-iku" class="control-label col-md-4">Komponen Iku</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="komponen-iku">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="periode" class="control-label col-md-4">Periode</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly id="periode">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="persen" class="control-label col-md-4">Persentase Nilai</label>
                            <div class="col-md-2">
                                <div class="input-group">
                                    <input type="number" class="form-control" min="0" step="1" max="100" id="persen">
                                    <span class="input-group-addon">%</span>                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-type" class="control-label col-md-4">Input Nilai</label>
                            <div class="col-md-8">
                                <div class="col-md-9">
                                    <div class="radio">
                                        <label for="input-type1">
                                            <input type="radio" id="input-type1" name="input-type" value="manual" checked> Manual
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label for="input-type2">
                                            <input type="radio" id="input-type2" name="input-typee" value="otomatis"> Otomatis
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan" class="control-label col-md-4">Keterangan</label>
                            <div class="col-md-8">
                                <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                {{csrf_field()}}
                            </div>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-success pull-right">Simpan <i class="fa fa-save"></i></button>
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
                            <td>
                                <input type="text" name="tw{{$v->id}}_{{$v->iku->where('tahun', $tahun)->where('triwulan', 1)->first()->id}}" class="form-control kol" data-id="{{$v->iku->where('tahun', $tahun)->where('triwulan', 1)->first()->hashid}}" readonly value="{{$v->iku->where('tahun', $tahun)->where('triwulan', 1)->first()->persen}} %">
                            </td>
                            <td>
                                <input type="text" name="tw{{$v->id}}_{{$v->iku->where('tahun', $tahun)->where('triwulan', 2)->first()->id}}" class="form-control kol" data-id="{{$v->iku->where('tahun', $tahun)->where('triwulan', 2)->first()->hashid}}" readonly value="{{$v->iku->where('tahun', $tahun)->where('triwulan', 2)->first()->persen}} %">
                            </td>
                            <td>
                                <input type="text" name="tw{{$v->id}}_{{$v->iku->where('tahun', $tahun)->where('triwulan', 3)->first()->id}}" class="form-control kol" data-id="{{$v->iku->where('tahun', $tahun)->where('triwulan', 3)->first()->hashid}}" readonly value="{{$v->iku->where('tahun', $tahun)->where('triwulan', 3)->first()->persen}} %">
                            </td>
                            <td>
                                <input type="text" name="tw{{$v->id}}_{{$v->iku->where('tahun', $tahun)->where('triwulan', 4)->first()->id}}" class="form-control kol" data-id="{{$v->iku->where('tahun', $tahun)->where('triwulan', 4)->first()->hashid}}" readonly value="{{$v->iku->where('tahun', $tahun)->where('triwulan', 4)->first()->persen}} %">
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
        $('#loading, #modal-form').hide();
        $('.kol').on('click', function(){

            //Get data
            $.ajax({
                url: '{{url('iku/detail')}}/' + $(this).attr('data-id'),
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function(){
                    $('#modal-form').hide();
                    $('#loading').show();
                },
                success: function(response) {
                    if (response.status) {
                        $('#komponen-iku').val(response.data.komponen.name);
                        $('#periode').val('Triwulan ' + response.data.triwulan);
                        $('#persen').val(response.data.persen);
                        $('#loading').hide();
                        $('#modal-form').show();
                    }else{

                    }
                },
                error: function(response) {

                }
            });
            $('#modal').modal();
        });
    </script>
@endsection