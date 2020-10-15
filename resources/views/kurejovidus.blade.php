@extends('layouts.app')
@section('content')
    <div class="blog-post">


        </h3>


        <h2 id="pageTitle">{{ $kurejas->pavadinimas }}</h2>
        <div class="row">
            <h3 class="pb-3 mb-4 font-italic border-bottom">
                <p class="blog-post-meta"> Įkūrimo data : {{ $kurejas->ikurimo_data }}</p>

                <p>{{ $kurejas->aprasymas }} </p>
        </div><!-- /.blog-post -->

@endsection