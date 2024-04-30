
<div class="header">

    <!-- Logo -->
    <div class="header-left">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ url('/') }}/assets/img/Gadi.png" alt="Logo" width="250" height="40">
        </a>
        <a href="index.html" class="logo logo-small">
            <img src="{{ url('/') }}/assets/img/Gadi.png" alt="Logo" width="250" height="40">
        </a>
    </div>
    <!-- /Logo -->

    <!-- Sidebar Toggle -->
    <a href="javascript:void(0);" id="toggle_btn">
        <i class="fas fa-bars"></i>
    </a>
    <!-- /Sidebar Toggle -->

    <!-- Mobile Menu Toggle -->
    <a class="mobile_btn" id="mobile_btn">
        <i class="fas fa-bars"></i>
    </a>
    <!-- /Mobile Menu Toggle -->

    <!-- Header Menu -->
    <ul class="nav nav-tabs user-menu">

        <!-- User Menu -->
        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span class="user-img">
                    <img src="{{ url('/') }}/assets/img/profiles/avatar-01.jpg" alt="">
                    <span class="status online"></span>
                </span>
                <span>{{ Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="profile.html"><i data-feather="user" class="me-1"></i>Change Password</a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i data-feather="log-out" class="me-1"></i>
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
        <!-- /User Menu -->

    </ul>
    <!-- /Header Menu -->

</div>
