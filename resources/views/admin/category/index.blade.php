@extends('layouts.app')

@section('title','Category')

    @push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    @endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('category.create') }}" class="btn btn-primary">Enregistrer une nouvelle categories</a>
                    @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">All Categories</h4>
                        </div>
                        <div class="card-content table-responsive">
                            <table id="table"  class="table table-hover table-striped"  cellspacing="0" width="100%">
                                <thead class="text-primary">
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Slug</th>
                                <th>Creer à la date</th>
                                <th>Modifier à la date</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($categories as $key=>$category)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>{{ $category->created_at }}</td>
                                        <td>{{ $category->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('category.edit',$category->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                                            <form id="delete-form-{{ $category->id }}" action="{{ route('category.destroy',$category->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Êtes vous sûr ? voulez vous le Supprimer ?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $category->id }}').submit();
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
                        "sLengthMenu": "Afficher _MENU_  categories par page",
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

