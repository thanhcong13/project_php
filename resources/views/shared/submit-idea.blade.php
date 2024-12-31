@auth
    <h4> Share yours ideas </h4>
    <div class="row">
        <form action="{{ route('ideas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="mb-3">
                <textarea name="idea" class="form-control" id="idea" rows="3"></textarea>
                @error('idea')
                    <span class="fs-6 text-danger"> {{ $message }} </span>
                @enderror
                <div class="mt-1">
                    <button type="button">
                        <label for="images" class="action-btn">
                            <input type="file" name="images[]" id="images" multiple accept="image/*" hidden>
                            📷 Ảnh
                        </label>
                    </button>
                    <button type="button">
                        <label for="videos" class="action-btn">
                            <input type="file" name="videos[]" id="videos" multiple accept="video/*" hidden>
                            🎥 Video
                        </label>
                    </button>
                    <button type="button" class="trigger">😊 Icon</button>
                </div>
            </div>
            <div class="">
                <button type="submit" class="btn btn-dark"> Share </button>
            </div>
        </form>
    </div>
@endauth

@section('ideas')
    <script src="{{ asset('js/ideas.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/ideas.css') }}">
@endsection

