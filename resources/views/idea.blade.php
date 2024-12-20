@extends('layout.layout')

@section('content')
<div class="row">
    @include('layout.menu')
    <div class="col-6">
        @include('shared.success-message')
        <hr>
        <div class="mt-3">
            <div class="card">
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
                            <form action="{{ route('ideas.delete', $idea->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('ideas.update', $idea->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <textarea class="fs-6 form-control mb-3" rows="1" name="idea">{!! $idea->content !!}</textarea>
                        @error('idea')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                        <div class="d-flex justify-content-between">
                            <div>
                                <a class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                                    </span>{{$idea->likes}} </a>
                            </div>
                            <div>
                                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                                    {{$idea->created_at}} </span>
                            </div>
                        </div>
                        <div>
                            <div>
                                <button type="submit" class="btn btn-primary btn-sm"> Update Idea </button>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection