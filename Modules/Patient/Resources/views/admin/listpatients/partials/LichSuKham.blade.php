<div class="box-body">
<div class="btn-group pull-right" >
                        <button type="button" class= "btn btn-primary btn-flat" data-toggle="modal" data-target="#Modal_lichsukham">Thêm Lịch Sử Khám</button>
                        <div id="Modal_lichsukham" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Thêm Mới Lịch Sử Khám</h4>
                            </div>
                        <div class="modal-body">    
                        <div class="form-group ">  
                        <form method="POST" name="form_lsk" onsubmit="return KT_loi()" action="{{route('admin.patient.listpatient.lichsukhams')}}">  
                        <input type="hidden" name="_token" value="{{csrf_token()}}";>                      
                        <input type="hidden" name="idbenhnhan" value="{{$listpatient->id}}" ></input> 
                            <div class="form-group">
                            <label class="modal-title">Danh sách Bác Sĩ: </label>
                            <select class="form-control" id="dsbacsi1" name="dsbacsi1" >
                                <option value="" disabled selected>Hãy Chọn Tên Bác Sĩ</option>
                                <?php if(isset($dsdoctor)): ?>
                                <?php foreach ($dsdoctor as $ds): ?>
                                    <option value="{{$ds->id}}">{{$ds->hoTen}}</option>
                                <?php endforeach; ?>     
                                <?php endif; ?>       
                            </select><span id="id_Bs"></span>
                            </div>
                            <div class="form-group">
                            <label class="modal-title">Danh sách Dịch Vụ: </label><select class="form-control" id="dsdichvu1" name="dsdichvu1" ><span id="id_DV"></span>
                                <option value="" disabled selected>Hãy Chọn Tên Dịch Vụ</option>
                                <?php if(isset($dv)): ?>
                                <?php foreach ($dv as $dv_moi): ?>
                                    <option value="{{$dv_moi->id}}">{{$dv_moi->tenDichVu}}</option>
                                <?php endforeach; ?>     
                                <?php endif; ?>       
                            </select><span id="id_DV"></span>
                            </div>
                            <div class="form-group">
                            <label class="modal-title">Ghi Chú</label><input id="GHICHU1" class="form-control" type="text" name="GHICHU1"></input><span id="ghichu"></span>
                            </div>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Datasave</button>
                            </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                    
                    <h2>Lịch Sử Khám</h2>
                    <div class="table-responsive">
                    <table id="LSKHAM" class="data-table table table-bordered table-hover">
                            <thead>
                            <tr>                               
                                <th style="text-align: center; vertical-align: middle;">ID</th>
                                <th style="text-align: center; vertical-align: middle;">ID bệnh nhân</th>
                                <th style="text-align: center; vertical-align: middle;">ID nhân viên</th>
                                <th style="text-align: center; vertical-align: middle;">ID dịch vụ</th>
                                <th style="text-align: center; vertical-align: middle;">ghi chú</th>
                                <th style="text-align: center; vertical-align: middle;">ngày</th>
                                <th style="text-align: center; vertical-align: middle;">Chức Năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($details)): ?>
                            <?php foreach ($details as $moi): ?>
                            <tr>
                                <td style="text-align: center; vertical-align: middle;">
                                        {{ $moi->id }}                             
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                        {{ $moi->id_benhNhan }}                                 
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                        {{ $moi->hoTen }}
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                        {{ $moi->tenDichVu }}
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                        {{ $moi->ghiChu }}
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                        {{date('d-m-Y',strtotime(str_replace('/','-',$moi->date))) }}
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <div class="btn-group">
                                        <button type="button" class= "btn btn-default" id="update" data-toggle="modal" data-target="#update_lichsukham" data-id_bn="{{$moi->id_benhNhan}}" data-idlsk="{{$moi->id}}" data-dsdocter="{{ $moi->id_nhanVien }}" data-dsdichvu="{{ $moi->id_dichVu }}" data-ghichu="{{ $moi->ghiChu }}"><i class="fa fa-pencil" data-action-target="{{route('admin.patient.listpatient.updatelsk')}}" ></i></button>
                                        
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.patient.listpatient.delete_LSkham', [$moi->id])}}"><i class="fa fa-trash"></i></button>        
                                    </div>

                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                    </table>
                    <div id="update_lichsukham" class="modal fade" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title">Sửa lịch sử khám</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group ">  
                                                            <form method="POST" action="{{route('admin.patient.listpatient.updatelsk')}}">
                                                                <input type="hidden" name="_token" value="{{csrf_token()}}";>          
                                                                <input type="hidden" id="idbenhnhan" name="idbenhnhan" value="{{$listpatient->id}}" ></input> 
                                                                <div class="form-group">
                                                                    <label class="modal-title">Danh sách Bác Sĩ: </label>
                                                                    <select class="form-control" id="dsbacsi" name="dsbacsi" >
                                                                        <option value="" disabled selected>Hãy Chọn Tên Bác Sĩ</option>
                                                                        <?php if(isset($dsdoctor)): ?>
                                                                        <?php foreach ($dsdoctor as $ds): ?>
                                                                        <option value="{{$ds->id}}">{{$ds->hoTen}}</option>
                                                                        <?php endforeach; ?>     
                                                                        <?php endif; ?>       
                                                                    </select>   
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="modal-title">Danh sách Dịch Vụ: </label>
                                                                    <select class="form-control" id="dsdichvu" name="dsdichvu" >
                                                                        <option value="" disabled selected>Hãy Chọn Tên Dịch Vụ</option>
                                                                        <?php if(isset($dv)): ?>
                                                                        <?php foreach ($dv as $dv_moi): ?>
                                                                        <option value="{{$dv_moi->id}}">{{$dv_moi->tenDichVu}}</option>
                                                                        <?php endforeach; ?>     
                                                                        <?php endif; ?>       
                                                                    </select>
                                                                </div>
                                                                <input type="hidden" id="id_lsk" name="id_lsk" value="">
                                                                <div class="form-group">
                                                                    <label class="modal-title">Ghi Chú</label>
                                                                    <input id="GHICHU" class="form-control" type="text" name="GHICHU"></input>
                                                                </div>
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Datasave</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                        </div> 
                    </div>

                    @include('core::partials.delete-modal')
