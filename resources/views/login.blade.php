<!DOCTYPE html>
<html lang="EN">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Twitter Clone Bootstrap 5 Example</title>

    <link href="https://bootswatch.com/5/sketchy/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
   @include('layout.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6">
                @include('shared.success-message')
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
                    </div>
                    <div class="form-group mt-3">
                        <label for="password" class="text-dark">Password:</label><br>
                        <input type="password" name="password" id="password" class="form-control"
                            @if ( isset($_COOKIE['password']) )
                                value="{{ $_COOKIE['password'] }}"
                            @endif
                        >
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
                        <input type="submit" name="submit" class="btn btn-dark btn-md" value="submit">
                    </div>
                    <div class="text-right mt-2">
                        <a href="{{route('register')}}" class="text-dark">Register here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>