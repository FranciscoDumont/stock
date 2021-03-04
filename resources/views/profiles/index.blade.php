@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img
                    src="{{ $user->profile->profileImage() }}"
                    class="rounded-circle shadow-sm w-100" alt="">
            </div>


            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="d-flex align-items-center pb-3">
                        <div class="h1">{{ $user->username }}</div>
                        <button class="btn btn-primary ml-3">Follow</button>
                    </div>
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

        <hr>

        <div class="row pt-2">
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
