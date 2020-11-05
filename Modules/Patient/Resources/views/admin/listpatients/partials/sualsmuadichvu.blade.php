<!-- <script type="text/javascript">
    $(function(){
        $('#tablelsmua a').click(function(e) {
            var table = $('#tablelsmua').DataTable();
            var fmhd = document.getElementById('fmaHoaDon');
            e.preventDefault();
            var data = table.row($(this).closest('tr')).data();
            fmhd.value = data[2];
        });
    });
</script> -->

<script type="text/javascript">
    function validationedit(){
        var fmahoadon = document.updatelsmua.fmaHoaDon.value;
        var mhd = document.updatelsmua.abc.value;
        var fid_dichvu = document.updatelsmua.fid_dichVu.value;
        var fGia = document.updatelsmua.fgia.value;
        var fbien = true;
        var farr = [];
        if (fmahoadon == null || fmahoadon == "") {
            document.getElementById('fmahoadon').innerHTML = "Hãy nhập mã hóa đơn!";
            fbien = false;
        }else{
            <?php foreach ($MaHD as $mhd): ?>
                if("{{$mhd->maHoaDon}}" != mhd){
                    farr.push('{{$mhd->maHoaDon}}');
                }
            <?php endforeach ?>
            var even = (element) => element == fmahoadon;
            if(farr.some(even) === true)
            {
                document.getElementById('fmahoadon').innerHTML ="Mã hóa đơn " + fmahoadon + " đã tồn tại!";
                fbien = false;
            }else{
                document.getElementById('fmahoadon').innerHTML = "";
            }
        }
        if (fid_dichvu == null || fid_dichvu == "") {
            document.getElementById('fid_dichvu').innerHTML = "Hãy chọn dịch vụ!";
            fbien = false;
        }else{
            document.getElementById('fid_dichvu').innerHTML = "";
        }
        if (fGia == null || fGia == "") {
            document.getElementById('fGia').innerHTML = "Giá không được rỗng!";
            fbien = false;
        }else{
            document.getElementById('fGia').innerHTML = "";
        }
        return fbien;
    }
</script>
<div id="modal_suadichvumua" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Sửa Lịch Sử Mua Dịch Vụ</h4>
            </div>
            <form action="{{route('admin.patient.lsmuadichvu.updateLSmuadichvu')}}" name="updatelsmua" method="POST" id="editform" enctype="multipart/form-data" onsubmit="return validationedit()">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id_benhNhan" class="form-control" value="{{$listpatient->id}}">
                        <input type="hidden" name="idlsmua" id="idlsm" class="form-control" value=""></input>
                        <input type="hidden" name="abc" id="abc" class="form-control" value=""></input>
                        <label class="modal-title">Mã Hóa Đơn: </label>
                        <input type="text" name="maHoaDon" id="fmaHoaDon" class="form-control" value=""></input><span id="fmahoadon" style="color:red"></span>
                        <br>
                        <label class="modal-title">Danh sách Dịch Vụ: </label>
                        <select name="id_dichVu" id="fid_dichVu" onchange="selectedChanged(this)" class="select form-control" >
                            <option value="" disabled selected>Hãy Chọn Tên Dịch Vụ</option>
                            <?php if(isset($DV_moi)): ?>
                                <?php foreach ($DV_moi as $dv_moi): ?>
                                    <option value="{{$dv_moi->id}}">{{$dv_moi->tenDichVu}}</option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select><span id="fid_dichvu" style="color:red"></span>
                        <br>
                        <label class="modal-title">Giá Dịch Vụ: </label>
                        <input type="text" name="gia" id="fgia" class="form-control" value=""></input><span id="fGia" style="color:red"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script language="javascript">
    function selectedChanged(obj)
    {
        var Gia = document.getElementById('fgia');
        var value = obj.value;
        var bien = "";
        <?php foreach ($DV_moi as $dvm): ?>
            if (value == {{$dvm->id}}) {
                bien = "{{$dvm->gia}}";
            }
        <?php endforeach ?>
        Gia.value = bien;
    }
</script>
<script>
    $(document).ready(function(){
        $('#modal_suadichvumua').on('show.bs.modal', function (event) {     
            var a = $(event.relatedTarget); // Button that triggered the modal
            var id_dichvu = a.data('id-dichvu');
            var id_lsm = a.data('id-lsm');
            var gia = a.data('gia');
            var mahoadon = a.data('mahoadon');
            var modal = $(this);

            modal.find('.modal-body #fid_dichVu').val(id_dichvu);
            modal.find('.modal-body #idlsm').val(id_lsm);
            modal.find('.modal-body #fgia').val(gia);
            modal.find('.modal-body #fmaHoaDon').val(mahoadon);
            modal.find('.modal-body #abc').val(mahoadon);
        });
   }); 
</script>
