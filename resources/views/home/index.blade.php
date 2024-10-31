@extends('layouts.app')

@section('content')
    <div class="container">
        @include('home.total_header')
        <div class="card" style="padding: 20px; margin-top: 40px">
            <div class="card-header" style="padding: 20px">
                <div class="row d-flex justify-content-between align-items-center">
                    <h2 class=" col-11 card-title mb-0">Danh sách cuộc hẹn ngày hôm nay</h2>
                    <button class="col-1 btn btn-primary">Tải lại</button>
                </div>
            </div>
            <div class="card-body">
                <div class="card-body d-flex align-items-center justify-content-center" style="flex-grow: 1;">
                    Không có cuộc hẹn nào trong ngày hôm nay
                </div>
            </div>
        </div>
    </div>
@endsection
