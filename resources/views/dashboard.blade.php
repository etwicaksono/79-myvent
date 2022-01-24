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

        let table = $('#table_id').DataTable({
            dom:`<"row"<"col"<"float-left mb-3" f>>>
                    rt
                    <"row"<"col"<"d-flex justify-content-center mt-3" p>>>`,
            language: {
                'paginate': {
                'previous': '<span class="fas fa-caret-left fa-lg"></span>',
                'next': '<span class="fas fa-caret-right fa-lg"></span>'
                }
            },
            lengthMenu:[5],
            processing: true,
                serverSide: true,
                ajax: '{!! route('events.data') !!}', // memanggil route yang menampilkan data json
                columns: [{ // mengambil & menampilkan kolom sesuai tabel database
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable:false,
                        searchable:false
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'location',
                        name: 'location'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'participant',
                        name: 'participant',
                        render: function(data){
                            let input = data.replace(/&quot;/g,`"`);
                            let participant = JSON.parse(input)
                            let output = `<ol>`
                            $.each(participant, function(key,value){
                                output += `<li>`+ key +`</li>`
                            })
                            return output + "</ol>"
                        }
                    },
                    {
                        data: 'note',
                        name: 'note'
                    },
                ]
        })
    })
</script>
@endpush

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">

@endpush