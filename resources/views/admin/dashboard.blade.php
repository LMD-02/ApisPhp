@extends('layout.master')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header ">
                    <form id="form-filter">
                        <div class="form-group d-flex">
                            <div class="input-group mb-3 w-25 mr-3">
                                <label for="select-course">Tìm kiếm</label>
                                <select class="custom-select select-filter-role" id="select-course" name="courseName">
                                    <option value="" selected>All...</option>
                                    @foreach($data as $each)
                                        <option value="{{ $each->id }}">
                                            {{--                                                    @if ((string)$value === $selectedCourse) selected @endif>--}}
                                            {{$each->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
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
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
        <script>
            $('#select-course').select2();
            $(".js-btn").click(function(e) {
                e.preventDefault();
                var confirmation = confirm("Bạn có chắc chắn không?");
                if (confirmation) {
                    let url = $(this).attr('href');
                    document.location.href = url;
                }
            });
        </script>
    @endpush
@endsection()
