@extends('layout.app-no-container',["title"=>"Add Event","csrf"=>true])

@section('content')
<div class="container px-5 d-flex vh-100 justify-content-center mt-lg-5">
    <div class="row mt-lg-5 pt-lg-5">
        <div class="col-lg-6 col-sm-12 col-md-12 p-0" data-aos="fade-left">
            <div class="card">
                <div class="card-body bg-main">
                    <form id="form-event">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="title" class="text-white">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Enter event's title">
                                    <small class="text-danger bg-white px-1 d-none error-text error-text-title"></small>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="location" class="text-white">Location</label>
                                    <input type="text" class="form-control" id="location" name="location"
                                        placeholder="Enter event's location">
                                    <small
                                        class="text-danger bg-white px-2 d-none error-text error-text-location"></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="participant" class="text-white">Participants</label>
                                    <select type="text" class="form-control" id="participant" name="participant[]"
                                        placeholder="Enter event's participants" multiple>
                                        @foreach ($user as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <small
                                        class="text-danger bg-white px-2 d-none error-text error-text-participant"></small>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="date" class="text-white">date</label>
                                    <input type="text" class="form-control" id="date" name="date"
                                        placeholder="yyyy-mm-dd" readonly>
                                    <small class="text-danger bg-white px-1 d-none error-text error-text-date"></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="note" class="text-white">Note</label>
                                    <textarea type="text" class="form-control" id="note" name="note"
                                        placeholder="Enter event's note"></textarea>
                                    <small class="text-danger bg-white px-1 d-none error-text error-text-note"></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="picture" class="text-white">picture</label>
                                    <div class="row">
                                        <div class="col" id="img-wrapper">

                                        </div>
                                    </div>
                                    <input type="file" class="form-control" id="picture" name="picture"
                                        placeholder="Enter event's date">
                                    <small
                                        class="text-danger bg-white px-2 d-none error-text error-text-picture"></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-info float-right" id="btn-submit">Submit</button>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script>
    $(function(){
        let baseurl = "{{ url('') }}/"

        AOS.init({
            duration: 1200,
            })

        // submit form
        $("#btn-submit").on("click",function(){
            event.preventDefault()
            let formData = new FormData($("#form-event")[0])
            console.log(formData)
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: baseurl+"event",
                method:"post",
                dataType:"json",
                data: formData,
                error:function(err){
                    console.log(err.responseJSON);

                    $(".error-text").removeClass("d-none").addClass("d-none")
                    $.each(err.responseJSON.errors,function(key, value){
                        $(".error-text-"+key).html(value)
                        $(".error-text-"+key).removeClass("d-none")
                    })
                },success:function(res){
                    console.log(res);

                    if(res.error == false){                        
                        $("#title").val("")
                        $("#location").val("")
                        $("#participant").val(null).trigger("change")
                        $("#date").val("")
                        $("#note").val("")
                        $("#picture").val("")
                    }

                    Swal.fire({
                        title: (res.error?"Error":'Saved'),
                        text:  res.message,
                        icon: (res.error?"error":'success'),
                        })
                        
                    $(".error-text").removeClass("d-none").addClass("d-none")
                },
                processData: false,
                contentType: false
            })
        })

        // select participant
        $("#participant").select2({
            ajax: {
                url: baseurl + 'select2-user',
                dataType: 'json',
                delay: 100,
                data: function(params) {
                    return {
                        search: params.term
                    }
                },
                processResults: function(data, page) {
                    return {
                        results: data
                    };
                },
            },
            placeholder: "Select Participant",
            allowClear: true,
            width:"100%"
        })

        // datepicker
        $("#date").datepicker({
            uiLibrary:"bootstrap4",
            format: 'yyyy-mm-dd'
        })
    })
</script>
@endpush

@push('css')
<link rel="stylesheet" href="https://cdn.rawgit.com/michalsnik/aos/2.0.1/dist/aos.css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@endpush