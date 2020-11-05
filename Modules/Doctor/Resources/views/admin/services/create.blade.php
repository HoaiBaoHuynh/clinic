@extends('layouts.master')
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
</head>
@section('content-header')
    <h1>
        {{ trans('doctor::services.title.create service') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.doctor.service.index') }}">{{ trans('doctor::services.title.services') }}</a></li>
        <li class="active">{{ trans('doctor::services.title.create service') }}</li>
    </ol>
@stop
<script type="text/javascript">
    function validateform(){
        var maso = document.createform.maSo.value;
        var tendichvu = document.createform.tenDichVu.value;
        var chitiet = document.createform.chiTiet.value;
        var ghichu = document.createform.ghiChu.value;
        var gias = document.createform.gia.value;
        var bien = true;
        var arr = [];
        <?php foreach ($Keys as $ms): ?>
            arr.push('{{$ms->maSo}}');
        <?php endforeach ?>
        var even = (element) => element == maso;
        if (maso == null || maso == "") {
            document.getElementById('maso').innerHTML = "Hãy nhập mã số!";
            bien = false;
        }else{
            if(arr.some(even) === true)
            {
                document.getElementById('maso').innerHTML ="Mã số " + maso + " đã tồn tại!";
                bien = false;
            }else{
                document.getElementById('maso').innerHTML = "";
            }
           /*document.getElementById('maso').innerHTML = mang;*/
        }
        if (tendichvu == null || tendichvu == "") {
            document.getElementById('tendichvu').innerHTML = "Hãy nhập tên dịch vụ!";
            bien = false;
        }else{
            document.getElementById('tendichvu').innerHTML = "";
        }
        if (chitiet == null || chitiet == "") {
            document.getElementById('chitiet').innerHTML = "Hãy nhập chi tiết!";
            bien = false;
        }else{
            document.getElementById('chitiet').innerHTML = "";
        }
        if (ghichu == null || ghichu == "") {
            document.getElementById('ghichu').innerHTML = "Hãy nhập ghi chú!";
            bien = false;
        }else{
            document.getElementById('ghichu').innerHTML = "";
        }
        if (gias == null || gias == "") {
            document.getElementById('gias').innerHTML = "Hãy nhập giá!";
            bien = false;
        }
        else{
            document.getElementById('gias').innerHTML = "";
        }
        return bien;
    }
</script>
@section('content')
    {!! Form::open(['route' => ['admin.doctor.service.store'], 'method' => 'post', 'name'=>'createform', 'enctype'=>'multipart/form-data','onsubmit'=>'return validateform()']) !!}
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers')
                <div class="tab-content">
                    <?php $i = 0; ?>
                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                        <?php $i++; ?>
                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                            @include('doctor::admin.services.partials.create-fields', ['lang' => $locale])
                        </div>
                    @endforeach

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.doctor.service.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                    </div>
                </div>
            </div> {{-- end nav-tabs-custom --}}
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.doctor.service.index') ?>" }
                ]
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
@endpush
