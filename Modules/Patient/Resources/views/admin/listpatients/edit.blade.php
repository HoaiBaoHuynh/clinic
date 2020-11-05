@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('patient::listpatients.title.edit listpatient') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.patient.listpatient.index') }}">{{ trans('patient::listpatients.title.listpatients') }}</a></li>
        <li class="active">{{ trans('patient::listpatients.title.edit listpatient') }}</li>
    </ol>
@stop
 <script type="text/javascript">
    function validate() {
        var hoten = document.myform.hoTen.value;
        var CMND = document.myform.cmnd.value;
        var SDT = document.myform.sdt.value;
        var diachi = document.myform.diaChi.value;
        var ngaysinh = document.myform.ngaySinh.value;
        var gioitinh = document.myform.gioiTinh.value;
        var ghichu = document.myform.ghiChu.value;
        var status = true;
        if (hoten == null || hoten =="") {
            /*alert("Bạn Chưa Nhập Họ Tên!!");*/
            document.getElementById("hoten").innerHTML="Bạn chưa nhập họ tên";
            status = false;
        }
        else if (isNaN(hoten) == false)
        {
            document.getElementById("hoten").innerHTML="Không nhận ký tự chữ số";
            status = false;
        }
        else
        {
            document.getElementById("hoten").innerHTML="";
        }

        if (CMND == null || CMND =="") {
            document.getElementById("CMND").innerHTML="Bạn chưa nhập cmnd";
            status = false;
        }
        else if (isNaN(CMND) == true)
        {
            document.getElementById("CMND").innerHTML="Không nhận ký tự chuỗi";
            status = false;
        }
        else
        {
            document.getElementById("CMND").innerHTML="";
        }

        if (SDT == null || SDT =="") {
            document.getElementById("SDT").innerHTML="Bạn chưa nhập sdt";
            status = false;
        }
        else if (isNaN(SDT) == true)
        {
            document.getElementById("SDT").innerHTML="Không nhận ký tự chuỗi";
            status = false;
        }
        else
        {
            document.getElementById("SDT").innerHTML="";
        }

        if (diachi == null ||diachi =="") {
           document.getElementById("diachi").innerHTML="Bạn chưa nhập địa chỉ";
            status = false;
        }
        else
        {
            document.getElementById("diachi").innerHTML="";
        }
        if (ngaysinh == null ||ngaysinh =="") {
            document.getElementById("ngaysinh").innerHTML="Bạn chưa nhập ngày sinh";
           status = false;        
        }
        else
        {
            document.getElementById("ngaysinh").innerHTML="";
        }       

        if (ghichu == null ||ghichu =="") {
            document.getElementById("ghichu").innerHTML="Bạn chưa nhập ghi chu";
           status = false;        
        }
        else
        {
            document.getElementById("ghichu").innerHTML="";
        }
        return status;
    }
</script> 
@section('content')
    {!! Form::open(['onsubmit' => 'return validate()','name' => 'myform','route' => ['admin.patient.listpatient.update', $listpatient->id], 'method' => 'put']) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers')
                <div class="tab-content">
                    <?php $i = 0; ?>
                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                        <?php $i++; ?>
                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                            @include('patient::admin.listpatients.partials.edit-fields', ['lang' => $locale])
                        </div>
                    @endforeach

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.update') }}</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.patient.listpatient.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
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
                    { key: 'b', route: "<?= route('admin.patient.listpatient.index') ?>" }
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
