@extends('layouts.app')

@section('title','Items')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('item.create') }}" class="btn btn-primary">Creer une Nouvelle Item</a>
                    @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Listes des Items</h4>
                        </div>
                        <div class="card-content table-responsive">
                            <table id="table" class="table table-hover table-striped"  cellspacing="0" width="100%">
                                <thead class="text-primary">
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Image</th>
                                <th> Nom du Category </th>
                                <th>Description</th>
                                <th>Prix</th>
                                <th>Creer A la Date </th>
                                <th>Creer A la Date</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($items as $key=>$item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td><img class="img-responsive img-thumbnail" src="{{ asset('uploads/item/'.$item->image) }}" style="height: 100px; width: 100px" alt=""></td>
                                            <td>{{ $item->category->name }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('item.edit',$item->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                                                <form id="delete-form-{{ $item->id }}" action="{{ route('item.destroy',$item->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $item->id }}').submit();
                                                }else {
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
@endsection
@push('script')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#table').DataTable(
                {
                    "bInfo" : false,
                    "aLengthMenu": [[5, 7, 10, -1], [5, 7, 10, "All"]],
                    "pageLength": 5,
                    "oLanguage":{
                        "sLengthMenu": "Afficher _MENU_  items par page",
                        "sSearch" : "Rechercher ",
                        "zeroRecords": "No Data Found",
                        "info": "Total",
                        "infoEmpty": "No records available",
                        "infoFiltered": "(filtered from _MAX_ total records)"

                    }

                }
        );
    } );
</script>
@endpush
