@extends('layout.master')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header " >
                    <button class="btn btn-success ">Cấu hình đăng nhập</button>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-centered mb-0">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Ứng dụng</th>
                            <th>Tài khoản ứng dụng</th>
                            <th>Trạng thái</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>

                                        1
                                </td>
                                <td>
                                    <div >
                                        <img  style="width:50px;height: 50px" src="{{asset('images/logo/google.png')}}">
                                    </div>
                                </td>
                                <td>
                                    mduc@gmail.com
                                </td>
                                <td style="color:green">
                                    Đang hoạt động
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Truy cập</button>
                                </td>
                            </tr>

                            <tr>
                                <td>

                                    1
                                </td>
                                <td>
                                    <div >
                                        <img  style="width:50px;height: 50px" src="{{asset('images/logo/facebook.png')}}">
                                    </div>
                                </td>
                                <td>
                                    ducasdas@gmail.com
                                </td>
                                <td style="color:green">
                                    Đang hoạt động
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Truy cập</button>
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
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
        <script>

        </script>
    @endpush
@endsection()
