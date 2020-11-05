<script type="text/javascript">
	var inputnumber = 'Chỉ được nhập số';
	function FormatNumber(str) {
		var strTemp = GetNumber(str);
		if (strTemp.length <= 3)
			return strTemp;
		strResult = "";
		for (var i = 0; i < strTemp.length; i++)
			strTemp = strTemp.replace(",", "");
		var m = strTemp.lastIndexOf(".");
		if (m == -1) {
			for (var i = strTemp.length; i >= 0; i--) {
				if (strResult.length > 0 && (strTemp.length - i - 1) % 3 == 0)
					strResult = "," + strResult;
				strResult = strTemp.substring(i, i + 1) + strResult;
			}
		} else {
			var strphannguyen = strTemp.substring(0, strTemp.lastIndexOf("."));
			var strphanthapphan = strTemp.substring(strTemp.lastIndexOf("."),
					strTemp.length);
			var tam = 0;
			for (var i = strphannguyen.length; i >= 0; i--) {

				if (strResult.length > 0 && tam == 4) {
					strResult = "," + strResult;
					tam = 1;
				}

				strResult = strphannguyen.substring(i, i + 1) + strResult;
				tam = tam + 1;
			}
			strResult = strResult + strphanthapphan;
		}
		return strResult;
	}

	function GetNumber(str) {
		var count = 0;
		for (var i = 0; i < str.length; i++) {
			var temp = str.substring(i, i + 1);
			if (!(temp == "," || temp == "." || (temp >= 0 && temp <= 9))) {
				document.getElementById('gias').innerHTML = inputnumber;
				return str.substring(0, i);
			}else{document.getElementById('gias').innerHTML = "";}
			if (temp == " ")
				return str.substring(0, i);
			if (temp == ".") {
				if (count > 0)
					return str.substring(0, ipubl_date);
				count++;
			}
		}
		return str;
	}
</script>
<div class="box-body">
		<div class="row">
			<div class="col-sm-4">
				<label>Mã số</label>
				<input type="text" name="maSo" class="form-control" value="{{$num_id}}" placeholder="Mã số..." style="border-radius: 10px"><span id="maso" style="color:red"></span><br>
				<label>Tên dịch vụ</label>
				<input type="text" name="tenDichVu" class="form-control" placeholder="Tên dịch vụ..." style="border-radius: 10px;"><span id="tendichvu" style="color:red"></span><br>
				<label>Chọn dịch vụ đi kèm</label>
				<select multiple name="dvDinhKem[]" id="nameid" class="select form-control" style="border-radius: 10px;" id="states">
					@foreach($tenDichVu as $tdv)
						<option value="{{$tdv->id}}">{{$tdv->tenDichVu}}</option>
					@endforeach
				</select>
			</div>
			<div class="col-sm-4">
				<label>Giá</label>
				<input type="text" name="gia" onkeyup="this.value=FormatNumber(this.value);" class="form-control" placeholder="12345..." style="border-radius: 10px"><span id="gias" style="color:red"></span><br>
				<label>Ghi chú</label>
				<input type="text" name="ghiChu" class="form-control" placeholder="Ghi chú..." style="border-radius: 10px"><span id="ghichu" style="color:red"></span><br>
				<label>Chi tiết</label>
				<textarea name="chiTiet" rows="5" cols="50" class="form-control" placeholder="Chi tiết..." style="border-radius: 10px"></textarea><span id="chitiet" style="color:red"></span>
			</div>
		</div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">

      $("#nameid").select2({
            placeholder: "Chọn một dịch vụ",
            allowClear: true
        });
</script>

<script language="javascript">
    $("select").mousedown(function(e) {
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


