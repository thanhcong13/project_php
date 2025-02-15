<x-layout-auth>
    @include('member.components.mem-navbar')
    <div class="container">
        <div class="row justify-content-center">
            @include('shared.error-message')
            <div class="col-12 col-sm-8 col-md-6">
                <form class="form mt-5" action="{{route('member.register')}}" method="post">
                    @csrf
                    <h3 class="text-center text-dark">Register member</h3>
                    <div class="form-group">
                        <label for="name" class="text-dark">Name:</label><br>
                        <input type="name" name="name" id="name" class="form-control">
                    </div>
                    @error('name')
                        <span class="fs-6 text-danger"> {{ $message}} </span>
                    @enderror
                    <div class="form-group">
                        <label for="email" class="text-dark">Email:</label><br>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    @error('email')
                        <span class="fs-6 text-danger"> {{ $message}} </span>
                    @enderror
                    <div class="form-group mt-3">
                        <label for="password" class="text-dark">Password:</label><br>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    @error('password')
                        <span class="fs-6 text-danger"> {{ $message}} </span>
                    @enderror
                    <div class="form-group mt-3">
                        <label for="confirm-password" class="text-dark">Confirm Password:</label><br>
                        <input type="password" name="confirm-password" id="confirm-password" class="form-control">
                    </div>
                    @error('confirm-password')
                        <span class="fs-6 text-danger"> {{ $message}} </span>
                    @enderror
                    <div class="form-group">
                        <label for="remember-me" class="text-dark"></label><br>
                        <x-button type="submit" text="Submit"></x-button>
                    </div>
                    <div class="text-right mt-2">
                        <a href="{{route('member.login.form')}}" class="text-dark">Login here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-auth>