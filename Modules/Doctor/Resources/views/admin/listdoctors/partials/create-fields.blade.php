<div class="box-body">
		<div class="row">
			<div class="col-sm-4">
				<label>Họ tên</label>
				<input type="text" name="hoTen" class="form-control" placeholder="Họ Tên" ><span id="hoten" style="color:red"></span><br>
				<label>Địa chỉ</label>
				<input type="text" name="diaChi" class="form-control" placeholder="Địa Chỉ" ><span id="diachi" style="color:red"></span><br>
				<!-- {!! Form::normalInput('cmnd','CMND', $errors) !!}
				{!! Form::normalInput('phone','SĐT', $errors) !!} -->
				<!-- {!! Form::normalInput('hoTen','Họ Và Tên', $errors) !!}
				{!! Form::normalInput('diaChi','Địa Chỉ', $errors) !!} -->
				<!-- {!! Form::normalInput('notes','Ghi Chú', $errors) !!} -->
				<label>Phân Loại</label>
				<select class="form-control" name="phanLoai" >
	                <option value="Bác Sĩ">Bác Sĩ</option>
	                <option value="Điều Trị Viên">Điều Trị Viên</option>
	            </select>
	            <label>Chuyên Môn</label>
				<select class="form-control" name="chuyenMon" >
	                <option value="Nội Khoa">Nội Khoa</option>
	                <option value="Ngoại Khoa">Ngoại Khoa</option>
	            </select>
			</div>
			<div class="col-sm-4">
				<!-- {!! Form::normalInputOfType('date','ngaySinh','Ngày Sinh', $errors) !!}
				{!! Form::normalInput('gioiTinh','Giới Tính', $errors) !!}
				{!! Form::normalInputOfType('file','Avatar','hình ảnh', $errors) !!} -->
				<label>Ngày sinh</label>
				<input type="date" name="ngaySinh" class="form-control" ><span id="ngaysinh" style="color:red"></span><br>
				<label>Giới Tính</label>
				<select class="form-control" name="gioiTinh" >
	                <option value="Nam">Nam</option>
	                <option value="Nữ">Nữ</option>
	            </select><br>
				<!-- <input type="text" name="gioiTinh" class="form-control" placeholder="Giới Tính" required> -->
				<label>Hình Ảnh</label><br/>
				<label class="file">
					<input type="file" name="Avatar" aria-label="File browser example" >
					<span class="file-custom"></span>
				</label><br>
				<span id="fimage" style="color:red;text-align: right;"></span>
			</div>
		</div>
</div>
