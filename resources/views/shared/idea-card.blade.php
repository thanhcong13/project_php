<div class="card my-3">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
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
        <p class="fs-6 fw-light text-muted">
            <!-- TODO: Phan biet 2 cai duoi --> 
            {!! $idea->content !!}
        </p>
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
                    {{$idea->created_at}} </span>
            </div>
        </div>
        <div>
            @include('shared.comment')
        </div>
    </div>
</div>