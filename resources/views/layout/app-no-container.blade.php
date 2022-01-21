<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @if(!isset($title))
        Myvent
        @else
        {{ $title }} | Myvent
        @endif
    </title>

    @if (isset($csrf))
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @endif

    {{--
    <link rel="stylesheet" href="{{ url("../vendor/twbs/bootstrap/dist/css/bootstrap.min.css") }}"> --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style>
        .bg-main {
            background-color: #baaeae;
        }
    </style>

    @stack('css')

</head>

<body>
    <nav class="navbar  sticky-top navbar-expand-lg navbar-light bg-main mb-3 px-5">
        <a class="navbar-brand font-weight-bolder text-white" href="{{ url("") }}">Myvent</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                {{-- <li class="nav-item active">
                    <a class="nav-link" href="{{ url('my-pokemon') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li> --}}
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link font-weight-bolder" href="{{ url('add-event') }}"><i class="fa fa-plus"></i>
                        Add Event</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-white font-weight-bolder" href="{{ url('dashboard') }}">Dashboard</a>
                </li>
            </ul>
        </div>
    </nav>

    @yield('content')

    {{-- <script src="{{ url("../vendor/components/jquery/jquery.min.js") }}"></script>
    <script src="{{ url("../vendor/twbs/bootstrap/dist/js/bootstrap.min.js") }}"></script> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/0f853fcb5c.js" crossorigin="anonymous"></script>

    <script>
        $(function(){
            let baseurl = "{{ url('') }}/"

            $("#btn-search").on("click",function(){
                event.preventDefault()

                let search = $("#search-input").val()

                if(search != ""){
                    $.ajax({
                        url:"https://pokeapi.co/api/v2/pokemon/" + search,
                        method:"get",
                        dataType:"json",
                        error:function(err){
                            if(err.responseText == "Not Found"){
                                Swal.fire({
                                    title: search + ' Not Found!',
                                    text:  'Check your keyword!',
                                    icon: 'warning',
                                    })
                            }else{
                                console.log(err);
                            }
                        },success:function(res){
                            console.log(res);
                            window.location = baseurl + "detail/" + res.id
                        }
                    })
                }else{
                    Swal.fire({
                        title: 'Warning!',
                        text:  'Enter pokemon name!',
                        icon: 'warning',
                        })
                }
            })
        })
    </script>

    @stack('js')

</body>

</html>