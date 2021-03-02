@extends('layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <div class="container">
        <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">

            @csrf

            @method('PATCH')

            <div class="row">
                <div class="col-8 offset-2">

                    <div class="row">
                        <h1>Edit Profile</h1>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Title</label>
                        <input id="name"
                               name="name"
                               type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') ?? $user->name }}"
                               required
                               autocomplete="off" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label">Description</label>
                        <input id="description"
                               name="description"
                               type="text"
                               class="form-control @error('description') is-invalid @enderror"
                               value="{{ old('description') ?? $user->profile->description }}"
                               required
                               autocomplete="off" autofocus>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="url" class="col-md-4 col-form-label">URL</label>
                        <input id="url"
                               name="url"
                               type="text"
                               class="form-control @error('url') is-invalid @enderror"
                               value="{{ old('url') ?? $user->profile->url }}"
                               required
                               autocomplete="off" autofocus>

                        @error('url')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <div class="col-8 pl-0">
                            <label for="image" class="col-md-4 col-form-label">Profile Image</label>
                            <input type="file" class="form-control-file" id="image_input" name="image" >

                            <div class="row pt-5 pl-3">
                                <button class="btn btn-primary">Save Profile</button>
                            </div>
                        </div>

                        <div class="col">
                            <img id="preview" class="w-100" src="#" alt="" >
                        </div>

                        @error('image')
                        <strong>{{ $message }}</strong>
                        @enderror

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image_input").change(function(){
            readURL(this);
        });
    </script>
@endsection

