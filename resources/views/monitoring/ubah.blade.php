@extends('layout.master')
@section('content')

<div id="page-content">
    <!-- Datatables Header -->
    <div class="content-header content-media">
        <div class="header-section">
            <div class="jumbotron" >
                <div class="col-md-12">
                    <h1>Salam <b>Perubahan</b></h1>
                    <h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Ubah Anggaran Program Budaya</h4>
                </div>
            </div>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{url('/')}}">Beranda</a></li>
        <li><a href="{{url('monitoring-anggaran')}}">Monitoring Anggaran</a></li>
        <li>Ubah Anggaran Budaya</li>
    </ul>
    <!-- END Datatables Header -->

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
                                            @if($anggaran->status == 1) disabled @endif
                                        >
                                        @if($anggaran->status == 0)
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-success" id="finalisasi_total">Finalisasi</button>
                                            </span>
                                        @endif
                                        @php
                                        if($anggaran->total_anggaran !== null){
                                            $totalnya = $anggaran->total_anggaran;
                                        }else{
                                            $totalnya = 1;
                                        }
                                        @endphp
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

                                                   {{--  @foreach($target as $k => $v)
                                                        
                                                        <td>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">Rp.</span>
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    value="{{number_format(getPercentOfNumber($anggaran->total_anggaran, $v->iku->first()->alat_ukur->first()->definisi->last()->deskripsi, 0, ',', '.'))}}"
                                                                    disabled
                                                                >
                                                                <span class="input-group-addon">({{$v->iku->first()->alat_ukur->first()->definisi->last()->deskripsi}}%)</span>
                                                            </div>
                                                        </td>
                                                    @endforeach --}}

                                                    {{--<td colspan="4"><div class="alert alert-info">Target belum ditetapkan!!</div> </td>--}}
                                                    @foreach($rencana as $k => $v)
                                                        <td>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">Rp.</span>
                                                                <input
                                                                    name="rencana_{{($k+1)}}"
                                                                    id="rencana_{{($k+1)}}"
                                                                    type="text"
                                                                    class="form-control rencana"
                                                                    value="{{number_format($v->rencana, 0, ',', '.')}}"
                                                                    @if($v->rencana > 0)
                                                                        readonly
                                                                    @endif
                                                                    required
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
                                                                    name="realisasi_{{$k+1}}"
                                                                    class="form-control realisasi"
                                                                    value="{{number_format($v->realisasi, 0, ',', '.')}}"
                                                                    @php
                                                                        // $no = \Carbon\Carbon::parse('2017-11-10 00:00:00');
                                                                        $triwulan[$k] = \App\TanggalLaporan::where('tahun', date('Y'))
                                                                                    ->where('triwulan', ($k+1))
                                                                                    ->first();
                                                                        $awal[$k] = \Carbon\Carbon::parse($triwulan[$k]->sejak);
                                                                        $akhir[$k] = \Carbon\Carbon::parse($triwulan[$k]->hingga);
                                                                        $now[$k] = \Carbon\Carbon::now();
                                                                        // $now[$k] = $no;
                                                                    @endphp

                                                                    @if($v->rencana == 0 OR !$now[$k]->between($awal[$k], $akhir[$k])  OR $v->is_final == 1)
                                                                        readonly 
                                                                    @endif
                                                                >
                                                            </div>
                                                        </td>
                                                    @endforeach
                                                </tr><tr>
                                                    <td>Persentase Realisasi</td>
                                                    @foreach($rencana as $k => $v)
                                                        <td><center>
                                                                <input 
                                                                    type="text"
                                                                    name="persenrealisiasi_{{$k+1}}" style="text-align:Center"
                                                                    class="form-control realisasi"
                                                                   @if($v->realisasi > 0)
                                                                       value="{{number_format((float)$v->realisasi/$totalnya*100,1, '.', '')}}%"
                                                                    @else value="0%"
                                                                    @endif readonly
                                                                ></center>
                                                        </td>
                                                    @endforeach
                                                </tr><tr>
                                                    <td>Persentase Akumulasi</td> <?php $jumlahreal =0;?>
                                                    @foreach($rencana as $k => $v)
                                                        <td><center><?php $jumlahreal = $jumlahreal+$v->realisasi;?>
                                                         <input 
                                                                    type="text"
                                                                    name="persenakumulasi_{{$k+1}}" style="text-align:Center"
                                                                    class="form-control realisasi"@if($v->realisasi > 0)
                                                                    value="{{number_format((float)$jumlahreal/$totalnya*100,1, '.', '')}}%"@else value="0%"
                                                                    @endif readonly
                                                                ></center>
                                                        </td>
                                                    @endforeach
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="exampleInputFile">Lampiran<br>(Max. 20MB)<br>(.zip,.rar, .pdf, .jpg)</label>
                                                    </td>
                                                    @foreach($rencana as $k => $v)
                                                        @if($v->file == null)
                                                            <td>
                                                                <input 
                                                                    class="form-control" 
                                                                    type="file"
                                                                    name="lampiran_{{$k+1}}"
                                                                    @if($v->rencana == 0 OR !$now[$k]->between($awal[$k], $akhir[$k]) OR $v->is_final == 1)
                                                                        disabled 
                                                                    @else
                                                                        required
                                                                    @endif
                                                                >
                                                            </td>
                                                        @else
                                                            <td>
                                                                <a href="{{url('attachment/lampiran_anggaran/' . $v->file . '?dl=1')}}" class="btn btn-danger btn-block">
                                                                    {{str_limit($v->file, 12)}} <i class="fa fa-download"></i>
                                                                </a>
                                                              <!--  <input 
                                                                    class="form-control" 
                                                                    type="file"
                                                                    name="lampiran_{{$k+1}}"
                                                                    @if($v->rencana == 0 OR !$now[$k]->between($awal[$k], $akhir[$k]) OR $v->is_final == 1)
                                                                        disabled
                                                                    @endif
                                                                >-->
                                                            </td>
                                                        @endif
                                                    @endforeach
                                                    {{-- <td>
                                                        <input class="form-control" type="file" id="exampleInputFile1" name="userfile1" onchange="AlertFilesize(document.getElementById('exampleInputFile1').getAttribute('id'),1)">
                                                    </td>
                                                    <td>Belum ada Lampiran</td>
                                                    <td>Belum ada Lampiran</td>
                                                    <td>Belum ada Lampiran</td> --}}
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <a href="{{url('monitoring-anggaran')}}" class="btn btn-default"><i class="fa fa-arrow-circle-o-left"></i>&nbsp;Kembali</a>
                            {{csrf_field()}}
                            <button type="submit" id="done" class="btn btn-success"><i class="fa fa-floppy-o"></i>&nbsp;Submit</button>
                            {{-- <button type="submit" id="final" name="final" value="1" class="btn btn-primary"><i class="fa fa-check-o"></i>&nbsp;Final</button> --}}
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