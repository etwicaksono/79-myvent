@extends('layout.app-no-container',["title"=>"Add Event"])

@section('content')
<div class="container px-5 d-flex vh-100 justify-content-center mt-lg-5">
    <div class="row mt-lg-5 pt-lg-5">
        <div class="col-lg-6 col-sm-12 col-md-12 p-0" data-aos="fade-left">
            <div class="card">
                <div class="card-body bg-main">
                    <form>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="title" class="text-white">Title</label>
                                    <input type="text" class="form-control" id="title"
                                        placeholder="Enter event's title">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="location" class="text-white">Location</label>
                                    <input type="text" class="form-control" id="location"
                                        placeholder="Enter event's location">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="participants" class="text-white">Participants</label>
                                    <input type="text" class="form-control" id="participants"
                                        placeholder="Enter event's participants">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="date" class="text-white">date</label>
                                    <input type="text" class="form-control" id="date" placeholder="Enter event's date">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="note" class="text-white">Note</label>
                                    <textarea type="text" class="form-control" id="note"
                                        placeholder="Enter event's note"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="picture" class="text-white">picture</label>
                                    <input type="file" class="form-control" id="date" placeholder="Enter event's date">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-md-12" id="img-wrapper">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-info float-right">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-md-12 p-0" data-aos="fade-right">
            <img src="{{ asset('img/discussion.png') }}" alt="Illustration" class="img-fluid">

        </div>
    </div>
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

        // submit form
        $("#btn-submit").on("click",function(){
            event.preventDefault()
            $.ajax({
                url: baseurl+"user",
                method:"post",
                dataType:"json",
                data:{
                    username:$("#username").val(),
                    name:$("#name").val(),
                    password:$("#password").val(),
                },
                error:function(err){
                    console.log(err.responseJSON);

                    $(".error-text").removeClass("d-none").addClass("d-none")
                    $.each(err.responseJSON,function(key, value){
                        $(".error-text-"+key).html(value)
                        $(".error-text-"+key).removeClass("d-none")
                    })
                },success:function(res){
                    console.log(res);
                    Swal.fire({
                        title: 'Saved!',
                        text:  'New user created',
                        icon: 'success',
                        })
                        $("#username").val("")
                        $("#name").val("")
                        $("#password").val("")
                        $(".error-text").removeClass("d-none").addClass("d-none")
                }
            })
        })
    })
</script>
@endpush

@push('css')
<link rel="stylesheet" href="https://cdn.rawgit.com/michalsnik/aos/2.0.1/dist/aos.css" />
@endpush