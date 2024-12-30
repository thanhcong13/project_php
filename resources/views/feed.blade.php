@extends('layout.layout')

@section('content')
    <div class="row">
        @include('layout.menu')
        <div class="col-6">
            @include('shared.success-message')
            @include('shared.submit-idea')
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header pb-0 border-0">
                    <h5 class="">Search</h5>
                </div>
                <div class="card-body">
                    <input placeholder="...
                    " class="form-control w-100" type="text"
                        id="search">
                    <button class="btn btn-dark mt-2"> Search</button>
                </div>
            </div>
            {{-- follower in here --}}
        </div>
    </div>
@endsection