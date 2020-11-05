<div class="box-body">	
	<div class="row">
		<div class="col-sm-4">
					<div class="form-group ">
					<label for="hoTen">Họ tên:</label>
						<label>{{$listpatient->hoTen}}</label>
					</div>
					<div class="form-group ">
					<label for="cmnd">CMND:</label>
						<label>{{$listpatient->cmnd}}</label>
					</div>
					<div class="form-group ">
					<label for="sdt">Số Điện Thoại:</label>
						<label>{{$listpatient->sdt}}</label>
					</div>
					<div class="form-group ">
					<label for="diaChi">Địa Chỉ:</label>
						<label>{{$listpatient->diaChi}}</label>
					</div>
			</div>
			<div class="col-sm-4">
					<div class="form-group ">
					<label>Giới Tính:</label>
						<label>{{$listpatient->gioiTinh}}</label>
					</div>
					<div class="form-group ">
					<label for="gioiTinh">Ngày Sinh:</label>		
					<label>{{date('d-m-Y',strtotime(str_replace('/','-',$listpatient->ngaySinh))) }}</label>
					</div>
					
					<div class="form-group ">
					<label for="ghiChu">Ghi Chú:</label>
						<label>{{$listpatient->ghiChu}}</label>
					</div>
			</div>
			<div>
			</div>
	</div>
</div>
