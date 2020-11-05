@extends('layouts.master')
@section('content-header')

@stop

@section('content')
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="container bootstrap snippet nav-tabs-custom" style="padding-bottom: 30px;">
        <h2>Thông tin của bạn</h2>
        <hr>
        <div class="row">
            {!! Form::open(['route' => ['admin.account.profile.update', $user->id], 'method' => 'put' ,'enctype'=>'multipart/form-data', 'class' => 'form-validate', 'files'=>true]) !!}

            <div class="col-sm-3">
                <div class="text-center">
                    @if($user->image != NULL)
                        <img src="{{ url('public/assets/img/').$user->image }}" class="avatar img-circle img-thumbnail" alt="avatar">
                    @else
                        <img src="{!! asset('assets/img/logo-1.png') !!}" class="avatar img-circle img-thumbnail" alt="avatar">
                    @endif
                    <h6>Upload a different photo...</h6>
                    <input type="file" name="imagetext" value="{{$user->image}}" class="text-center center-block file-upload">
                </div>
                
                <br>
            </div>
            
            <div class="col-sm-9">
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="first_name">
                                    <h4>Họ</h4>
                                </label>
                                <input type="text" class="form-control field-validate" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any." value="{{$user->first_name}}">
                                <span class=" error-content" hidden="">Trường thông tin này bắt buộc</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="last_name">
                                    <h4>Tên</h4>
                                </label>
                                <input type="text" class="form-control field-validate" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any." value="{{$user->last_name}}">
                                <span class=" error-content" hidden="">Trường thông tin này bắt buộc</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="password2">
                                    <h4>Mật khẩu</h4>
                                </label>
                                <input type="password" class="form-control" name="password" id="password2" placeholder="password" title="enter your password2.">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="password2">
                                    <h4>Xác nhận mật khẩu</h4>
                                </label>
                                <input class="form-control" name="password_confirmation" type="password" value="" id="password_confirmation">
                                <span style="color: red;" class="error-pass" hidden="">Xác nhận mật khẩu không trùng khớp</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="email">
                                    <h4>Email</h4>
                                </label>
                                <input type="email" class="form-control" name="email" id="location" placeholder="somewhere" title="enter a location" value="{{$user->email}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <br>
                                <button class="btn btn-success" type="submit">
                                    <i class="glyphicon glyphicon-ok-sign"></i>Lưu
                                </button>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <!--/tab-pane-->
                </div>
                <!--/tab-pane-->
            </div>
            <!--/tab-content-->
            </form>
        </div>
      </div>





    

@stop

@section('scripts')

    <script type="text/javascript">
    $(document).ready(function() {

        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.avatar').attr('src', e.target.result);
                }
        
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".file-upload").on('change', function(){
            readURL(this);
        });
    });
    </script>
@stop
