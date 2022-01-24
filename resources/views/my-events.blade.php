@extends('layout.app-no-container')

@section('content')
<div class="container_ m-0 p-5 d-flex {{ (empty($data)?'vh-100 justify-content-center align-items-center':" flex-row
    justify-content-between flex-wrap") }}">
    @if (empty($data))
    <p class="h1 text-black-50 text-center">You don't have any event. <br> Create your first one!</p>
    @endif
    @foreach ($data as $item)
    <div class="card mx-3 my-5" style="width: 28rem; border-radius: 1.5rem" data-aos="zoom-in-up">
        <img class="card-img-top" src="{{ asset('storage/img/events').'/'.$item->picture }}" alt="Card image cap"
            style="border-top-left-radius: 1.5rem;border-top-right-radius: 1.5rem;">
        <div class="card-header">
            <p class="h5"><i class="fa fa-map-marker text-danger"></i> {{ $item->location }}</p>
            <p class="h3">{{ $item->title }}</p>
            <p class="text-black-50">{{ date("d F Y", strtotime($item->date)) }}</p>
        </div>
        <div class="card-header">
            <div class="row">
                <div class="col">
                    @foreach (json_decode($item->participant) as $key=> $participant)
                    <div class="participant-wrapper d-inline mx-2">
                        <img src="{{ asset('storage/img/profile/user-default.png') }}" alt="profil"
                            class="rounded-circle" height="25rem">
                        <span class="participant">{{ $key }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card-body">
            <p class="font-weight-bolder my-0">Note :</p>
            <p class="card-text text-justify">{{ $item->note }}</p>
        </div>
    </div>
    @endforeach

</div>
@endsection

@push('js')
<script src="https://cdn.rawgit.com/michalsnik/aos/2.0.1/dist/aos.js"></script>
<script>
    $(function(){
        let baseurl = "{{ url('') }}/"

        AOS.init({
            duration: 1200,
            })
    })
</script>
@endpush

@push('css')
<link rel="stylesheet" href="https://cdn.rawgit.com/michalsnik/aos/2.0.1/dist/aos.css" />
@endpush