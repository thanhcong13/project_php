@extends('layout.layout')

@section('content')
    <div class="row">
        @include('layout.menu')
        <div class="col-6">
            @include('shared.success-message')
            <hr>
            <div class="mt-3">
                @foreach ($ideas as $idea)
                    @include('shared.idea-card')
                @endforeach
                <div class="mt-1">
                    {{ $ideas->links() }}
                </div>

            </div>
        </div>
        <div class="col-3">
            @include('shared.search')
        </div>
    </div>
@endsection
<style>
    .lazy {
        display: block;
    }
</style>
@section('scripts')
    <script src="{{ asset('js/comment.js') }}"></script>
    <script>
        $("img.lazy").show().lazyload();
    </script>
@endsection


