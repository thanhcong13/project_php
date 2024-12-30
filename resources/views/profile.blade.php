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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .link-text {
            color: blue !important;
            text-decoration: underline;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <x-navbar></x-navbar>

    <div class="container py-4">
        <div class="row">
            @include('layout.menu')
            <div class="col-6">
                <div class="card">
                    <div class="px-3 pt-4 pb-2">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                @if (!$user->img)
                                    <img id="main-avatar" style="width:150px" class="me-3 avatar-sm rounded-circle"
                                        src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                                @else
                                    <img id="main-avatar" style="width:150px" class="me-3 avatar-sm rounded-circle"
                                        src="{{ $user->img }}" alt=" {{ $user->name }} ">
                                @endif

                                <div>
                                    <h3 class="card-title mb-0">
                                        <a href="#"> {{ $user->name }}</a>
                                    </h3>
                                    <form action=" {{ route('profile.update-avatar') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <label for="avatar">
                                            <a class="link-text">Chọn ảnh đại diện</a>
                                        </label>
                                        <br>
                                        <input type="file" hidden name="avatar" id="avatar">

                                        <button type="submit">Cập nhật ảnh đại diện</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="px-2 mt-4">
                            <h5 class="fs-5"> About : </h5>
                            <p class="fs-6 fw-light">
                                This book is a treatise on the theory of ethics, very popular during the
                                Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes
                                from a line in section 1.10.32.
                            </p>

                        </div>
                    </div>
                </div>
                <hr>
                <div class="mt-3">
                    @foreach ($user->idea as $idea)
                        <div class="card">
                            <div class="px-3 pt-4 pb-2">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                                            src="{{ $idea->user->img }}"
                                            alt="{{ $idea->user->name }} Avatar">
                                        <div>
                                            <h5 class="card-title mb-0"><a href="#"> {{ $idea->user->name }}
                                                </a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="fs-6 fw-light text-muted">
                                    {{ $idea->content }}
                                </p>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <a href="#" class="fw-light nav-link fs-6"> <span
                                                class="fas fa-heart me-1">
                                            </span> 100 </a>
                                    </div>
                                    <div>
                                        <span class="fs-6 fw-light text-muted">
                                            <span class="fas fa-clock"> {{ $idea->created_at }} </span>
                                        </span>
                                    </div>
                                </div>
                                <div>
                                    @include('shared.comment')
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
            const avatarInput = $('#avatar');
            const mainAvatar = $('#main-avatar');
            const defaultAvatarSrc = mainAvatar.attr('src'); 

            avatarInput.on('change', function() {
                const file = this.files[0];

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        mainAvatar.attr('src', e.target.result);
                    }

                    reader.readAsDataURL(file);
                } else {
                    mainAvatar.attr('src', defaultAvatarSrc);
                }
            });
        });
    </script>
</body>

</html>