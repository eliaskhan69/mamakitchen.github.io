@extends('layouts.app')

@section('title','Item')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css"/>
    {{--for Bootstrap-4
    <link src="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>--}}

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('item.create')}}" class="btn btn-info">Add NEW Item</a>
                    @if(session('successMsg'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"
                                    onclick="this.parentElement.style.display='none'">
                                <i class="material-icons">close</i>
                            </button>
                            <span><b> Success - </b> {{ session('successMsg') }}</span>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Items</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped table-bordered" style="width:100%" cellspacing="0">
                                    {{--for Bootstrap-4
                                    <table id="table"class="table table-striped table-bordered" style="width:100%">--}}
                                    <thead class="text-primary">
                                    <th>Item-ID</th>
                                    <th>Category-Name</th>
                                    <th>Category-ID</th>
                                    <th>Item-Name</th>
                                    <th>Item-Description</th>
                                    <th>Item-Price</th>
                                    <th>Item-Image</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $key=>$item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->category->name}}</td>
                                            <td>{{ $item->category_id}}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td><img class="img-responsive img-thumbnail" style="height: 80px; width: 100px"
                                                     src="{{asset('uploads/item/'.$item->image)}}"></td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('item.edit',$item->id)}}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>
                                                <form method="POST" id="delete-form-{{$item->id}}" action="{{ route('item.destroy',$item->id)}}" style="display: none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if (confirm('Are you Sure? you want delete this? ')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{$item->id}}').submit();
                                                }else{
                                                        event.preventDefault();
                                                        }"><i class="material-icons">delete</i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
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

