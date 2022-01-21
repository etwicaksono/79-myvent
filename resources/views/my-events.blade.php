@extends('layout.app-no-container')

@section('content')
<div class="container m-0 p-5 d-flex {{ (empty($data)?'vh-100 justify-content-center align-items-center':"") }}">
    @if (empty($data))
    <p class="h1 text-black-50 text-center">You don't have any event. <br> Create your first one!</p>
    @endif
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{ asset('img/discussion.png') }}" alt="Card image cap">
        <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's
                content.</p>
        </div>
    </div>
</div>
@endsection