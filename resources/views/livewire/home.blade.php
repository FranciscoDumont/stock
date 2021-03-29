<div class="container">
    <div class="row">
        <div>Hola</div>

<div class="col-3 p-5">
{{--    <img--}}
{{--        src="{{ Auth::user()->profileImage() }}"--}}
{{--        class="rounded-circle shadow-sm w-100" alt="">--}}
</div>


<div class="col-9 pt-5">
    <div class="d-flex justify-content-between align-items-baseline">
        <div class="d-flex align-items-center pb-3">
{{--            <div class="h1">{{ Auth::user()->username }}</div>--}}
        </div>
{{--        @can('update', Auth::user()->profile)--}}
{{--            <a href="/profile/{{ $user->id }}/edit" class="btn btn-outline-secondary" role="button"><i--}}
{{--                    class="fas fa-cog"></i></a>--}}
{{--        @endcan--}}
    </div>


    <div class="d-flex">
        <div class="pr-5"><strong> nose </strong> posts</div>
        <div class="pr-5"><strong> nose </strong> followers</div>
        <div class="pr-5"><strong> nose </strong> following</div>
    </div>


{{--    <div class="pt-4 font-weight-bold">{{ Auth::user()->username }} <i class="fas fa-heart"--}}
{{--                                                                       style="color:red"></i></div>--}}
    <div>aca iria la descripcion</div>
    <div class="font-weight-bold">
        <a href="#">aca iria el url</a>
    </div>
</div>
<div class="col-12">
    <a href="/post/create" class="btn btn-outline-primary float-right" role="button">
        Add new post <i class="far fa-image fa-lg pl-2"></i>
    </a>
</div>
</div>

<hr>

<div class="row pt-2">
{{--@foreach(Auth::user()->stock as $stock)--}}
{{--    <div class="col-4 pb-5">--}}
{{--        <a href="/post/{{ $stock->id }}">--}}
{{--            <img src="/{{ $stock->product->imageURL() }}" class="w-100 rounded shadow" alt="">--}}
{{--        </a>--}}
{{--    </div>--}}
{{--@endforeach--}}
</div>
</div>

