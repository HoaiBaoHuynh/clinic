<script type="text/javascript">
    function validationcreate(){
        var mahoadon = document.createlsmua.maHoaDon.value;
        var id_dichvu = document.createlsmua.id_dichVu.value;
        var Gia = document.createlsmua.gia.value;
        var bien = true;
        var arr = [];
        <?php foreach ($MaHD as $mhd): ?>
            arr.push('{{$mhd->maHoaDon}}');
        <?php endforeach ?>
        var even = (element) => element == mahoadon;
        if (mahoadon == null || mahoadon == "") {
            document.getElementById('mahoadon').innerHTML = "Hãy nhập mã hóa đơn!";
            bien = false;
        }else{
            if(arr.some(even) === true)
            {
                document.getElementById('mahoadon').innerHTML ="Mã hóa đơn " + mahoadon + " đã tồn tại!";
                bien = false;
            }else{
                document.getElementById('mahoadon').innerHTML = "";
            }
        }
        if (id_dichvu == null || id_dichvu == "") {
            document.getElementById('id_dichvu').innerHTML = "Hãy chọn dịch vụ!";
            bien = false;
        }else{
            document.getElementById('id_dichvu').innerHTML = "";
        }
        if (Gia == null || Gia == "") {
            document.getElementById('Gia').innerHTML = "Giá không được rỗng!";
            bien = false;
        }else{
            document.getElementById('Gia').innerHTML = "";
        }
        return bien;
    }
</script>
<div class="btn-group pull-right" >
    <button type="button" class= "btn btn-primary btn-flat" data-toggle="modal" data-target="#Modal_dichvumua">Thêm Lịch Sử Mua Dịch Vụ</button>
    <div id="Modal_dichvumua" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog"role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Thêm Mới Lịch Sử Mua Dịch Vụ</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.patient.listpatient.lsmuadichvu')}}" name="createlsmua" onsubmit="return validationcreate()" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" name="id_benhNhan" class="form-control" value="{{$listpatient->id}}">
                            <label class="modal-title">Mã Hóa Đơn: </label>
                            <input type="text" name="maHoaDon" class="form-control" ></input><span id="mahoadon" style="color:red"></span><br>
                            <br>
                            <label class="modal-title">Danh sách Dịch Vụ: </label>
                            <select id="id_dichVu" onchange="selected1Changed(this)" name="id_dichVu" class="select form-control" >
                                <option value="" disabled selected>Hãy Chọn Tên Dịch Vụ</option>
                                <?php if(isset($DV_moi)): ?>
                                    <?php foreach ($DV_moi as $dv_moi): ?>
                                        <option value="{{$dv_moi->id}}">{{$dv_moi->tenDichVu}}</option>
                                    <?php endforeach; ?>    
                                <?php endif; ?>
                            </select><span id="id_dichvu" style="color:red"></span><br>
                            <br>
                            <label class="modal-title">Giá Dịch Vụ: </label>
                            <input type="text" id="gia" name="gia" class="form-control" value="" readonly="readonly"></input><span id="Gia" style="color:red"></span><br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script language="javascript">
    function selected1Changed(obj)
    {
        var Gia = document.getElementById('gia');
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

