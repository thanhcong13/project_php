<div class="card my-3">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="{{ $idea->user->img }}"
                    alt="{{ $idea->user->name }} Avatar">
                <div>
                    <h5 class="card-title mb-0"><a href="#"> {{ $idea->user->name }}
                        </a>
                    </h5>
                </div>
            </div>
            <div class="d-flex">
                @if (Auth::user()->id == $idea->user_id)
                    <form action="{{ route('ideas.index', $idea->id) }}" method="GET">
                        @csrf
                        <button class="btn btn-sm">Edit</button>
                    </form>
                @endif
                <form action="{{ route('ideas.delete', $idea->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm">X</button>
                </form>

            </div>
        </div>
    </div>
    <div class="card-body">
        <p class="fs-6 fw-light text-muted"> {{ $idea->content }} </p>
        <div class="row show-img-idea" data-ideaid="{{ $idea->id }}">
            @if ($idea->image->count() > 0)
                @if ($idea->image->count() == 1)
                    @foreach ($idea->image as $img)
                        <div class="col-md-12 mb-3">
                            <img class="w-100" src="{{ $img->url }}" alt="Image">
                        </div>
                    @endforeach
                @endif
                @if ($idea->image->count() > 1)
                    @foreach ($idea->image as $img)
                        <div class="col-md-6 mb-3">
                            <img class="w-100" src="{{ $img->url }}" alt="Image">
                        </div>
                    @endforeach
                @endif

            @endif

        </div>
        <div class="d-flex justify-content-between">
            <div>
                @if ($idea->isLikedBy(auth()->user()))
                    <form action="{{ route('ideas.idea.unlike', $idea->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="fw-light nav-link fs-6">
                            <span class="fas fa-heart me-1" style="color: #ec1818"></span>{{ $idea->like->count() }}
                        </button>
                    </form>
                @else
                    <form action="{{ route('ideas.idea.like', $idea->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="fw-light nav-link fs-6">
                            <span class="fas fa-heart me-1" style="color: #ec1818"></span>{{ $idea->like->count() }}
                        </button>
                    </form>
                @endif
            </div>

            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $idea->created_at }} </span>
            </div>
        </div>
        <div>
            @include('shared.comment')
        </div>
    </div>
</div>
