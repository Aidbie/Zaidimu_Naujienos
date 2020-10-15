@extends('layouts.app')
@section('content')
    <h1 class="align">Redaguojamas kūrėjas </h1>
    <div class="row">
        <div class="col-md-12 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('kurejas/confirmedit', $selectedKurejas->getKey()) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Kūrėjo įmonės kodas</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="imones_kodas" value="{{$selectedKurejas->imones_kodas}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Pavadinimas</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="pavadinimas" value="{{$selectedKurejas->pavadinimas}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Įkūrimo data</label>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="ikurimo_data" value="{{$selectedKurejas->ikurimo_data}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Aprašymas</label>
                            <div class="col-md-12">
                                <textarea type="text" class="form-control" name="aprasymas" >{{$selectedKurejas->aprasymas}}</textarea>
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