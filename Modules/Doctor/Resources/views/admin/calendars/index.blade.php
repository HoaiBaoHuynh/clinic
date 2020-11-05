@extends('layouts.master')
    <head>
    <script src="https://unpkg.com/@fullcalendar/core@4.4.0/main.min.js"></script>
    <script src="https://unpkg.com/@fullcalendar/daygrid@4.4.0/main.min.js" ></script>
    <script src="https://unpkg.com/@fullcalendar/timegrid@4.4.0/main.min.js" ></script>
    <script src="https://unpkg.com/@fullcalendar/list@4.4.0/main.min.js" ></script>
    <script src="https://unpkg.com/@fullcalendar/interaction@4.4.0/main.min.js"></script>
    <script src="https://unpkg.com/@fullcalendar/bootstrap@4.4.0/main.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js"></script> -->

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/@fullcalendar/core@4.4.0/main.min.css">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/@fullcalendar/daygrid@4.4.0/main.min.css">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/@fullcalendar/timegrid@4.4.0/main.min.css">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/@fullcalendar/list@4.4.0/main.min.css">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/@fullcalendar/bootstrap@4.4.0/main.min.css">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css"> -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
@section('content-header')
    <h1>
        {{ trans('doctor::calendars.title.calendars') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('doctor::calendars.title.calendars') }}</li>
    </ol>
@stop
@section('content')
    @include('doctor::admin.calendars.partials.index-calendar')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('doctor::calendars.title.create calendar') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.doctor.calendar.create') ?>" }
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
