@extends('layout.master')
@section('content')

<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="gi gi-imac"></i>
				<b>Ubah Anggaran Program Budaya</b>
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li><a href="{{url('monitoring-anggaran')}}">Monitoring Anggaran</a></li>
		<li>Ubah Anggaran Budaya</li>
	</ul>
	<!-- END Datatables Header -->

	<!-- Datatables Content -->
	<div class="block full">
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-lg-12">
						<form role="form" method="post" class="form-horizontal" enctype="multipart/form-data" action="">
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

                                                    @foreach($target as $k => $v)
                                                        
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
                                                    @endforeach

                                                    {{--<td colspan="4"><div class="alert alert-info">Target belum ditetapkan!!</div> </td>--}}
												</tr>
												<tr>
													<td>Realisasi Anggaran</td>
													<td>
														<div class="input-group">
															<span class="input-group-addon">Rp.</span>
															<input class="form-control" name="real1" id="real1" type="text" maxlength="14" placeholder="Realisasi Anggaran" value="" required>
                                                            <span class="input-group-addon">(<span id="p1">0</span>%)</span>
														</div>
													</td>
													<td>
														<div class="input-group">
															<span class="input-group-addon">Rp.</span>														
															<input class="form-control" name="real2" id="real2" type="text" maxlength="14" value="Rp. 0" disabled="">
                                                            <span class="input-group-addon">(<span id="p2">0</span>%)</span>
														</div>
													<td>
														<div class="input-group">
															<span class="input-group-addon">Rp.</span>
															<input class="form-control" name="real3" id="real3" type="text" maxlength="14" value="Rp. 0" disabled="">
                                                            <span class="input-group-addon">(<span id="p3">0</span>%)</span>
														</div>
													<td>
														<div class="input-group">
															<span class="input-group-addon">Rp.</span>
															<input class="form-control" name="real4" id="real4" type="text" maxlength="14" value="Rp. 0" disabled="">
                                                            <span class="input-group-addon">(<span id="p4">0</span>%)</span>
														</div>
												</tr>
												<tr>
													<td>
														<label for="exampleInputFile">Lampiran<br>(Max. 20MB)<br>(.zip,.rar, .pdf, .jpg)</label>
													</td>
													<td>
														<input class="form-control" type="file" id="exampleInputFile1" name="userfile1" onchange="AlertFilesize(document.getElementById('exampleInputFile1').getAttribute('id'),1)">
													</td>
													<td>Belum ada Lampiran</td>
													<td>Belum ada Lampiran</td>
													<td>Belum ada Lampiran</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<a href="{{url('monitoring-anggaran')}}" class="btn btn-default"><i class="fa fa-arrow-circle-o-left"></i>&nbsp;Kembali</a>
							<button type="submit" id="done" class="btn btn-success"><i class="fa fa-floppy-o"></i>&nbsp;Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
				
@endsection

@section('js')
	<script src="{{asset('vendor/js/pages/tablesDatatables.js')}}"></script>
	<script>$(function(){ TablesDatatables.init(); });</script>
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
				console.log(100/10);
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
	</script>
@endsection