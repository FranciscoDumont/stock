@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img
                    src="https://cdn.shopify.com/s/files/1/0103/8482/products/00_Unicorn_Giant_Meowchi.jpg?v=1506808766"
                    class="rounded-circle shadow-sm w-100" alt="">
            </div>
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1>{{ $user->username }}</h1>

                    @can('update', $user->profile)
                        <a href="/profile/{{ $user->id }}/edit" class="btn btn-outline-secondary" role="button"><i class="fas fa-cog"></i></a>
                    @endcan

                </div>
                <div class="d-flex">
                    <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                    <div class="pr-5"><strong>50</strong> followers</div>
                    <div class="pr-5"><strong>24</strong> following</div>
                </div>
                <div class="pt-4 font-weight-bold">{{ $user->name }} <i class="fas fa-heart" style="color:red"></i></div>
                <div>{{ $user->profile->description }}</div>
                <div class="font-weight-bold">
                    <a href="http://{{ $user->profile->url }}">{{ $user->profile->url }}</a>
                </div>
            </div>
            <div class="col-12">
                @can('update', $user->profile)
                    <a href="/post/create" class="btn btn-outline-primary float-right" role="button">
                        Add new post <i class="far fa-image fa-lg pl-2"></i>
                    </a>
                @endcan
            </div>
        </div>

        <div class="row pt-3">
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
