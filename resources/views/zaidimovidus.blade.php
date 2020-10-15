@extends('layouts.app')
@section('content')
    <div class="blog-post">




                <h2 id="pageTitle">{{ $zaidimas->pavadinimas }}</h2>
                <div class="row">
                    <h3 class="pb-3 mb-4 font-italic border-bottom">
                <p class="blog-post-meta">
                    Kūrėjas: {{$kurejas}}</p>
                        <p>Išleidimo data : {{ $zaidimas->isleidimo_data }}</p>
                        </h3>
                        <p>{{ $zaidimas->aprasymas }} </p>


            </div><!-- /.blog-post -->


                <h3>Atsiliepimai</h3>
        @auth
        <h2 class="blog-post-title"> <a href="{{route('naujatsi',$zaidimas->getKey())}}">Rašyti atsiliepimą </a></h2>
        @endauth
            <table>
            @foreach ($allatsiliepimas as $atsiliepimasData)

            <tr>
                <th>{{$atsiliepimasData->pavadinimas}}</th>
                @auth
                <th><a class="btn btn-danger" onclick="javascript:return confirm('Do you really want to delete this?')" href="{{route('deleteAtsiliepima',$atsiliepimasData->getKey())}}">Pašalinti atsiliepimą</a></th>
                @endauth
                </tr>
                <tr>
                    <th>{{$atsiliepimasData->fk_VartotojasNaudotojo_vardas}}</th>
                    <th>{{$atsiliepimasData->paskelbimo_data}}</th>
                </tr>

                    <tr>

                <td>{{$atsiliepimasData->turinys}}</td>
                    <tr>
                    <tr>
                <td>{{$atsiliepimasData->vertinimas}}</td>
                    </tr>
            </tr>
            @endforeach
        </table>





@endsection