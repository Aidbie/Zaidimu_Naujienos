@extends('layouts.app')
@section('content')
    <h1 class="align">Redaguojamas žaidimas </h1>
    <div class="row">
        <div class="col-md-12 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('zaidimas/confirmedit', $selectedZaidimas->getKey()) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Žaidimo kodas</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="zaidimo_kodas" value="{{$selectedZaidimas->zaidimo_kodas}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Pavadinimas</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="pavadinimas" value="{{$selectedZaidimas->pavadinimas}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Išleidimo data</label>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="isleidimo_data" value="{{$selectedZaidimas->isleidimo_data}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Aprašymas</label>
                            <div class="col-md-12">
                                <textarea type="text" class="form-control" name="aprasymas">{{$selectedZaidimas->aprasymas}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kūrėjas</label>
                            <div class="col-md-12">
                                <select class="form-control" name="fk_Kurejasimones_kodas">
                                    @foreach($allkurejai as $kurejas)
                                        <option value="{{$kurejas->getKey()}}">{{$kurejas->pavadinimas}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Žanras</label>
                            <div class="col-md-12">
                                <select class="form-control" name="zanras">
                                    @foreach($allzanrai as $zanras)
                                        <option value="{{$zanras->getKey()}}">{{$zanras->name}}</option>
                                    @endforeach
                                </select>
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
