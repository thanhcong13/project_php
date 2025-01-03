<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
    data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand fw-light" href="{{route('member.dashboard')}}"><span class="fas fa-brain me-1"> </span>Member</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                @guest('member')
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('member.login.form') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('member.register.form') }}">Register</a>
                    </li>
                @endguest
            
                @auth('member')
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="member_id" data-member-id="{{ Auth::guard('member')->user()->id }}">{{ Auth::guard('member')->user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('member.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>