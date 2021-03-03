@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-7">
                <img src="/storage/{{ $post->image }}" class="w-100" alt="">
            </div>
            <div class="col-5">
                <div class="">
                    <div class="d-flex align-items-center">
                        <img src="{{ $post->user->profile->profileImage() }}" alt="" class="w-100 rounded-circle"
                             style="max-width: 50px;">
                        <div class="pl-3 font-weight-bold"><a href="/profile/{{ $post->user->username }}">
                                <span class="text-dark">
                                    {{ $post->user->username }}
                                </span>
                            </a>
                            <a href="" class="pl-3">Follow</a>
                        </div>
                    </div>

                    <hr>

                    <p>
                        <span class="font-weight-bold">
                            <a href="/profile/{{ $post->user->username }}">
                                <span class="text-dark">
                                    {{ $post->user->username }}
                                </span>
                            </a>
                        </span>
                        {{ $post->caption }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
