@extends('layout.master')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header ">
                    <button class="btn btn-success btn-create-facebook">Cấu hình Facebook</button>

                    <button class="btn btn-success btn-create-google">Cấu hình Google</button>

                </div>
                <div class="card-body">
                    <table class="table table-hover table-centered mb-0">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Ứng dụng</th>
                            <th>Tài khoản ứng dụng</th>
                            <th>Trạng thái</th>
                            <th>thời gian sử dụng</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>

                                1
                            </td>
                            <td>
                                <div>
                                    <img style="width:50px;height: 50px" src="{{asset('images/logo/google.png')}}">
                                </div>
                            </td>
                            <td>
                                @if(isset($userSocial['google']->username))
                                    {{$userSocial['google']->username}}
                                @endif
                            </td>

                            @if(isset($sosial['google']))

                                @if($sosial['google']->status == 0)
                                    <td style="color:green">
                                        Hoạt động
                                    </td>
                                @else
                                    <td style="color:green">
                                        Bị khóa
                                    </td>
                                @endif
                            @else
                                <td >
                                </td>
                            @endif
                            @if(isset($time['google']) && $time['google']->time != null)
                                <td>{{$time['google']->time}}</td>
                            @else
                                <td></td>
                            @endif
                            <td>
                                @if(isset($sosial['google']))
                                    @if($sosial['google']->status == 0)
                                        <button data-type="google" class="btn js-btn-login-social btn-sm btn-primary">
                                            Truy cập
                                        </button>
                                    @endif

                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>

                                1
                            </td>
                            <td>
                                <div>
                                    <img style="width:50px;height: 50px" src="{{asset('images/logo/facebook.png')}}">
                                </div>
                            </td>
                            <td>
                                @if(isset($userSocial['facebook']->username))
                                    {{$userSocial['facebook']->username}}
                                @endif
                            </td>
                            @if(isset($sosial['facebook']))
                                @if($sosial['facebook']->status == 0)
                                    <td style="color:green">
                                        Hoạt động
                                    </td>
                                @else
                                    <td style="color:green">
                                        Bị khóa
                                    </td>
                                @endif
                            @else
                                <td >
                                </td>
                            @endif
                            @if(isset($time['facebook']) && $time['facebook']->time != null)
                            <td>{{$time['facebook']->time}}</td>
                            @else
                                <td></td>
                            @endif
                            <td>
                                @if(isset($sosial['facebook']))

                                    @if($sosial['facebook']->status == 0)
                                        <button data-type="facebook" class="btn js-btn-login-social btn-sm btn-primary">
                                            Truy cập
                                        </button>
                                    @endif
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    {{--                    <nav>--}}
                    {{--                        <ul class="pagination pagination-rounded mb-0">--}}
                    {{--                            {{ $data->links() }}--}}
                    {{--                        </ul>--}}
                    {{--                    </nav>--}}
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
                        <form action='{{route('user.config')}}' class="d-flex flex-column " method="POST">
                            @csrf
                            <div class="form-group d-flex mb-3">
                                <input name="type" type="hidden" value="google">

                                <div class="col-md-12  ">
                                    <label for="account_google">Tài khoản Google</label>

                                    @if((isset($userSocial['google']->username)) && $userSocial['google']->username != null)
                                        <input name="name" value="{{$userSocial['google']->username}}"
                                               class="form-control" disabled id="account_facebook" type="text">
                                    @else
                                        <input name="name" id="account_google" type="text" class="form-control"
                                               placeholder="Lưu ý tài chỉ được cấu hình tài khoản 1 lần duy nhất">
                                    @endif
                                </div>
                            </div>
{{--                            <div class="col-md-12 mt-3 d-flex align-center flex-column">--}}
{{--                                <label for="warning-fb">Cảnh báo</label>--}}
{{--                                <div class="justify-content-center">--}}
{{--                                    <input name="warning" type="radio"--}}
{{--                                           @if(isset($userSocial['google']->warning) && $userSocial['google']->warning == 0)  checked--}}
{{--                                           @endif  class="form-button" value="0"> <span class="mr-3">Tắt</span>--}}
{{--                                    <input name="warning" type="radio"--}}
{{--                                           @if(isset($userSocial['google']->warning) && $userSocial['google']->warning == 1) checked--}}
{{--                                           @endif  class="form-button" value="1"> <span class="mr-3">Bật</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-12 mt-3 d-flex align-center flex-column">--}}
{{--                                <label for="check-fb">Xác minh 2 bước</label>--}}
{{--                                <div class="justify-content-center">--}}
{{--                                    <input name="check"--}}
{{--                                           @if(isset($userSocial['google']->two_factor) && $userSocial['google']->two_factor == 0)  checked--}}
{{--                                           @endif type="radio" class="form-button" value="0"> <span--}}
{{--                                        class="mr-3">Tắt</span>--}}
{{--                                    <input name="check" type="radio"--}}
{{--                                           @if(isset($userSocial['google']->two_factor) && $userSocial['google']->two_factor == 1)  checked--}}
{{--                                           @endif   class="form-button" value="1"> <span class="mr-3">Bật</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
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
                        <form action='{{route('user.config')}}' class="d-flex flex-column " method="POST">
                            @csrf
                            <div class="form-group  mb-3">
                                <input name="type" type="hidden" value="facebook">

                                <div class="col-md-12  ">
                                    <label for="account_facebook">Tài khoản facebook</label>
                                    @if(isset($userSocial['facebook']->username) && $userSocial['facebook']->username != null)
                                        <input name="name" value="{{$userSocial['facebook']->username}}"
                                               class="form-control" disabled id="account_facebook" type="text">
                                    @else
                                        <input name="name" id="account_facebook" type="text" class="form-control"
                                               placeholder="Lưu ý tài chỉ được cấu hình tài khoản 1 lần duy nhất">
                                    @endif
                                </div>
{{--                                <div class="col-md-12 mt-3 d-flex align-center flex-column">--}}
{{--                                    <label for="warning-fb">Cảnh báo</label>--}}
{{--                                    <div class="justify-content-center">--}}
{{--                                        <input name="warning" type="radio"--}}
{{--                                               @if(isset($userSocial['facebook']->warning ) && $userSocial['facebook']->warning == 0)  checked--}}
{{--                                               @endif  class="form-button" value="0"> <span class="mr-3">Tắt</span>--}}
{{--                                        <input name="warning" type="radio"--}}
{{--                                               @if(isset($userSocial['facebook']->warning ) && $userSocial['facebook']->warning == 1)  checked--}}
{{--                                               @endif  class="form-button" value="1"> <span class="mr-3">Bật</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-12 mt-3 d-flex align-center flex-column">--}}
{{--                                    <label for="check-fb">Xác minh 2 bước</label>--}}
{{--                                    <div class="justify-content-center">--}}
{{--                                        <input name="check"--}}
{{--                                               @if(isset($userSocial['facebook']->two_factor) && $userSocial['facebook']->two_factor == 0)  checked--}}
{{--                                               @endif type="radio" class="form-button" value="0"> <span--}}
{{--                                            class="mr-3">Tắt</span>--}}
{{--                                        <input name="check" type="radio"--}}
{{--                                               @if(isset($userSocial['facebook']->two_factor) && $userSocial['facebook']->two_factor == 1)  checked--}}
{{--                                               @endif   class="form-button" value="1"> <span class="mr-3">Bật</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                            </div>
                            <button class="mt-3 btn btn-success">Lưu thông tin</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="modal-otp" class="modal" tabindex="-1" role="dialog" style="background-color:rgba(0,0,0,0.5)">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xác thực OTP </h5>
                    <button type="button" onclick="hidemodel('modal-otp')" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="height: 100%;overflow:auto;">
                    <div class=" card card-inner p-3">
                        <form action='' class="d-flex flex-column js-form-otp" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input name="type" type="hidden" value="">

                                <div class="col-md-12  ">
                                    <label for="otp">Mã xác thực</label>
                                    <input name="name" id="otp" type="text" class="form-control"
                                           placeholder="Nhập mã OTP ">
                                </div>
                            </div>
                            <button type="button" class="mt-3 btn btn-success js-send-otp">Xác thực</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="modal-pass" class="modal" tabindex="-1" role="dialog" style="background-color:rgba(0,0,0,0.5)">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Đăng nhập </h5>
                    <button type="button" onclick="hidemodel('modal-pass')" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="height: 100%;overflow:auto;">
                    <div class=" card card-inner p-3">
                        <form action='' class="d-flex flex-column " method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input name="type" type="hidden" value="">
                                <div class="col-md-12  ">
                                    <label for="username">Tài khoản </label>
                                    <input id="username" type="text" disabled class="form-control">
                                </div>
                                <div class="col-md-12  ">
                                    <label for="password">Mật khẩu</label>
                                    <input name="password" type="password" id="password" class="form-control"
                                           placeholder="nhập mật khẩu">
                                </div>
                            </div>
                            <button type="button" class="mt-3 btn btn-success js-login-social-end">Đăng nhập</button>
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
            $('.js-btn-login-social').click(function (event) {
                event.preventDefault();
                let $type = $(this).data('type');
                var dataFromLocalStorage = '';
                if ($type == "facebook") {
                    dataFromLocalStorage = localStorage.getItem('token_facebook');
                } else if ($type == "google") {
                    dataFromLocalStorage = localStorage.getItem('token_google');
                }

                $.ajax({
                    url: '{{route('user.login.social')}}',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        token_storage: dataFromLocalStorage,
                        type: $type,
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response) {
                        if (response.status == '-1') {
                            $.toast({
                                heading: 'Thông báo',
                                text: response.message,
                                showHideTransition: 'fade',
                                icon: 'success',
                                hideAfter: 5000,
                                position: 'top-right',
                            })
                            $('#modal-otp input[name="type"]').val($type);
                            $('#modal-otp').show();
                        } else if (response.status == '-2') {
                            $.toast({
                                heading: 'Thông báo !',
                                text: response.message,
                                showHideTransition: 'fade',
                                width: '100%',
                                hideAfter: 5000,
                                icon: 'success',
                                position: 'top-right',
                            })
                            $('#modal-pass #username').val(response.data);
                            $('#modal-pass input[name="type"]').val($type);
                            $('#modal-pass').show();
                        } else if (response.status == '1') {
                            $.toast({
                                heading: 'Thông báo !',
                                text: response.message,
                                showHideTransition: 'fade',
                                width: '100%',
                                hideAfter: 5000,
                                icon: 'success',
                                position: 'top-right',
                            })
                            setTimeout(function () {
                                window.location.href = `${response.route}`;
                            }, 3000)
                        }
                    }
                })
            });

            $('.js-login-social-end').on('click', function (e) {
                e.preventDefault();
                let $data = $('#modal-pass form').serialize();
                $.ajax({
                    url: '{{route('user.login.social.end')}}',
                    type: 'POST',
                    dataType: 'json',
                    data: $data,
                    success: function (data) {
                        if (data.status == 1) {
                            if (data.type == "facebook") {
                                localStorage.setItem('token_facebook', data.token);
                            } else if (data.type == "google") {
                                localStorage.setItem('token_google', data.token);
                            }
                            window.location.href = `${data.route}`;
                        } else {
                            $.toast({
                                heading: 'Error !',
                                text: data.message,
                                showHideTransition: 'fade',
                                width: '100%',
                                hideAfter: 5000,
                                icon: 'error',
                                position: 'top-right',
                            })
                        }
                    }
                })
            });
            $('.js-send-otp').on('click', function (e) {
                let $type = $('#modal-otp input[name="type"]').val();
                let dataFromLocalStorage = '';
                if ($type == "facebook") {
                    dataFromLocalStorage = localStorage.getItem('token_facebook');
                } else if ($type == "google") {
                    dataFromLocalStorage = localStorage.getItem('token_google');
                }
                $('#modal-otp form').append(`<input type="hidden" name="token_storage" value="${dataFromLocalStorage}">`);
                let $data = $('#modal-otp form').serialize();

                $.ajax({
                    url: '{{route('user.check.otp')}}',
                    type: 'POST',
                    dataType: 'json',
                    data: $data,
                    success: function (data) {
                        if (data.status == '1') {
                            $.toast({
                                heading: 'Thông báo',
                                text: data.message,
                                showHideTransition: 'fade',
                                icon: 'success',
                                hideAfter: 5000,
                                position: 'top-right',
                            })
                            $('#modal-pass #username').val(data.data);
                            $('#modal-otp').hide();
                            $('#modal-pass input[name="type"]').val(data.type);
                            $('#modal-pass').show();
                        } else if (data.status == '2') {
                            $.toast({
                                heading: 'Thông báo',
                                text: data.message,
                                showHideTransition: 'fade',
                                icon: 'success',
                                hideAfter: 5000,
                                position: 'top-right',
                            })
                            setTimeout(function () {
                                document.location.href = data.route;
                            }, 3000)
                        } else if (data.status == '-1') {
                            $.toast({
                                heading: 'Thông báo',
                                text: data.message,
                                showHideTransition: 'fade',
                                icon: 'error',
                                hideAfter: 5000,
                                position: 'top-right',
                            })
                        }
                    }
                })
            });
            $('.btn-create-facebook').click(function (event) {
                event.preventDefault();
                $('#modal-create-facebook').show();
            });
            $('.btn-create-google').click(function (event) {
                event.preventDefault();
                $('#modal-create-google').show();
            });

            function hidemodel(idName) {
                $('#' + idName).hide();
            }

            function submitForm(formType, modalName) {
                const obj = $("#form-create-" + formType);
                var formData = new FormData(obj[0]);
                $.ajax({
                    url: obj.attr('action'),
                    type: 'POST',
                    dataType: 'json',
                    data: formData,
                    processData: false,
                    contentType: false,
                    async: true,
                    cache: false,
                    enctype: 'multipart/form-data',
                    success: function (response) {
                        hidemodel(modalName)
                        $.toast({
                            heading: 'Success !',
                            text: `Your ${formType} have been created.`,
                            showHideTransition: 'fade',
                            icon: 'success',
                            hideAfter: 5000,
                            position: 'top-right',
                        })
                        window.setTimeout(function () {
                            window.location.href = "{{route('user')}}";
                        }, 1500);

                    },
                    error: function (response) {
                        const errors = Object.values(response.responseJSON.errors);
                        errors.forEach(function (each) {
                            each.forEach(function (error) {
                                $.toast({
                                    heading: 'Error !',
                                    text: error,
                                    showHideTransition: 'fade',
                                    width: '100%',
                                    hideAfter: 5000,
                                    icon: 'error',
                                    position: 'top-right',
                                })
                            });
                        });
                    }
                });
            }
        </script>
    @endpush
@endsection()
