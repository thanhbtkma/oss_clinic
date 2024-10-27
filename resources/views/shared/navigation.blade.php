@php use Illuminate\Support\Facades\Auth; @endphp
<nav class="nav flex-column bg-light p-3" style="width: 250px;">
    <div class="text-center mb-3">
        <img src="{{ asset('images/small_logo.png') }}" alt="Website Logo" style="width: 250px; height: 100px;">
    </div>
    <!-- Navigation items here -->
    @if(Auth::user() && Auth::user()->role === "admin")
        <ul class="nav flex-column">
            <li class="nav-item d-flex align-items-center {{ request()->is('home') ? 'active' : '' }}">
                <img src="{{ asset('images/dashboard.svg') }}" alt="dashboard" class="me-2"
                     style="width: 24px; height: 24px; filter: invert(27%) sepia(100%) saturate(7483%) hue-rotate(202deg) brightness(100%) contrast(101%);">
                <a class="nav-link" href=" {{ route('home') }}">Trang chủ</a>
            </li>
            <li class="nav-item d-flex align-items-center {{ request()->is('appointment') ? 'active' : '' }}">
                <img src="{{ asset('images/appointment.svg') }}" alt="dashboard" class="me-2"
                     style="width: 24px; height: 24px; filter: invert(27%) sepia(100%) saturate(7483%) hue-rotate(202deg) brightness(100%) contrast(101%);">
                <a class="nav-link" href="#">Lịch hẹn</a>
            </li>
            <li class="nav-item d-flex align-items-center {{ request()->is('bill') ? 'active' : '' }}">
                <img src="{{ asset('images/bill.svg') }}" alt="dashboard" class="me-2"
                     style="width: 24px; height: 24px; filter: invert(27%) sepia(100%) saturate(7483%) hue-rotate(202deg) brightness(100%) contrast(101%);">
                <a class="nav-link" href="/bill">Hoá đơn</a>
            </li>
        </ul>
    @elseif(Auth::user() && Auth::user()->role === "Doctor")
        <ul class="nav flex-column">
            <li class="nav-item d-flex align-items-center {{ request()->is('home') ? 'active' : '' }}">
                <img src="{{ asset('images/dashboard.svg') }}" alt="dashboard" class="me-2"
                     style="width: 24px; height: 24px; filter: invert(27%) sepia(100%) saturate(7483%) hue-rotate(202deg) brightness(100%) contrast(101%);">
                <a class="nav-link" href=" {{ route('home') }}">Trang chủ</a>
            </li>
            <li class="nav-item d-flex align-items-center {{ request()->is('appointment') ? 'active' : '' }}">
                <img src="{{ asset('images/appointment.svg') }}" alt="dashboard" class="me-2"
                     style="width: 24px; height: 24px; filter: invert(27%) sepia(100%) saturate(7483%) hue-rotate(202deg) brightness(100%) contrast(101%);">
                <a class="nav-link" href="#">Lịch hẹn</a>
            </li>
            <li class="nav-item d-flex align-items-center {{ request()->is('bill') ? 'active' : '' }}">
                <img src="{{ asset('images/bill.svg') }}" alt="dashboard" class="me-2"
                     style="width: 24px; height: 24px; filter: invert(27%) sepia(100%) saturate(7483%) hue-rotate(202deg) brightness(100%) contrast(101%);">
                <a class="nav-link" href="/bill">Hoá đơn</a>
            </li>
        </ul>
    @elseif(Auth::user() && Auth::user()->role === "Receptionist")
        <ul class="nav flex-column">
            <li class="nav-item d-flex align-items-center {{ request()->is('home') ? 'active' : '' }}">
                <img src="{{ asset('images/dashboard.svg') }}" alt="dashboard" class="me-2"
                     style="width: 24px; height: 24px; filter: invert(27%) sepia(100%) saturate(7483%) hue-rotate(202deg) brightness(100%) contrast(101%);">
                <a class="nav-link" href=" {{ route('home') }}">Trang chủ</a>
            </li>
            <li class="nav-item d-flex align-items-center {{ request()->is('appointment') ? 'active' : '' }}">
                <img src="{{ asset('images/appointment.svg') }}" alt="dashboard" class="me-2"
                     style="width: 24px; height: 24px; filter: invert(27%) sepia(100%) saturate(7483%) hue-rotate(202deg) brightness(100%) contrast(101%);">
                <a class="nav-link" href="#">Lịch hẹn</a>
            </li>
            <li class="nav-item d-flex align-items-center {{ request()->is('bill') ? 'active' : '' }}">
                <img src="{{ asset('images/bill.svg') }}" alt="dashboard" class="me-2"
                     style="width: 24px; height: 24px; filter: invert(27%) sepia(100%) saturate(7483%) hue-rotate(202deg) brightness(100%) contrast(101%);">
                <a class="nav-link" href="/bill">Hoá đơn</a>
            </li>
        </ul>
    @else
        <ul class="nav flex-column">
            <li class="nav-item d-flex align-items-center {{ request()->is('home') ? 'active' : '' }}">
                <img src="{{ asset('images/dashboard.svg') }}" alt="dashboard" class="me-2"
                     style="width: 24px; height: 24px; filter: invert(27%) sepia(100%) saturate(7483%) hue-rotate(202deg) brightness(100%) contrast(101%);">
                <a class="nav-link" href=" {{ route('home') }}">Trang chủ</a>
            </li>
            <li class="nav-item d-flex align-items-center {{ request()->is('appointment') ? 'active' : '' }}">
                <img src="{{ asset('images/appointment.svg') }}" alt="dashboard" class="me-2"
                     style="width: 24px; height: 24px; filter: invert(27%) sepia(100%) saturate(7483%) hue-rotate(202deg) brightness(100%) contrast(101%);">
                <a class="nav-link" href="#">Lịch hẹn</a>
            </li>
            <li class="nav-item d-flex align-items-center {{ request()->is('bill') ? 'active' : '' }}">
                <img src="{{ asset('images/bill.svg') }}" alt="dashboard" class="me-2"
                     style="width: 24px; height: 24px; filter: invert(27%) sepia(100%) saturate(7483%) hue-rotate(202deg) brightness(100%) contrast(101%);">
                <a class="nav-link" href="/bill">Hoá đơn</a>
            </li>
        </ul>
    @endif
</nav>
