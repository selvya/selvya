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
                                    <input type="number" name="persen" class="form-control" min="0" step="1" max="100" id="persen">
                                    <span class="input-group-addon">%</span>                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input_tipe" class="control-label col-md-4">Input Nilai</label>
                            <div class="col-md-8">
                                <div class="col-md-9">
                                    <div class="radio">
                                        <label for="input_tipe1">
                                            <input type="radio" id="input_tipe1" name="input_tipe" value="manual" checked> Manual
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label for="input_tipe2">
                                            <input type="radio" id="input_tipe2" name="input_tipe" value="otomatis"> Otomatis
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
                                <input type="hidden" name="komponen_id" value="" id="modal_komponen_id">
                                <input type="hidden" name="iku_hashid" value="" id="modal_iku_hashid">
                                <input type="hidden" name="modal_tahun" value="{{$tahun}}">
                                <input type="hidden" name="modal_triwulan" value="" id="modal_triwulan">
                                <input type="hidden" name="modal_is_program_budaya" value="" id="modal_is_program_budaya">
                            </div>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-success pull-right" id="modal_simpan">Simpan <i class="fa fa-save"></i></button>
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
                                    if (count($iku1) == 1) {
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
                                        $dataId4 = $iku1->hashid;
                                    }else{
                                        $dataId4 = 0;
                                    }
                                }
                            @endphp
                                
                            <td>
                                <input 
                                    type="text"
                                    name="tw1"
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
            $('#loading, #modal-form').hide();
            
            $("[data-toggle=popover]").popover();
        });

        $('.kol').on('click', function(){
            $("[data-toggle=popover]").popover('hide');
            if ($(this).attr('data-id') == 'special') {
                // alert('special');
                return false;
            } else if($(this).attr('data-id') == 0){
                let i = $(this);
                $('#komponen-iku').val(i.attr('data-component-nama'));
                $('#periode').val('Triwulan ' + i.attr('data-triwulan'));
                $('#persen').val('0');
                $('#keterangan').val('');
                $('#modal_iku_hashid').val('');
                $('#modal_komponen_id').val(i.attr('data-component'));
                $('#modal_triwulan').val(i.attr('data-triwulan'));
                $('#modal_is_program_budaya').val('t');

                $('#loading').hide();
                $('#modal-form').show();

                // return false;
            }else{
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
                            $('#keterangan').val(response.data.keterangan);

                            //Cek jenis komponen
                            if (response.data.komponen.id == 1) {

                            }
                            $('#loading').hide();
                            $('#modal-form').show();
                        }else{
                            confirm('Ups Error');
                        }
                    },
                    error: function(response) {

                    }
                });
            }
            
            $('#modal').modal();
        });

        function insP(hashid) {
            let p = '<div class="form-group">'
                p +='    <label for="input_tipe" class="control-label col-md-4">Input Nilai</label>';
                p +='    <div class="col-md-8">';
                p +='        <div class="col-md-9">';
                p +='            <div class="radio">';
                p +='                <label for="input_tipe1">';
                p +='                    <input type="radio" id="input_tipe1" name="input_tipe" value="manual" checked> Manual';
                p +='                </label>';
                p +='            </div>';
                p +='            <div class="radio">';
                p +='                <label for="input_tipe2">';
                p +='                    <input type="radio" id="input_tipe2" name="input_tipe" value="otomatis"> Otomatis';
                p +='                </label>';
                p +='            </div>';
                p +='        </div>';
                p +='    </div>';
                p +='</div>';
            return p;
        }

        //Simpan
        $('#modal_simpan').on('click', function() {
            var rv = '';
            let b = $(this);
            
            var data = $('#modal-form').serialize();
            $.ajax({
                url: '{{url('ikuBaru')}}',
                type: 'POST',
                data: data,
                beforeSend: function() {
                    b.html('<i class="fa fa-cog fa-spin"></i> Memuat...').prop('disabled', true);
                    $('#modal-form').find('input').prop('readonly', true);
                    $('#modal-form').find('textarea').prop('readonly', true);
                },
                success: function(response) {
                    b.prop('disabled', false).html('Simpan <i class="fa fa-save"></i>');
                    $('#modal-form').find('input').prop('readonly', false);
                    $('#modal-form').find('textarea').prop('readonly', false);

                    alert('success');
                },
                error: function(response) {
                    // body...
                    alert('Gagal');
                }
            });

            return rv;
        });
    </script>
@endsection