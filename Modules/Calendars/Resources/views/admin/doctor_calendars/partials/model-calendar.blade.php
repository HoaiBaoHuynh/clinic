<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
  $("#caid").select2({
    placeholder: "Select a Name",
    allowClear: true
  });
</script>
<div id="modalcalendar" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog"role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="titleModal">Thêm Mới Lịch Làm Việc</h4>
      </div>
      <div class="modal-body">
        <form id="form_event">
          <div class="form-group">
              <input type="hidden" class="form-control" name="id">
              <label for="id_nhanVien" class="modal-title">Bác Sĩ & Điều Trị Viên</label>
              <select name="id_nhanVien" class="select form-control">
                @foreach($nhanvien as $nv)
                  <option value="{{$nv->id}}">{{$nv->hoTen}}</option>
                @endforeach
              </select>
              <label for="date" class="modal-title">Chọn Ngày</label>
              <input type="date" name="date" class="form-control">
              <label>Chọn Ca</label>
              <select multiple="multiple" name="Ca[]" id="caid" class="select form-control">
                @foreach($ca as $ca)
                  <option value="{{$ca->id}}">Ca {{$ca->ca}}</option>
                @endforeach
              </select><span id="ca" style="color:red"></span><br>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left deleteEvent">Delete</button>
        <div class="btn-group">
          <button type="button" class="btn btn-secondary pull-rigth" data-dismiss="modal">Close</button>
          <button type="button"  class="btn btn-primary pull-rigth saveEvent">Save changes</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>

<script language="javascript">
    $("#caid").mousedown(function(e) {
      e.preventDefault();

      var select = this;
      var scroll = select.scrollTop;

      e.target.selected = !e.target.selected;

      setTimeout(function() {
        select.scrollTop = scroll;
      }, 0);

      $(select).focus();
    }).mousemove(function(e) {
      e.preventDefault()
    });
</script>