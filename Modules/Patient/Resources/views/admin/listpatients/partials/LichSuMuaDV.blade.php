@include('patient::admin.listpatients.partials.themlsmuadichvu')
<h2>Lịch Sử Mua Dịch Vụ</h2>
<div class="table-responsive">
    <table id="tablelsmua" class="data-table table table-bordered table-hover">
        <thead>
            <tr>
                <th style="text-align: center; vertical-align: middle;">id</th>
                <th style="text-align: center; vertical-align: middle;">ID bệnh nhân</th>
                <th style="text-align: center; vertical-align: middle;">Mã Hóa Đơn</th>
                <th style="text-align: center; vertical-align: middle;">Tên Dịch Vụ</th>
                <th style="text-align: center; vertical-align: middle;">Giá</th>
                <th style="text-align: center; vertical-align: middle;">Ngày Mua</th>
                <th style="text-align: center; vertical-align: middle;">Chức Năng</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($dv)): ?>
                <?php foreach ($dv as $chitiet): ?>
                    <tr>
                        <td style="text-align: center; vertical-align: middle;">
                            {{ $chitiet->id }}
                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                            {{ $chitiet->id_benhNhan }}                                    
                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                            {{ $chitiet->maHoaDon }}                         
                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                            {{ $chitiet->tenDichVu }}
                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                            {{ number_format($chitiet->gia) }} đồng.
                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                            {{date('d-m-Y',strtotime(str_replace('/','-',$chitiet->date))) }}      
                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                            <div class="btn-group">
                                <a href="#" class="btn btn-default btn-flat" data-toggle="modal" data-id-dichvu="{{$chitiet->id_dichVu}}" data-id-lsm="{{$chitiet->id}}" data-mahoadon="{{ $chitiet->maHoaDon }}" data-gia="{{$chitiet->gia}}" data-target="#modal_suadichvumua"><i class="fa fa-pencil"></i></a>
                                <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{route('admin.patient.listpatient.lsmuadichvu.destroy',[$chitiet->id,$listpatient->id])}}"><i class="fa fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
@include('patient::admin.listpatients.partials.sualsmuadichvu')
@include('core::partials.delete-modal')