@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('doctor::listdoctors.title.listdoctors') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active"><a href="{{ route('admin.doctor.listdoctor.index') }}">{{ trans('doctor::listdoctors.title.listdoctors') }}</a></li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.doctor.listdoctor.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('doctor::listdoctors.button.create listdoctor') }}
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <form action="{{route('admin.doctor.listdoctor.search')}}" method="POST" style="margin:auto;max-width:300px">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Phân Loại</th>
                                        <th>Từ Khóa</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                        <select name="loc" class="select">
                                            <option value="">Bộ Lọc</option>
                                            <option value="Bác Sĩ">Bác Sĩ</option>
                                            <option value="Điều Trị Viên">Điều Trị Viên</option>
                                        </select>&emsp;
                                        </td>
                                        <td>
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <input type="text" placeholder="Tìm Kiếm..." name="tukhoa">
                                        </td>
                                        <td><button type="submit"><i class="fa fa-search"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- <div class="row">
                                <label></label><br>
                                <select name="loc" class="select">
                                    <option value="">Bộ Lọc</option>
                                    <option value="Bác Sĩ">Bác Sĩ</option>
                                    <option value="Điều Trị Viên">Điều Trị Viên</option>
                                </select><br>
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <label></label><br>
                                <input type="text" placeholder="Tìm Kiếm..." name="tukhoa">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div> -->
                        </form>
                    </div>
                    <div class="table-responsive">
                        <div class="row">
                        </div>
                        <table class="data-table table table-bordered table-hover" >
                            <thead>
                            <tr>
                                <th style="text-align: center; vertical-align: middle;">Id</th>
                                <th style="text-align: center; vertical-align: middle;">Avatar</th>
                                <th style="text-align: center; vertical-align: middle;">Họ Tên</th>
                                <th style="text-align: center; vertical-align: middle;">Ngày Sinh</th>
                                <th style="text-align: center; vertical-align: middle;">Giới Tính</th>
                                <th style="text-align: center; vertical-align: middle;">Phân Loại</th>
                                <th style="text-align: center; vertical-align: middle;">Chuyên Môn</th>
                                <th style="text-align: center; vertical-align: middle;">Địa Chỉ</th>
                                <th data-sortable="false" style="text-align: center; vertical-align: middle;">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($listdoctors)): ?>
                            <?php foreach ($listdoctors as $listdoctor): ?>
                            <tr>
                                <td style="text-align: center; vertical-align: middle;">
                                    <a href="{{ route('admin.doctor.listdoctor.edit', [$listdoctor->id]) }}">
                                        {{ $listdoctor->id }}
                                    </a>
                                </td >
                                <td style="text-align: center; vertical-align: middle; width: 10%;">
                                    <div class="single-item-header">
                                        <img src="../../../assets/images/{{$listdoctor->Avatar}}" height="90px" width="90px" />
                                    </div>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <a href="{{ route('admin.doctor.listdoctor.edit', [$listdoctor->id]) }}">
                                        {{ $listdoctor->hoTen }}
                                    </a>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <a href="{{ route('admin.doctor.listdoctor.edit', [$listdoctor->id]) }}">
                                        {{date('d-m-Y',strtotime(str_replace('/','-',$listdoctor->ngaySinh)))}}
                                    </a>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <a href="{{ route('admin.doctor.listdoctor.edit', [$listdoctor->id]) }}">
                                        {{ $listdoctor->gioiTinh }}
                                    </a>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <a href="{{ route('admin.doctor.listdoctor.edit', [$listdoctor->id]) }}">
                                        {{ $listdoctor->phanLoai }}
                                    </a>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <a href="{{ route('admin.doctor.listdoctor.edit', [$listdoctor->id]) }}">
                                        {{ $listdoctor->chuyenMon }}
                                    </a>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <a href="{{ route('admin.doctor.listdoctor.edit', [$listdoctor->id]) }}">
                                        {{ $listdoctor->diaChi }}
                                    </a>
                                </td>                                
                                <td style="text-align: center; vertical-align: middle;">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.doctor.listdoctor.edit', [$listdoctor->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.doctor.listdoctor.destroy', [$listdoctor->id]) }}"><i class="fa fa-trash"></i></button>
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
        <dd>{{ trans('doctor::listdoctors.title.create listdoctor') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.doctor.listdoctor.create') ?>" }
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
