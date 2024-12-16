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
            @include('shared.error-message')
            <div class="col-12 col-sm-8 col-md-6">
                <form class="form mt-5" action="{{route('register.user')}}" method="post">
                    @csrf
                    <h3 class="text-center text-dark">Register</h3>
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
                        <button type="submit" name="submit" class="btn btn-dark btn-md" >Submit</button>
                    </div>
                    <div class="text-right mt-2">
                        <a href="{{route('login')}}" class="text-dark">Login here</a>
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