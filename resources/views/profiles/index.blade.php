@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img
                    src="https://cdn.shopify.com/s/files/1/0103/8482/products/00_Unicorn_Giant_Meowchi.jpg?v=1506808766"
                    height="200px;" class="rounded-circle shadow-sm" alt="">
            </div>
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1>{{ $user->username }}</h1>
                    <a href="/post/create" class="btn btn-outline-secondary" role="button">Add new post</a>
                </div>
                <div class="d-flex">
                    <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                    <div class="pr-5"><strong>50</strong> followers</div>
                    <div class="pr-5"><strong>24</strong> following</div>
                    <i class="fas fa-heart"></i>
                </div>
                <div class="pt-4 font-weight-bold">{{ $user->name }}</div>
                <div>{{ $user->profile->description }}</div>
                <div class="font-weight-bold"><a href="http://{{ $user->profile->url }}">{{ $user->profile->url }}</a>
                </div>
            </div>
        </div>

        <div class="row pt-5">
            @foreach($user->posts as $post)
                <div class="col-4 pb-5">
                    <a href="/post/{{ $post->id }}">
                        <img src="/storage/{{ $post->image }}" class="w-100 rounded shadow" alt="">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
