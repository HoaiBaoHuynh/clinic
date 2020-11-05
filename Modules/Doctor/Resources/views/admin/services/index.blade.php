@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('doctor::services.title.services') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('doctor::services.title.services') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.doctor.service.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('doctor::services.button.create service') }}
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="data-table table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center;">Id</th>
                                <th style="text-align: center;">Mã số</th>
                                <th style="text-align: center;">Tên dịch vụ</th>
                                <th style="text-align: center;">Chi tiết</th>
                                <th style="text-align: center;">Ghi chú</th>
                                <th style="text-align: center; width: 300px;">Dịch vụ đi kèm</th>
                                <th style="text-align: center;">Giá</th>
                                <th style="text-align: center;">Ngày tạo</th>
                                <th data-sortable="false"  style="text-align: center;">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($services)): ?>
                            <?php foreach ($services as $service): ?>
                            <tr>
                                <td style="text-align: center; vertical-align: middle;">
                                    <a href="{{ route('admin.doctor.service.edit', [$service->id]) }}">
                                        {{ $service->id }}
                                    </a>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <a href="{{ route('admin.doctor.service.edit', [$service->id]) }}">
                                        {{ $service->maSo }}
                                    </a>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <a href="{{ route('admin.doctor.service.edit', [$service->id]) }}">
                                        {{ $service->tenDichVu }}
                                    </a>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <a href="{{ route('admin.doctor.service.edit', [$service->id]) }}">
                                        {{ $service->chiTiet }}
                                    </a>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <a href="{{ route('admin.doctor.service.edit', [$service->id]) }}">
                                        {{ $service->ghiChu }}
                                    </a>
                                </td>
                                <td style="text-align: center; vertical-align: middle;width: 300px;">
                                    <a href="{{ route('admin.doctor.service.edit', [$service->id]) }}">
                                        {{ $service->dvDinhKem }}
                                    </a>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <a href="{{ route('admin.doctor.service.edit', [$service->id]) }}">
                                        {{ number_format($service->gia) }} đồng.
                                    </a>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <a href="{{ route('admin.doctor.service.edit', [$service->id]) }}">
                                        {{date('d-m-Y',strtotime(str_replace('/','-',$service->created_at)))}}
                                    </a>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.doctor.service.edit', [$service->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.doctor.service.destroy', [$service->id]) }}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
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
        <dd>{{ trans('doctor::services.title.create service') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.doctor.service.create') ?>" }
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
