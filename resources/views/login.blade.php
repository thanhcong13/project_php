<x-layout-auth>
    <x-navbar></x-navbar>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6">
                @include('shared.success-message')
                @include('shared.error-message')
                <form class="form mt-5" action="{{ route('login.user') }}" method="POST">
                    @csrf
                    <h3 class="text-center text-dark">Login</h3>
                    <div class="form-group">
                        <label for="email" class="text-dark">Email:</label><br>
                        <input type="email" name="email" id="email" class="form-control" 
                            @if (isset($_COOKIE['email']))
                                value="{{$_COOKIE['email']}}"
                            @endif
                        >
                        @error('email')
                        <span class="fs-6 text-danger"> {{ $message}} </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="password" class="text-dark">Password:</label><br>
                        <input type="password" name="password" id="password" class="form-control"
                            @if ( isset($_COOKIE['password']) )
                                value="{{ $_COOKIE['password'] }}"
                            @endif
                        >
                        @error('password')
                        <span class="fs-6 text-danger"> {{ $message}} </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="d-flex my-2" style="gap: 20px">
                            <input type="checkbox" name="remember" id="remember"
                            @if ( isset($_COOKIE['email']) )
                                checked
                            @endif
                        >
                        <label for="remember" class="text-dark">Remember me</label>
                        </div>
                        <x-button type="submit" text="Login"></x-button>
                    </div>
                    <div class="text-right mt-2">
                        <a href="{{route('register')}}" class="text-dark">Register here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-auth>