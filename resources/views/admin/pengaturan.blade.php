@extends('layout.master')

@section('content')
    <!-- Large modal -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
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
        $('.kol').on('click', function(){

            //Get data
            $.ajax({
                url: '{{url('iku/detail')}}/' + $(this).attr('data-id'),
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function(){

                },
                success: function(response) {
                    if (response.status) {
                        
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