    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<body>
    @include('calendars::admin.patient_calendars.partials.model_calendar')
    <div class="panel panel-primary">
        <div class="panel-heading">Event Details</div>
          <div class="panel-body">
            <div id='patientcalendar' style="background-color: white;" 
            data-route-patient-load-events="{{route('routePatientLoadEvents')}}"
            data-route-patient-event-update="{{route('routePatientEventUpdate')}}"
            data-route-patient-event-store="{{route('routePatientEventStore')}}"
            data-route-patient-event-destroy="{{route('routePatientEventDestroy')}}"
            ><div>
          </div>
    </div>

    <script language="javascript">
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('patientcalendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
          plugins: [ 'interaction','dayGrid', 'timeGrid', 'list', 'bootstrap' ],
          themeSystem: 'bootstrap',
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        locale: 'vi',
        navLinks: true,
        selectable: true,
        weekNumbers: true,
        eventLimit: true, // allow "more" link when too many events
        events: routeEvents('routePatientLoadEvents'),

        eventClick:function(element)
        {
          $("#modalcalendar").modal('show');
          $("#modalcalendar #titleModal").text('Thông Tin');
          $("#modalcalendar button.deleteEvent").css("display","flex");

          let id = element.event.id;
          $("#modalcalendar input[name='id']").val(id);

          let idnv = element.event.extendedProps.id_nhanVien;
          $("#modalcalendar select[name='id_nhanVien']").val(idnv);

           let start = moment(element.event.start).format("YYYY-MM-DD");
          $("#modalcalendar input[name='date']").val(start);

          let id_ca = element.event.extendedProps.id_ca;
          $("#modalcalendar select[name='Ca']").val(id_ca);
        },
        select: function(element)
        {
          resetForm(form_event);

          $("#modalcalendar").modal('show');
          $("#modalcalendar #titleModal").text('Thông Tin Mới');
          $("#modalcalendar button.deleteEvent").css("display","none");

          let start = moment(element.start).format("YYYY-MM-DD");
          $("#modalcalendar input[name='date']").val(start);

          calendar.unselect();
        },
      });
        calendar.render();
      });
      function routeEvents(route){
        return document.getElementById('patientcalendar').dataset[route];
      }
      function sendEvent(route,data_)
      {
        $.ajax({
          url:route,
          data:data_,
          method:'POST',
          dataType:'json',
          success:function (json)
          {
            if(json)
            {
              location.reload();
            }
          }
        });
      }
      function resetForm(form)
      {
        $(form)[0].reset();
      }
    </script>
    <script>
      $(function(){
        $('.date-time').mask('00/00/0000 00:00:00');

        $.ajaxSetup({
          headers: 
          {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $(".deleteEvent").click(function(){
          let id = $("#modalcalendar input[name='id']").val();

          let Event = {
            id: id,
            _method: 'DELETE'
          };
          sendEvent(routeEvents('routePatientEventDestroy'),Event);
        });

        $(".saveEvent").click(function(){

          let id = $("#modalcalendar input[name='id']").val();

          let id_nhanVien = $("#modalcalendar select[name='id_nhanVien']").val();
          
          let start = $("#modalcalendar input[name='date']").val();

          let id_ca = $("#modalcalendar select[name='Ca']").val();

          let Event = {
            id_nhanVien: id_nhanVien,
            ngay: start,
            id_ca: id_ca,
          };
          if (id === '') {
            route = routeEvents('routePatientEventStore');
          }else{
            route = routeEvents('routePatientEventUpdate');
            Event.id = id;
            Event._method = 'PUT';
          }
          sendEvent(route,Event);
        });
      });
    </script>
</body>
