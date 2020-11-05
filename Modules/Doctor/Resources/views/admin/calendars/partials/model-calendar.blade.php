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
              <label for="Ca" class="modal-title">Chọn Ca</label>
              <select name="Ca" class="select form-control">
                @foreach($ca as $ca)
                  <option value="{{$ca->id}}">Ca {{$ca->ca}}</option>
                @endforeach
              </select>
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