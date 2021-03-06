@extends('layouts.master')

@section('content-header')
    <h1>
        Chi tiết bệnh nhân
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.patient.listpatient.index') }}">{{ trans('patient::listpatients.title.listpatients') }}</a></li>
        <li class="active">{{ trans('patient::listpatients.title.detail listpatient') }}</li>
    </ol>
@stop
@section('content')
   
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers')
                <div class="tab-content">
                    <?php $i = 0; ?>
                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                        <?php $i++; ?>
                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                            @include('patient::admin.listpatients.partials.detail-fields', ['lang' => $locale])
                        </div>
                    @endforeach
                    <hr style="border-color: black; margin: 10px 0 20px;">
                    @include('patient::admin.listpatients.partials.LichSuMuaDV', ['lang' => $locale])
                    <hr style="border-color: black; margin: 10px 0 20px;">
                    @include('patient::admin.listpatients.partials.LichSuKham', ['lang' => $locale])
                    </div>
                </div>
                
                <div class="box-footer">
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.patient.listpatient.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                    </div>
            </div> {{-- end nav-tabs-custom --}}
        </div>
    </div>
    
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
