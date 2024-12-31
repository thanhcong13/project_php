<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                <div>
                    <h5 class="card-title mb-0"><a href="#"> Mario
                        </a>
                    </h5>
                </div>
            </div>
            <div >
                <form action="{{ route('idea.delete', $idea->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm">X</button>
                </form>
                
            </div>
        </div>
    </div>
    <div class="card-body">
<<<<<<< Updated upstream
        <p class="fs-6 fw-light text-muted">
            {{$idea->content}}
        </p>
=======
        <p class="fs-6 fw-light text-muted"> {{ $idea->content }} </p>
        <div class="row show-img-idea" data-ideaid="{{ $idea->id }}">
            @if ($idea->image->count() > 0)
                @if ($idea->image->count() == 1)
                    @foreach ($idea->image as $img)
                        <div class="col-md-12 mb-3">
                            <img class="w-100 lazy" data-original="{{ $img->url }}" alt="Image">
                        </div>
                    @endforeach
                @endif
                @if ($idea->image->count() > 1)
                    @foreach ($idea->image as $img)
                        <div class="col-md-6 mb-3">
                            <img class="w-100 lazy" data-original="{{ $img->url }}" alt="Image">
                        </div>
                    @endforeach
                @endif

            @endif

        </div>
>>>>>>> Stashed changes
        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span>{{$idea->likes}} </a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{$idea->created_at}} </span>
            </div>
        </div>
        <div>
            <div class="mb-3">
                <textarea class="fs-6 form-control" rows="1"></textarea>
            </div>
            <div>
                <button class="btn btn-primary btn-sm"> Post Comment </button>
            </div>

            <hr>
            <div class="d-flex align-items-start">
                <img style="width:35px" class="me-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Luigi"
                    alt="Luigi Avatar">
                <div class="w-100">
                    <div class="d-flex justify-content-between">
                        <h6 class="">Luigi
                        </h6>
                        <small class="fs-6 fw-light text-muted"> 3 hour
                            ago</small>
                    </div>
                    <p class="fs-6 mt-3 fw-light">
                        and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and
                        Evil)
                        by
                        Cicero, written in 45 BC. This book is a treatise on the theory of ethics,
                        very
                        popular during the Renaissan
                    </p>
                </div>
            </div>
        </div>
    </div>
<<<<<<< Updated upstream
</div>
=======
</div>



>>>>>>> Stashed changes
