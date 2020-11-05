<div class="box-body">	
	<div class="row">
		<div class="col-sm-4">
					<div class="form-group ">
					<label for="hoTen">Họ tên</label>
						<input class="form-control" placeholder="{{$listpatient->hoTen}}" name="hoTen" type="text"  value="{{$listpatient->hoTen}}" style="border-radius: 10px"><span id="hoten" style="color: red"></span>
					</div>
					<div class="form-group ">
					<label for="cmnd">CMND</label>
						<input class="form-control" placeholder="{{$listpatient->cmnd}}" name="cmnd" type="number" id="cmnd" value="{{$listpatient->cmnd}}" style="border-radius: 10px"><span id="CMND" style="color: red"></span>
					</div>
					<div class="form-group ">
					<label for="sdt">Số Điện Thoại</label>
						<input class="form-control" placeholder="{{$listpatient->sdt}}" name="sdt" type="number" id="sdt" value="{{$listpatient->sdt}}" style="border-radius: 10px"><span id="SDT" style="color: red"></span>
					</div>
					<div class="form-group ">
					<label for="diaChi">Địa Chỉ</label>
						<input class="form-control" placeholder="{{$listpatient->diaChi}}" name="diaChi" type="text" id="diaChi" value="{{$listpatient->diaChi}}" style="border-radius: 10px"><span id="diachi" style="color: red"></span>
					</div>
			</div>
			<div class="col-sm-4">
					<div class="form-group ">
					<label>Giới Tính</label>
					<select class="form-control" name="gioiTinh" style="border-radius: 10px">
	                	<option value="nam">Nam</option>
	                	<option value="nữ">Nữ</option>
	            	</select>
					</div>
					<div class="form-group ">
					<label for="gioiTinh">Ngày Sinh</label>
						<input class="form-control" placeholder="{{date($listpatient->ngaySinh)}}" name="ngaySinh" type="date" id="ngaySinh" style="border-radius: 10px"value="{{date($listpatient->ngaySinh)}}" ><span id="ngaysinh"></span>
					</div>

					<div class="form-group ">
					<label for="ghiChu">Ghi Chú</label>
						<input class="form-control" placeholder="{{$listpatient->ghiChu}}" name="ghiChu" type="text" id="ghiChu" value="{{$listpatient->ghiChu}}" style="border-radius: 10px"><span id="ghichu"></span>
					</div>
			</div>
	</div>
</div>
