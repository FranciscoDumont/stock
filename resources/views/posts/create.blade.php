@extends('layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <div class="container">
        <form action="/post" enctype="multipart/form-data" method="post">

            @csrf

            <div class="row">
                <div class="col-8 offset-2">

                    <div class="row">
                        <h1>Add New Post</h1>
                    </div>

                    <div class="form-group row">
                        <label for="caption" class="col-md-4 col-form-label">Post Caption</label>
                        <input id="caption"
                               name="caption"
                               type="text"
                               class="form-control @error('caption') is-invalid @enderror"
                               value="{{ old('caption') }}"
                               required
                               autocomplete="off" autofocus>

                        @error('caption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <div class="col-8 pl-0">
                            <label for="image" class="col-md-4 col-form-label">Post Image</label>
                            <input type="file" class="form-control-file" id="image_input" name="image" >

                            <div class="row pt-5 pl-3">
                                <button class="btn btn-primary">Add New Post</button>
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
