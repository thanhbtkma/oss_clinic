@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card" style="padding: 20px; margin-top: 40px">
            <div class="card-header" style="padding: 20px">
                <div class="row d-flex justify-content-between align-items-center">
                    <h2 class=" col-10 card-title mb-0">Danh sách dịch vụ</h2>
                    <button class="col-2 btn btn-primary" data-bs-toggle="collapse" data-bs-target="#add_service">Thêm
                        dịch vụ
                    </button>
                </div>
                <div id="add_service" class="collapse flex-column">
                    <form style="background-color: white;border-radius: 20px;padding: 20px; margin: 40px">
                        <div class="row">
                            <div class="col">
                                <label for="name" class="form-label">Tên dịch vụ</label>
                                <input type="text" class="form-control"
                                       placeholder="Tên dịch vụ" id="name" name="name" required>
                            </div>
                            <div class="col">
                                <label for="charges" class="form-label">Đơn giá</label>
                                <div class="input-group">
                                    <span class="input-group-text">VNĐ</span>
                                    <input type="number" class="form-control" min="1000" max="1000000000"
                                           placeholder="Đơn giá" id="charges" name="charges" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="doctor" class="form-label">Bác sĩ</label>
                                <select class="form-select" id="doctor" name="doctor" required>
                                    <option value="" selected>Chọn bác sĩ</option>
                                    @foreach($doctors as $doctor)
                                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="timePicker" class="form-label">Thời gian</label>
                                <input type="time" class="form-control" id="duration" name="duration">
                            </div>
                        </div>
                        <label for="description">Description</label>
                        <textarea class="form-control" rows="5" id="description" name="description"></textarea>
                        <div>
                            <button type="submit" class="btn btn-primary" style="margin-top: 20px">Lưu</button>
                            <button class="btn btn-outline-primary" style="margin-top: 20px" data-bs-toggle="collapse"
                                    data-bs-target="#add_service">Huỷ
                            </button>

                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên dịch vụ</th>
                        <th scope="col">Bác sĩ</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Thời gian</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($services->isNotEmpty())
                        @foreach($services as $key => $service)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $service->name }}</td>
                                <td>{{ $service->doctor->name }}</td>
                                <td>{{ $service->price }}</td>
                                <td>{{ $service->time }}</td>
                                <td>{{ $service->status }}</td>
                                <td>
                                    <a href="{{ route('service.edit', $service->id) }}" class="btn btn-primary">Sửa</a>
                                    <a href="{{ route('service.delete', $service->id) }}" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center">Không có dịch vụ nào</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
