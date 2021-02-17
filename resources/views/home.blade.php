@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="https://cdn.shopify.com/s/files/1/0103/8482/products/00_Unicorn_Giant_Meowchi.jpg?v=1506808766" height="200px;" class="rounded-circle" alt="">
        </div>
        <div class="col-9 pt-5">
            <div><h1>{{ $user->username }}</h1></div>
            <div class="d-flex">
                <div class="pr-5"><strong>100</strong> products</div>
                <div class="pr-5"><strong>50</strong> near expiration</div>
                <div class="pr-5"><strong>24</strong> expired</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->name }}</div>
            <div>{{ $user->profile->description }}</div>
            <div class="font-weight-bold"><a href="http://{{ $user->profile->url }}">{{ $user->profile->url }}</a></div>
        </div>
    </div>

    <div class="row pt-5">
        <div class="col-4">
            <img src="https://i.pinimg.com/originals/be/d4/6c/bed46c1177df1ccb545d66ccdb62777e.jpg" class="w-100" alt="">
        </div>
        <div class="col-4">
            <img src="https://i.pinimg.com/originals/be/d4/6c/bed46c1177df1ccb545d66ccdb62777e.jpg" class="w-100" alt="">
        </div>
        <div class="col-4">
            <img src="https://i.pinimg.com/originals/be/d4/6c/bed46c1177df1ccb545d66ccdb62777e.jpg" class="w-100" alt="">
        </div>
    </div>
</div>
@endsection
