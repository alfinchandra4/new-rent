@extends('layouts.app')

@section('page-title', 'Histori alat')

@section('content-title', 'Daftar pakai alat')

@section('path')
    Histori alat
@endsection


@section('js-bottom')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            $('#example_filter').css("float", "right");
        });

    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-3">
            <ul class="list-group">
                <li class="list-group-item"><span style="font-size: 10pt">Customer:</span>
                    <div class="font-weight-bold"></div>
                </li>
                <li class="list-group-item"><span style="font-size: 10pt">Phone:</span>
                    <div class="font-weight-bold"></div>
                </li>
                <li class="list-group-item"><span style="font-size: 10pt">Address:</span>
                    <div class="font-weight-bold"></div>
                </li>
                <li class="list-group-item"><span style="font-size: 10pt">Company:</span>
                    <div class="font-weight-bold"></div>
                </li>
            </ul>
        </div>
        <div class="col-9">

        </div>
    </div>
@endsection
