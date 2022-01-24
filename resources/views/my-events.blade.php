@extends('layout.app-no-container')

@section('content')
<div class="container_ m-0 p-5 d-flex">


</div>
@endsection

@push('js')
<script src="https://cdn.rawgit.com/michalsnik/aos/2.0.1/dist/aos.js"></script>
<script>
    $(function(){
        let baseurl = "{{ url('') }}/"

        $.ajax({
            url: "{{ route('events.list-data') }}",
            error:function(err){
                console.log(err);
            },success:function(res){

                if($.isEmptyObject(res)){
                    $(".container_").addClass("vh-100 justify-content-center align-items-center")
                    $(".container_").html(`<p class="h1 text-black-50 text-center">You don't have any event. <br> Create your first one!</p>`)
                }else{
                    $(".container_").addClass("flex-row justify-content-between flex-wrap")
                    let result = ``

                    $.each(res, function(key,value){
                        result += `
                        <div class="card mx-3 my-5" style="width: 28rem; border-radius: 1.5rem" data-aos="zoom-in-up">
                        <img class="card-img-top" src="{{ asset('storage/img/events') }}/`+value.picture +`" alt="Card image cap"
                            style="border-top-left-radius: 1.5rem;border-top-right-radius: 1.5rem;">
                        <div class="card-header">
                            <p class="h5"><i class="fa fa-map-marker text-danger"></i> `+ value.location +`</p>
                            <p class="h3">`+ value.title +`</p>
                            <p class="text-black-50">`+ dateParser(value.date) +`</p>
                        </div>
                        <div class="card-header">
                            <div class="row">
                                <div class="col">`
                                   
                                    $.each(JSON.parse(value.participant),function(key2, value2){
                                        result += `
                                        <div class="participant-wrapper d-inline mx-2">
                                            <img src="{{asset('storage/img/profile/user-default.png')}}" alt="profil"
                                                class="rounded-circle" height="25rem">
                                            <span class="participant">`+ key2 +`</span>
                                        </div>
                                        `
                                    })
                                    
                                    result += `</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="font-weight-bolder my-0">Note :</p>
                            <p class="card-text text-justify">`+ value.note +`</p>
                        </div>
                    </div>
                        `
                    })
                    
                    $(".container_").html(result)
                }
            }
        })

        function dateParser(date){
            let dateInput = new Date(date)
            return dateInput.toLocaleDateString("id-ID",{
                day:"numeric",
                month:"long",
                year:"numeric"
            })
        }

        AOS.init({
            duration: 1200,
            })
    })
</script>
@endpush

@push('css')
<link rel="stylesheet" href="https://cdn.rawgit.com/michalsnik/aos/2.0.1/dist/aos.css" />
@endpush