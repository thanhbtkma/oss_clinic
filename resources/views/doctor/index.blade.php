@php use function PHPUnit\Framework\isEmpty; @endphp
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card" style="padding: 20px; margin-top: 40px">
            <div class="card-header" style="padding: 20px">
                <div class="row d-flex justify-content-between align-items-center">
                    <h2 class=" col-10 card-title mb-0">Danh sách bác sĩ</h2>
                    <button class="col-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_doctor">Thêm bác
                        sĩ
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên bác sĩ</th>
                        <th scope="col">Email</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Chuyên khoa</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Ghi chú</th>
                        <th scope="col">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($doctors->isNotEmpty())
                        @foreach($doctors as $key => $doctor)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $doctor->name() }}</td>
                                <td>{{ $doctor->email() }}</td>
                                <td>{{ $doctor->phone() }}</td>
                                <td>{{ $doctor->specialization }}</td>
                                <td>{{ $doctor->status }}</td>
                                <td>{{$doctor->note}}</td>
                                <td>
                                    <a href="{{ route('doctor.show', $doctor->id) }}" class="btn btn-primary">Xem</a>
                                    <a href="{{ route('doctor.edit', $doctor->id) }}" class="btn btn-success">Sửa</a>
                                    <a href="{{ route('doctor.destroy', $doctor->id) }}" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center">Không có bác sĩ nào</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!-- The Modal  Add doctor-->
        <div class="modal" id="add_doctor">
            <div class="modal-dialog modal-xl">
                <form action="{{route('doctor')}}" method="post">
                    @csrf
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm bác sĩ</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="row">
                                <!-- Full name -->
                                <div class="col">
                                    <label for="name" class="form-label">Tên bác sĩ</label>
                                    <input type="text" class="form-control"
                                           placeholder="Tên bác sĩ" id="name" name="name" required>
                                </div>
                                <!-- Email -->
                                <div class="col">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control"
                                           placeholder="Email" id="email" name="email" required>
                                </div>
                                <!-- Phone number -->
                                <div class="col">
                                    <label for="phone" class="form-label">Số điện thoại</label>
                                    <input type="tel" class="form-control"
                                           placeholder="Số điện thoại" id="phone" name="phone" pattern="[0-9]{9,10}"
                                           required>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Birth day -->
                                <div class="col">
                                    <label for="birthday" class="form-label">Ngày sinh</label>
                                    <input type="date" class="form-control"
                                           placeholder="Ngày sinh" id="birthday" name="birthday"
                                           required>
                                </div>
                                <!-- Address -->
                                <div class="col">
                                    <label for="address" class="form-label">Địa chỉ</label>
                                    <input type="text" class="form-control"
                                           placeholder="Địa chỉ" id="address" name="address"
                                           required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="row">
                                        <!-- Specialization -->
                                        <div class="col">
                                            <label for="specialization" class="form-label">Chuyên khoa</label>
                                            <input type="text" class="form-control"
                                                   placeholder="Chuyên khoa" id="specialization" name="specialization"
                                                   required>
                                        </div>
                                        <!-- Experience -->
                                        <div class="col">
                                            <label for="experience" class="form-label">Kinh nghiệm (năm)</label>
                                            <input type="number" class="form-control"
                                                   placeholder="Kinh nghiệm" id="experience" name="experience"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Gender -->
                                        <div class="col">
                                            <label for="gender" class="form-label">Giới tính</label>
                                            <select class="form-select" id="gender" name="gender" required>
                                                <option value="" selected>Chọn giới tính</option>
                                                <option value="male">Nam</option>
                                                <option value="female">Nữ</option>
                                                <option value="other">Khác</option>
                                            </select>
                                        </div>
                                        <!-- Status -->
                                        <div class="col">
                                            <label for="status" class="form-label">Trạng thái</label>
                                            <select class="form-select" id="status" name="status" required>
                                                <option value="" selected>Chọn trạng thái</option>
                                                <option value="active">Hoạt động</option>
                                                <option value="inactive">Không hoạt động</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 d-flex justify-content-center align-items-center flex-column">
                                    <img src=" {{ asset("images/circle_person.svg") }}" alt="Avatar"
                                         class="rounded-circle avatar border border-secondary" width="100px"
                                         height="100px">
                                    <button class="btn btn-secondary mt-2" type="button">Change Avatar</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="degree" class="form-label">Bằng cấp</label>
                                    <input type="text" class="form-control"
                                           placeholder="Bằng cấp" id="degree" name="degree"
                                           required>
                                </div>
                                <div class="col">
                                    <label for="school" class="form-label">Trường</label>
                                    <input type="text" class="form-control"
                                           placeholder="Trường" id="school" name="school"
                                           required>
                                </div>
                                <div class="col">
                                    <label for="year" class="form-label">Năm tốt nghiệp</label>
                                    <select class="form-select" id="year" name="year" required>
                                        <option value="" selected>Chọn năm</option>
                                        @for($i = date('Y'); $i >= 1900; $i--)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <label>Ghi chú</label>
                            <textarea class="form-control" rows="5" id="note" name="note"></textarea>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Lưu</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
