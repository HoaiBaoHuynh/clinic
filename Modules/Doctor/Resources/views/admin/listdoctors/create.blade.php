@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('doctor::listdoctors.title.create listdoctor') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.doctor.listdoctor.index') }}">{{ trans('doctor::listdoctors.title.listdoctors') }}</a></li>
        <li class="active">{{ trans('doctor::listdoctors.title.create listdoctor') }}</li>
    </ol>
@stop
<script type="text/javascript">
    function validateform(){
        var hoten = document.createform.hoTen.value;
        var diachi = document.createform.diaChi.value;
        var ngaysinh = document.createform.ngaySinh.value;
        var gioitinh = document.createform.gioiTinh.value;
        var fimage = document.createform.Avatar.value;
        var bien = true;
        if (hoten == null || hoten == "") {
            /*alert("Hãy nhập họ tên.");*/
            document.getElementById('hoten').innerHTML = "Hãy nhập họ tên!";
            bien = false;
        }else{
            document.getElementById('hoten').innerHTML = "";
        }
        if (diachi == null || diachi == "") {
            /*alert("Hãy nhập địa chỉ.");*/
            document.getElementById('diachi').innerHTML = "Hãy nhập địa chỉ!";
            bien = false;
        }else{
            document.getElementById('diachi').innerHTML = "";
        }
        if (ngaysinh == null || ngaysinh == "") {
            /*alert("Hãy nhập ngày sinh.");*/
            document.getElementById('ngaysinh').innerHTML = "Hãy nhập ngày sinh!";
            bien = false;
        }else{
            document.getElementById('ngaysinh').innerHTML = "";
        }
        if (fimage == null || fimage == "") {
            /*alert("image note null.");*/
            document.getElementById('fimage').innerHTML = "Hãy thêm hình ảnh!";
            bien = false;
        }else{
            document.getElementById('fimage').innerHTML = "";
        }
        return bien;
    }
</script>
@section('content')
    <form action="{{ route('admin.doctor.listdoctor.store')}}" name="createform" method="POST" enctype="multipart/form-data" onsubmit="return validateform()">
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
                                @include('doctor::admin.listdoctors.partials.create-fields', ['lang' => $locale])
                            </div>
                        @endforeach
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
                            <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.doctor.listdoctor.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                        </div>
                    </div>
                </div> {{-- end nav-tabs-custom --}}
            </div>
        </div>
    </form>
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
                    { key: 'b', route: "<?= route('admin.doctor.listdoctor.index') ?>" }
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
