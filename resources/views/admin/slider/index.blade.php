@extends('layouts.app')
@section('title','Index')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
@endpush
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if(session('successMsg'))
                        <div class="alert alert-success">
                            <button class="close" aria-hidden="true" type="button"
                                    onclick="this.parentElement.style.display='none'">*</button>
                            <span>

                            <b> Danger- </b>{{session('successMsg')}}
                            </span>
                        </div>
                    @endif
                    <a class="btn btn-info" href="{{route('slider.create')}}">Creer un Nouveau Slider</a>
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Tous les Slider</h4>
                            <p class="category">L'ensemble des images qui vont defiler en haut du site</p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table table-hover table-striped" id="table" cellspacing="0" width="100%">
                                <thead class="text-primary">
                                <th>ID</th>
                                <th>Titre</th>
                                <th>Sous Titre</th>
                                <th>Image</th>
                                <th>Creer A la Date </th>
                                <th>Modifier A la Date </th>
                                <th>Action </th>
                                </thead>
                                <tbody>
                                @foreach($sliders as $key=>$slider)
                                    <tr>
                                        <td> {{$key+1}}</td>
                                        <td>{{$slider->title}}</td>
                                        <td>{{$slider->sub_title}}</td>
                                        <td class="text-primary">{{$slider->image}}</td>
                                        <td class="text-primary">{{$slider->created_at}}</td>
                                        <td class="text-primary">{{$slider->updated_at}}</td>
                                        <td>
                                            <a href="{{ route('slider.edit',$slider->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                                            <form id="delete-form-{{ $slider->id }}" action="{{ route('slider.destroy',$slider->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $slider->id }}').submit();
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
                        "sLengthMenu": "Afficher _MENU_  slider par page",
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

