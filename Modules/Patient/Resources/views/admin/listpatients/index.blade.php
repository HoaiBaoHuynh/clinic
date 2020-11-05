@extends('layouts.master')

@section('content-header')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <h1>
        {{ trans('patient::listpatients.title.listpatients') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('patient::listpatients.title.listpatients') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.patient.listpatient.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('Thêm bệnh nhân') }}
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                    
                    <div class="row">             
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <div class="form-group">
                    <form method="POST" action="{{route('admin.patient.listpatient.index')}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}";>
                        <label>Tìm kiếm</label>
                        <input type="text" name="key">
                        <select name="chon">
                            <option value="">bộ lọc</option>
                            <option value="nam">nam</option>
                            <option value="nữ">nữ</option>
                        </select>
                        <button type="submit" >tìm kiếm</button>
                    </form>  
                </div>
                
                    <div class="table-responsive">
                        <table class="data-table table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center; vertical-align: middle;">id</th>
                                <th style="text-align: center; vertical-align: middle;">Họ Tên</th>
                                <th style="text-align: center; vertical-align: middle;">CMND</th>
                                <th style="text-align: center; vertical-align: middle;">Số Điện Thoại</th>
                                <th style="text-align: center; vertical-align: middle;">Địa Chỉ</th>
                                <th style="text-align: center; vertical-align: middle;">Ghi Chú</th>
                                <th style="text-align: center; vertical-align: middle;">Ngày Sinh</th>
                                <th style="text-align: center; vertical-align: middle;">Giới Tính</th>
                                <th style="text-align: center; vertical-align: middle;">Chức Năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($listpatients)): ?>
                            <?php foreach ($listpatients as $listpatient): ?>
                            <tr>
                                <td style="text-align: center; vertical-align: middle;">
                                    <a href="{{ route('admin.patient.listpatient.detail', [$listpatient->id]) }}">
                                        {{ $listpatient->id }}
                                    </a>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <a href="{{ route('admin.patient.listpatient.detail', [$listpatient->id]) }}">
                                        {{ $listpatient->hoTen }}
                                    </a>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <a href="{{ route('admin.patient.listpatient.detail', [$listpatient->id]) }}">
                                        {{ $listpatient->cmnd }}
                                    </a>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <a href="{{ route('admin.patient.listpatient.detail', [$listpatient->id]) }}">
                                        {{ $listpatient->sdt }}
                                    </a>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <a href="{{ route('admin.patient.listpatient.detail', [$listpatient->id]) }}">
                                        {{ $listpatient->diaChi }}
                                    </a>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <a href="{{ route('admin.patient.listpatient.detail', [$listpatient->id]) }}">
                                        {{ $listpatient->ghiChu }}
                                    </a>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <a href="{{ route('admin.patient.listpatient.detail', [$listpatient->id]) }}">
                                        {{date('d-m-Y',strtotime(str_replace('/','-',$listpatient->ngaySinh))) }}
                                    </a>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <a href="{{ route('admin.patient.listpatient.detail', [$listpatient->id]) }}">
                                        {{ $listpatient->gioiTinh }}
                                    </a>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.patient.listpatient.edit', [$listpatient->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.patient.listpatient.destroy', [$listpatient->id])}}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('patient::listpatients.title.create listpatient') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.patient.listpatient.create') ?>" }
                ]
            });
        });
    </script>
    <?php $locale = locale(); ?>
    <script type="text/javascript">
        $(function () {
            $('.data-table').dataTable({
                "paginate": true,
                "lengthChange": true,
                "filter": true,
                "sort": true,
                "info": true,
                "autoWidth": true,
                "order": [[ 0, "desc" ]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });
        });
    </script>
@endpush
