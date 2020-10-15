@extends('layouts.app')
@section('content')

    @if (count ($allzaidimas)>=1 )
    <h2 id="pageTitle">{{$datta}} žaidimai</h2>
    <div class="row">
        <div>
            @auth
            <a href="/zaidimu_naujienos/public/zaidimas/naujas"><h2 id="pageTitle">Pridėti žaidimą </a></h2>
                @endauth
        </div>

      @foreach ($allzaidimas as $zaidimasData)

            <div class="blog-post">
                <h2 class="blog-post-title"> <a href="{{$datta}}/{{$zaidimasData->pavadinimas}}">{{ $zaidimasData->pavadinimas }} </a></h2>
                <p class="blog-post-meta">Išleidimo data : {{ $zaidimasData->isleidimo_data }}</p>

                <p>Aprašymas: {{ $zaidimasData->aprasymas }} </p>
            @auth
            </div><!-- /.blog-post -->
            <a class="btn btn-primary"  href="{{ route('editzaidima', $zaidimasData->getKey())}}">
                <span>Redaguoti</span>
            </a>

            <a class="btn btn-danger" onclick="javascript:return confirm('Do you really want to delete this?')" href="{{route('deleteZaidima',$zaidimasData->getKey())}}" >
                <span>Pašalinti</span>
            </a>
                @endauth
    @endforeach


        {{ $allzaidimas->links("pagination::bootstrap-4") }}
        @else
              <p>Žaidimų nėra</p>
    @endif
@endsection