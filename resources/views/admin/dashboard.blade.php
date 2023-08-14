@extends('layout.master')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header w-100">
                    <button class="btn btn-success btn-create-facebook">Cấu hình Facebook</button>

                    <button class="btn btn-success btn-create-google">Cấu hình Google</button>

                    <button class="btn btn-warning btn-send-mail" style="float:right; margin-left:6px">Gửi cảnh báo</button>

                    <button class="btn btn-primary btn-update-time " style="float:right">Cấu hình Thời gian</button>

                </div>
                <div class="card-body">
                    <table class="table table-hover table-centered mb-0">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Ảnh</th>
                            <th>Mã sinh viên</th>
                            <th>Email</th>
                            <th>Facebook</th>
                            <th>Google</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $each)
                            <tr>
                                <td>
                                    <a href="">
                                        #{{$each->id}}
                                    </a>
                                </td>
                                <td>
                                    <div>
                                        <img style="width:50px;height: 50px" src="{{$each->avatar}}">
                                    </div>
                                </td>
                                <td>
                                    {{ $each->username }}
                                </td>
                                <td>

                                    {{ $each->email }}
                                </td>
                                <td>
                                    @if(isset($each->facebook))
                                        thời gian sử dụng: <strong>{{$each->facebookTime}}</strong> <br>
                                        @if($each->facebook->status == 0)
                                            <a href="{{route('updateStatus',['user_id'=> $each->id,'status'=>'-1','type'=>'facebook'])}}"
                                               class="js-btn btn btn-sm btn-danger">Chặn</a>
                                        @else
                                            <a href="{{route('updateStatus',['user_id'=> $each->id,'status'=>'0','type'=>'facebook'])}}"
                                               class="js-btn btn btn-sm btn-success">Bỏ chặn</a>
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @if(isset($each->facebook))
                                        thời gian sử dụng: <strong>{{$each->googleTime}}</strong> <br>

                                        @if($each->google->status == 0)
                                            <a href="{{route('updateStatus',['user_id'=> $each->id,'status'=>'-1','type'=>'google'])}}"
                                               class="js-btn btn btn-sm btn-danger">Chặn</a>
                                        @else
                                            <a href="{{route('updateStatus',['user_id'=> $each->id,'status'=>'0','type'=>'google'])}}"
                                               class="js-btn btn btn-sm btn-success">Bỏ chặn</a>
                                        @endif
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav>
                        <ul class="pagination pagination-rounded mb-0">
                            {{ $data->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-create-google" class="modal" tabindex="-1" role="dialog" style="background-color:rgba(0,0,0,0.5)">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cấu hình </h5>
                    <button type="button" onclick="hidemodel('modal-create-google')" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="height: 100%;overflow:auto;">
                    <div class=" card card-inner p-3">
                        <div class="d-flex align-center justify-content-between  w-100">
                            <div class="fw-bold" style="font-size:25px">Cấu hình Google</div>
                            <img style="width:60px;height: 60px" src="{{asset('images/logo/google.png')}}">
                        </div>
                        <form action='{{route('admin.config')}}' class="d-flex flex-column " method="POST">
                            @csrf
                            <div class="form-group d-flex mb-3">
                                <input name="type" type="hidden" value="google">

                                {{--                                <div class="col-md-12  ">--}}
                                {{--                                    <label for="account_google">Tài khoản Google</label>--}}

                                {{--                                    @if((isset($userSocial['google']->username)) && $userSocial['google']->username != null)--}}
                                {{--                                        <input name="name" value="{{$userSocial['google']->username}}"--}}
                                {{--                                               class="form-control" disabled id="account_facebook" type="text">--}}
                                {{--                                    @else--}}
                                {{--                                        <input name="name" id="account_google" type="text" class="form-control"--}}
                                {{--                                               placeholder="Lưu ý tài chỉ được cấu hình tài khoản 1 lần duy nhất">--}}
                                {{--                                    @endif--}}
                                {{--                                </div>--}}
                            </div>
                            <div class="col-md-12 mt-3 d-flex align-center flex-column">
                                <label for="warning-fb">Cảnh báo</label>
                                <div class="justify-content-center">
                                    <input name="warning" type="radio"
                                           @if(isset($userSocial['google']->warning) && $userSocial['google']->warning == 0)  checked
                                           @endif  class="form-button" value="0"> <span class="mr-3">Tắt</span>
                                    <input name="warning" type="radio"
                                           @if(isset($userSocial['google']->warning) && $userSocial['google']->warning == 1) checked
                                           @endif  class="form-button" value="1"> <span class="mr-3">Bật</span>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3 d-flex align-center flex-column">
                                <label for="check-fb">Xác minh 2 bước</label>
                                <div class="justify-content-center">
                                    <input name="check"
                                           @if(isset($userSocial['google']->two_factor) && $userSocial['google']->two_factor == 0)  checked
                                           @endif type="radio" class="form-button" value="0"> <span
                                        class="mr-3">Tắt</span>
                                    <input name="check" type="radio"
                                           @if(isset($userSocial['google']->two_factor) && $userSocial['google']->two_factor == 1)  checked
                                           @endif   class="form-button" value="1"> <span class="mr-3">Bật</span>
                                </div>
                            </div>
                            <button class="mt-3 btn btn-success">Lưu thông tin</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-create-facebook" class="modal" tabindex="-1" role="dialog" style="background-color:rgba(0,0,0,0.5)">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cấu hình </h5>
                    <button type="button" onclick="hidemodel('modal-create-facebook')" class="close"
                            data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="height: 100%;overflow:auto;">
                    <div class=" card card-inner p-3">
                        <div class="d-flex align-center justify-content-between  w-100">
                            <div class="fw-bold" style="font-size:25px">Cấu hình Facebook</div>
                            <img style="width:60px;height: 60px" src="{{asset('images/logo/facebook.png')}}">
                        </div>
                        <form action='{{route('admin.config')}}' class="d-flex flex-column " method="POST">
                            @csrf
                            <div class="form-group  mb-3">
                                <input name="type" type="hidden" value="facebook">

                                {{--                                <div class="col-md-12  ">--}}
                                {{--                                    <label for="account_facebook">Tài khoản facebook</label>--}}
                                {{--                                    @if(isset($userSocial['facebook']->username) && $userSocial['facebook']->username != null)--}}
                                {{--                                        <input name="name" value="{{$userSocial['facebook']->username}}"--}}
                                {{--                                               class="form-control" disabled id="account_facebook" type="text">--}}
                                {{--                                    @else--}}
                                {{--                                        <input name="name" id="account_facebook" type="text" class="form-control"--}}
                                {{--                                               placeholder="Lưu ý tài chỉ được cấu hình tài khoản 1 lần duy nhất">--}}
                                {{--                                    @endif--}}
                                {{--                                </div>--}}
                                <div class="col-md-12 mt-3 d-flex align-center flex-column">
                                    <label for="warning-fb">Cảnh báo</label>
                                    <div class="justify-content-center">
                                        <input name="warning" type="radio"
                                               @if(isset($userSocial['facebook']->warning ) && $userSocial['facebook']->warning == 0)  checked
                                               @endif  class="form-button" value="0"> <span class="mr-3">Tắt</span>
                                        <input name="warning" type="radio"
                                               @if(isset($userSocial['facebook']->warning ) && $userSocial['facebook']->warning == 1)  checked
                                               @endif  class="form-button" value="1"> <span class="mr-3">Bật</span>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3 d-flex align-center flex-column">
                                    <label for="check-fb">Xác minh 2 bước</label>
                                    <div class="justify-content-center">
                                        <input name="check"
                                               @if(isset($userSocial['facebook']->two_factor) && $userSocial['facebook']->two_factor == 0)  checked
                                               @endif type="radio" class="form-button" value="0"> <span
                                            class="mr-3">Tắt</span>
                                        <input name="check" type="radio"
                                               @if(isset($userSocial['facebook']->two_factor) && $userSocial['facebook']->two_factor == 1)  checked
                                               @endif   class="form-button" value="1"> <span class="mr-3">Bật</span>
                                    </div>
                                </div>

                            </div>
                            <button class="mt-3 btn btn-success">Lưu thông tin</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="modal-update-time" class="modal" tabindex="-1" role="dialog" style="background-color:rgba(0,0,0,0.5)">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Giới hạn đăng nhập </h5>
                    <button type="button" onclick="hidemodel('modal-update-time')" class="close"
                            data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="height: 100%;overflow:auto;">
                    <div class=" card card-inner p-3">
                        <div class="d-flex align-center justify-content-between  w-100">
                            <div class="fw-bold" style="font-size:25px">Thời gian</div>
                        </div>
                        <form action='{{route('admin.time')}}' class="d-flex flex-column mt-2" method="POST">
                            @csrf
                            <div class="form-group  mb-3">
                                <select name="time" class="form-control">
                                    <option @if($time == '00:15:00') selected @endif value="00:15:00">15 phút</option>
                                    <option @if($time == '00:30:00') selected @endif value="00:30:00">30 phút</option>
                                    <option @if($time == '00:45:00') selected @endif value="00:45:00">45 phút</option>
                                    <option @if($time == '01:00:00') selected @endif value="01:00:00">1 giờ</option>
                                    <option @if($time == '01:30:00') selected @endif value="01:30:00">1 giờ 30 phút
                                    </option>
                                </select>
                                <button class="mt-3 btn btn-success">Lưu thông tin</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="modal-send-mail" class="modal" tabindex="-1" role="dialog" style="background-color:rgba(0,0,0,0.5)">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Gửi cảnh báo </h5>
                    <button type="button" onclick="hidemodel('modal-send-mail')" class="close"
                            data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="height: 100%;overflow:auto;">
                    <div class=" card card-inner p-3">
                        <div class="d-flex align-center justify-content-between  w-100">
                            <div class="fw-bold" style="font-size:25px">Chọn sinh viên</div>
                        </div>
                        <form action='{{route('admin.warning')}}' class="d-flex flex-column mt-2" method="POST">
                            @csrf
                            <div class="form-group  mb-3">
                                    <select name="username" class="form-control">
                                        @foreach ($data as $each)
                                            <option value="{{$each->email}}">{{$each->username}}
                                            </option>
                                        @endforeach
                                    </select>
                                <button class="mt-3 btn btn-danger">Gửi cảnh báo</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
        <script>
            $('#select-course').select2();
            $(".js-btn").click(function (e) {
                e.preventDefault();
                var confirmation = confirm("Bạn có chắc chắn không?");
                if (confirmation) {
                    let url = $(this).attr('href');
                    document.location.href = url;
                }
            });
            $('.btn-create-facebook').click(function (event) {
                event.preventDefault();
                $('#modal-create-facebook').show();
            });
            $('.btn-create-google').click(function (event) {
                event.preventDefault();
                $('#modal-create-google').show();
            });
            $('.btn-update-time').click(function (event) {
                event.preventDefault();
                $('#modal-update-time').show();
            });
            $('.btn-send-mail').click(function (event) {
                event.preventDefault();
                $('#modal-send-mail').show();
            });

            function hidemodel(idName) {
                $('#' + idName).hide();
            }
        </script>
    @endpush
@endsection()
