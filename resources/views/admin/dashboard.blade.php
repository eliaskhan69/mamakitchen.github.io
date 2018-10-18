@extends('layouts.app')

@section('title','Dashboard')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css"/>

@endpush

@section('content')
 @include('admin.content')
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

    {{--for Bootstrap-4
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>--}}

    <script>
        /*for Bootstrap-4
        $(document).ready(function() {
            $('#example').DataTable();
        } );*/
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
@endpush
