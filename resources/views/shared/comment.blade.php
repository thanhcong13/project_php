{{-- <form action="{{ route('ideas.comments.store' , $idea->id) }}" method="POST">
    @csrf --}}
    <div class="mb-3">
        <textarea id="name_Comment" data-comment-id="{{ $idea->id }}" name="comment" class="fs-6 form-control name_Comment" rows="1"></textarea>
    </div>
    <div>
        <button type="submit" data-comment-id="{{ $idea->id }}" class="btn btn-primary btn-sm btn-comment"> Post Comment </button>
    </div>
    <input type="hidden" id="create-comment" data-url="{{ route('comment.create-comment') }}">

{{-- </form> --}}
<hr>
<div id="comments-{{ $idea->id }}">
@foreach ($idea->comment as $comment)
    <div class="d-flex align-items-start">
        <img style="width:35px" class="me-2 avatar-sm rounded-circle"
            src="{{ $comment->user->img }}"
            alt="{{ $comment->user->name}} Avatar">
        <div class="w-100">
            <div class="d-flex justify-content-between">
                <h6 class="">{{ $comment->user->name }}
                </h6>
                <small class="fs-6 fw-light text-muted">{{ $comment->created_at }}</small>
            </div>
            <p class="fs-6 mt-3 fw-light">
                {{ $comment->comment }}
            </p>
        </div>
    </div>
@endforeach
</div>

