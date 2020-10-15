@extends('layouts.app')
@section('content')
    <h1 class="align">Pridedamas atsiliepimas </h1>
    <div class="row">
        <div class="col-md-12 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('atsiliepimas/pridetiatsiliepima',$id) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Pavadinimas</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="name" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Turinys</label>
                            <div class="col-md-12">
                                <textarea rows="4" cols="50" type="text" class="form-control" name="content" value=""></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Vertinimas</label>
                            <div class="col-md-12">
                                <input type="number" class="form-control" name="vertinimas" min="0" max="10">
                            </div>
                        </div>




                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-refresh"></span>
                                    Add
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection