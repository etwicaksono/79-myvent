@extends('layout.app-no-container',["title"=>"Dashboard"])

@section('content')
<div class="container px-5 mt-lg-5">
    <table id="table_id" class="display table">
        <thead class="bg-main">
            <tr>
                <th style="width: 0%">No</th>
                <th style="width: 20%">Title</th>
                <th style="width: 20%">Location</th>
                <th style="width: 20%">Date</th>
                <th style="width: 20%">Paticipant</th>
                <th style="width: 20%">Note</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < 100; $i++) <tr>
                <td>{{ $i + 1 }}</td>
                <td>Row {{ $i }} Data 2</td>
                <td>Row {{ $i }} Data 3</td>
                <td>Row {{ $i }} Data 4</td>
                <td>Row {{ $i }} Data 5</td>
                <td>Row {{ $i }} Data 6</td>
                </tr>
                @endfor
        </tbody>
    </table>
</div>
@endsection

@push('js')
<script src="https://cdn.rawgit.com/michalsnik/aos/2.0.1/dist/aos.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
<script>
    $(function(){
        let baseurl = "{{ url('') }}/"

        AOS.init({
            duration: 1200,
            })

        $('#table_id').DataTable({
            dom:`<"row"<"col"<"float-left mb-3" f>>>
                    rt
                    <"row"<"col"<"d-flex justify-content-center mt-3" p>>>`,
            language: {
                'paginate': {
                'previous': '<span class="fas fa-caret-left fa-lg"></span>',
                'next': '<span class="fas fa-caret-right fa-lg"></span>'
                }
            }
        });
    })
</script>
@endpush

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">

@endpush