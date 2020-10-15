@extends('layouts.app')
@section('content')

    @if (count ($allkurejai)>=1 )
        <h2 id="pageTitle">Žaidimų kūrėjai</h2>
        <div class="row">
            <div>
                @auth
                <a href="/zaidimu_naujienos/public/kurejas/naujas"><h2 id="pageTitle">Pridėti kūrėją </a></h2>
                    @endauth
            </div>
            @foreach ($allkurejai as $kurejasData)

                <div class="blog-post">
                    <h2 class="blog-post-title"> <a href="kurejai/{{ $kurejasData->pavadinimas }}">{{ $kurejasData->pavadinimas }}

                        </a></h2>
                    @auth
                    <a class="btn btn-primary"  href="{{ route('editKureja', $kurejasData->getKey())}}">
                        <span>Redaguoti</span>
                    </a>
                    <a class="btn btn-danger"  onclick="javascript:return confirm('Do you really want to delete this?')" href="{{route('deleteKureja',$kurejasData->getKey())}}" >
                        <span>Pašalinti</span>
                    </a>
                        @endauth

                </div><!-- /.blog-post -->

            @endforeach
            {{ $allkurejai->links("pagination::bootstrap-4") }}
            @else
                <p>Žaidimų nėra</p>
    @endif
@endsection