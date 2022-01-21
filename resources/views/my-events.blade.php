@extends('layout.app-no-container')

@section('content')
<div class="container_ m-0 p-5 d-flex {{ (empty($data)?'vh-100 justify-content-center align-items-center':" flex-row
    justify-content-between flex-wrap") }}">
    @if (empty($data))
    <p class="h1 text-black-50 text-center">You don't have any event. <br> Create your first one!</p>
    @endif

    @for ($i = 0; $i <10; $i++) <div class="card mx-3 my-5" style="width: 28rem; border-radius: 1.5rem"
        data-aos="zoom-in-up">
        <img class="card-img-top" src="{{ asset('img/tester.png') }}" alt="Card image cap"
            style="border-top-left-radius: 1.5rem;border-top-right-radius: 1.5rem;">
        <div class="card-header">
            <p class="h5"><i class="fa fa-map-marker text-danger"></i> PISANGAN TIMUR, JAKARTA</p>
            <p class="h3">Meeting With CEO</p>
            <p class="text-black-50">17 Agustus 2022</p>
        </div>
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <div class="participant-wrapper d-inline mx-2">
                        <img src="{{ asset('img/profil.jpg') }}" alt="profil" class="rounded-circle" height="25rem">
                        <span class="participant">Teguh</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <p class="font-weight-bolder my-0">Note :</p>
            <p class="card-text text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, ipsam
                tenetur amet
                dignissimos maxime porro, non ab recusandae, odio excepturi deserunt rem deleniti! Velit doloremque in
                eum,
                facilis fugit quas!</p>
        </div>
</div>
@endfor
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