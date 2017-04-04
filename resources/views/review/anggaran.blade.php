@extends('layout.master')

@section('content')

<div id="page-content">
    <div class="content-header content-media">
        <div class="header-section">
            <div class="jumbotron" >
                <div class="col-md-12">
                    <h1>Salam <b>Perubahan</b></h1>
                    <h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Anggaran Program Budaya</h4>
                </div>
            </div>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{url('/')}}">Beranda</a></li>
        <li>Anggaran Budaya</li>
    </ul>
    <!-- END Datatables Header -->

@php
    if($anggaran->total_anggaran !== null){
        $totalnya = $anggaran->total_anggaran;
    }else{
        $totalnya = 1;
    }
@endphp

    <!-- Datatables Content -->
    @if(Session::has('msg'))
        {!!Session('msg')!!}
    @endif

    <div class="block full">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data" action="">
                            <div class="form-group">
                                <label for="disabledSelect" class="control-label col-md-2">Total Anggaran</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input 
                                            class="form-control"
                                            type="text"
                                            name="total_anggaran" 
                                            min="1"
                                            step="1"
                                            value="{{number_format($anggaran->total_anggaran, 0, ',', '.')}}"
                                            disabled
                                        >
                                    </div>  
                                </div>                              
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <table class="table table-striped table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>Triwulan I</td>
                                                    <td>Triwulan II</td>
                                                    <td>Triwulan III</td>
                                                    <td>Triwulan IV</td>
                                                </tr>
                                                <tr>
                                                    <td>Rencana Anggaran</td>
                                                    @foreach($rencana as $k => $v)
                                                        <td>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">Rp.</span>
                                                                <input
                                                                    name="rencana_{{($k)}}"
                                                                    id="rencana_{{($k)}}"
                                                                    type="text"
                                                                    class="form-control rencana"
                                                                    value="{{number_format($v->rencana, 0, ',', '.')}}"
                                                                    readonly
                                                                >
                                                            </div>
                                                        </td>
                                                    @endforeach
                                                </tr>
                                                <tr>
                                                <td>Realisasi Anggaran</td>
                                                    @foreach($rencana as $k => $v)
                                                        <td>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">Rp.</span>
                                                                <input 
                                                                    type="text"
                                                                    name="realisasi_{{$k}}"
                                                                    class="form-control realisasi"
                                                                    value="{{number_format($v->realisasi, 0, ',', '.')}}"
                                                                    readonly
                                                                >
                                                            </div>
                                                        </td>
                                                    @endforeach
                                                </tr>
                                                <tr>
                                                    <td>Persentase Realisasi</td>
                                                    @foreach($rencana as $k => $v)
                                                        <td>
                                                            <center>
                                                                <input 
                                                                    type="text"
                                                                    name="persenrealisiasi_{{$k}}" style="text-align:Center"
                                                                    class="form-control realisasi"
                                                                    @if($v->realisasi > 0)
                                                                       value="{{number_format((float)$v->realisasi/$totalnya*100,1, '.', '')}}%"
                                                                    @else value="0%"
                                                                    @endif 
                                                                    readonly
                                                                >
                                                            </center>
                                                        </td>
                                                    @endforeach
                                                </tr><tr>
                                                    <td>Persentase Akumulasi</td> 
                                                    @php 
                                                        $jumlahreal =0;
                                                    @endphp
                                                    
                                                    @foreach($rencana as $k => $v)
                                                        <td>
                                                            <center>
                                                                @php 
                                                                    $jumlahreal = $jumlahreal + $v->realisasi;
                                                                @endphp
                                                                <input 
                                                                    type="text"
                                                                    name="persenakumulasi_{{$k}}" 
                                                                    style="text-align:Center"
                                                                    class="form-control realisasi"

                                                                    @if($v->realisasi > 0)
                                                                        value="{{number_format( (float) $jumlahreal / $totalnya * 100, 1, '.', '')}}%"
                                                                        @else value="0%"
                                                                    @endif
                                                                    readonly
                                                                >
                                                            </center>
                                                        </td>
                                                    @endforeach
                                                </tr>
                                                <tr>
                                                    <td>
                                                    
                                                    </td>

                                                    @foreach($rencana as $k => $v)
                                                        @if($v->file == null)
                                                            <td>
                                                                -
                                                            </td>
                                                        @else
                                                            <td>
                                                                <a href="{{url('attachment/lampiran_anggaran/' . $v->file . '?dl=1')}}" class="btn btn-danger btn-block">
                                                                    {{str_limit($v->file, 12)}} <i class="fa fa-download"></i>
                                                                </a>
                                                            </td>
                                                        @endif
                                                    @endforeach
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                
@endsection

@section('js')

    <script>
        $('#finalisasi_total').on('click', function() {
            var data = $('input[name="total_anggaran"]').val(); 
            if (!confirm('Apakah anda yakin akan memfinalisasi anggaran ini? Tindakan ini tidak dapat diurungkan!')) {
                return false;
            }
            
            var t = $(this);
            $.ajax({
                url: '{{url('ubah-anggaran-total')}}',
                type: 'POST',
                dataType: 'JSON',
                data: 'anggaran=' + data + '&_token={{csrf_token()}}',
                beforeSend: function() {
                    t.html('<i class="fa fa-spinner fa-spin"></i> Memuat...');
                    $('input[name="total_anggaran"]').prop('disabled', true);
                },
                success: function(resp) {
                    window.location.reload();
                },
                error: function(resp) {
                    window.location.reload();
                }
            });
        });

        $(document).on({
            change: function() {
                var p = $('#p1');
                p.text(berapaPersen({{$anggaran->total_anggaran}}, parseInt($(this).val())));
            },
            keyup: function() {
                // console.log(100/10);
                var p = $('#p1');
                p.text(berapaPersen({{$anggaran->total_anggaran}}, parseInt($(this).val())));
            }
        }, '#real1');


        function berapaPersen(ref, jumlah){ 
            var r = (Math.round(jumlah / ref * 100)).toFixed(0);
            if (r == 'NaN') {
                return 0;
            }

            return r;
        }

        $(document).on({
            focus: function() {
                var val = $(this).val();
                if (val == 0) {
                    $(this).val('0');
                }else{
                    $(this).val(val);
                }
                // $(this).val('');
            },
            blur: function() {
                var val = $(this).val();
                if (val.length == 0) {
                    $(this).val('0');
                }else{
                    $(this).val(val);
                }
            },
            keyup: function() {
                var total = 0;
                var mtot = 0;
                var max = parseInt({{$anggaran->total_anggaran}});
                $('.rencana').each(function (index, value) {
                    total += parseInt($(value).val());
                });

                if (total > max) {
                    notie.alert({type: 'error', text: 'Rencana tidak boleh lebih dari anggaran Rp. ' + max, time: 1});
                    $(this).addClass('animated shake').val('0').focus();
                }
            }
        }, '.rencana');

        $(document).on({
            blur: function() {
                var val = $(this).val();
                if (val.length == 0) {
                    $(this).val('0');
                }else{
                    $(this).val(val);
                }
            }
        }, '.realisasi');
    </script>
@endsection