@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card" style="padding: 20px; margin-top: 40px">
            <div class="card-header" style="padding: 20px">
                <div class="row d-flex
                    justify-content-between align-items-center">
                    <h2 class=" col-10 card-title mb-0">Danh sách bệnh nhân</h2>
                    <button class="col-2 btn btn-primary" data-bs-toggle="collapse"
                            data-bs-target="#add_patient">Thêm bệnh nhân
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Giới tính</th>
                        <th scope="col">Email</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($patients->isNotEmpty())
                        @foreach($patients as $patient)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $patient->name }}</td>
                                <td>{{$patient->gender}}</td>
                                <td>{{ $patient->email }}</td>
                                <td>{{ $patient->phone }}</td>
                                <td>
                                    <a href="{{ route('patient.show', $patient->id) }}"
                                       class="btn btn-primary">Xem</a>
                                    <a href="{{ route('patient.edit', $patient->id) }}"
                                       class="btn btn-warning">Sửa</a>
                                    <form action="{{ route('patient.destroy', $patient->id) }}"
                                          method="POST" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa bệnh nhân này không?')">
                                            Xóa
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center">Không có bệnh nhân nào</td>
                        </tr>
                    @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