<script>
    $(document).ready(function(){
        $('#update_lichsukham').on('show.bs.modal', function (event) {     
            var button = $(event.relatedTarget); // Button that triggered the modal
            var status = button.data('ghichu');
            var nv = button.data('dsdocter');
            var dv = button.data('dsdichvu');
            var ID = button.data('idlsk');
            var ID_benhnhan = button.data('id_bn');
            var modal = $(this);  

            modal.find('.modal-body #dsbacsi').val(nv); 
            modal.find('.modal-body #GHICHU').val(status);
            modal.find('.modal-body #dsdichvu').val(dv);
            modal.find('.modal-body #id_lsk').val(ID);
            modal.find('.modal-body #idbenhnhan').val(ID_benhnhan);
        });
    }); 
</script>
<script type="text/javascript">
    function KT_loi() {
        var id_Bs = document.form_lsk.dsbacsi1.value;
        var id_DV = document.form_lsk.dsdichvu1.value;
        var ghichu = document.form_lsk.GHICHU1.value;
        var status = true;
        if (id_Bs == null ||  id_Bs=="") {
            document.getElementById("id_Bs").innerHTML="Bạn chọn bác sĩ";
            status = false;
        }
        if (id_DV == null || id_DV =="") {
            document.getElementById("id_DV").innerHTML="Bạn chọn dịch vụ";
            status = false;
        }
        if (ghichu == null ||ghichu =="") {
            document.getElementById("ghichu").innerHTML="Bạn chưa nhập ghi chú";
            status = false;        
        }
        return status;
    }
</script>
                    