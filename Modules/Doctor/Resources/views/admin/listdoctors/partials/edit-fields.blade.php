<div class="box-body">
    <div class="row">
		<div class="col-sm-4">
			{!! Form::normalInput('hoTen','Họ Và Tên', $errors,$listdoctor) !!}
			{!! Form::normalInput('diaChi','Địa Chỉ', $errors, $listdoctor) !!}
			<!-- {!! Form::normalInput('cmnd','CMND', $errors) !!}
			{!! Form::normalInput('phone','SĐT', $errors) !!} -->
			<!-- {!! Form::normalInput('notes','Ghi Chú', $errors) !!} -->
			<label>Phân Loại</label>
			<select class="form-control" name="phanLoai" >
				@if($listdoctor->phanLoai == "Bác Sĩ" )
                	<option value="Bác Sĩ">Bác Sĩ</option>
	                <option value="Điều Trị Viên">Điều Trị Viên</option>
                @else
                	<option value="Điều Trị Viên">Điều Trị Viên</option>
                	<option value="Bác Sĩ">Bác Sĩ</option>
                @endif
            </select>
            <label>Chuyên Môn</label>
			<select class="form-control" name="chuyenMon" >
				@if($listdoctor->phanLoai == "Nội Khoa")
                	<option value="Nội Khoa">Nội Khoa</option>
	                <option value="Ngoại Khoa">Ngoại Khoa</option>
                @else
                	<option value="Ngoại Khoa">Ngoại Khoa</option>
                	<option value="Nội Khoa">Nội Khoa</option>
                @endif   
            </select>
		</div>
		<div class="col-sm-4">
			{!! Form::normalInputOfType('date','ngaySinh','Ngày Sinh', $errors,$listdoctor) !!}
			<!-- {!! Form::normalInput('gioiTinh','Giới Tính', $errors,$listdoctor) !!} -->
			<label>Giới Tính</label>
			<select class="form-control" name="gioiTinh" >
				@if($listdoctor->gioiTinh == "Nam")
		            <option value="Nam">Nam</option>
		            <option value="Nữ">Nữ</option>
		        @else
		        	<option value="Nữ">Nữ</option>
		        	<option value="Nam">Nam</option>
		        @endif
	        </select><br/>
	        <label>Hình Ảnh</label><br/>
			<!-- {!! Form::normalFile('Avatar','Avatar', $errors,$listdoctor) !!} -->
			<img src="../../../../../assets/images/{{$listdoctor->Avatar}}" height="150px" width="150px"><br>
			<label class="file">
				<input type="file" name="Avatar" aria-label="File browser example">
				<span class="file-custom"></span>
			</label>
		</div>
	</div>
</div>