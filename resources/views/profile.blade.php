
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

    <div class="container py-4">
        <div class="row">
            @include('layout.menu')
            <div class="col-6">
                <div class="card">
                    <div class="px-3 pt-4 pb-2">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                                <div>
                                    <h3 class="card-title mb-0">
                                        <a href="#"> {{ $user->name }}</a>
                                    </h3>
                                    <span class="fs-6 text-muted">@mario</span>
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
                            <div class="d-flex justify-content-start">
                                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                                    </span> 120 Followers </a>
                                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                                    </span> 2 </a>
                                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                                    </span> 2 </a>
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-primary btn-sm"> Follow </button>
                            </div>
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
                                            src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{ $idea->user->name }}"
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
</body>

</html>
