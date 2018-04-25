@extends('layouts.app')
@section('title','Enregistrer un Slider')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @include('layouts.partial.msg')
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">enregistrer un slider</h4>
                        </div>
                        <div class="card-content ">
                            <form action="{{route('slider.store')}}" method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Titre</label>
                                            <input type="text" class="form-control" name="title">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Sous-Titre</label>
                                            <input type="text" class="form-control" name="sub_title">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Image</label>
                                        <input type="file" name="image">
                                   </div>
                                    <a href="{{route('slider.index')}}" class=" btn btn-danger">Retour</a>
                                    <button type="submit" class=" btn btn-primary">Envoyer</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


