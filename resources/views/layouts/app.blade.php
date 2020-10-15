<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>



<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title href="zaidimas">Žaidimų naujienos</title>

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <script type="text/javascript"src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // čia rašomas JQuery kodas
            $('#contentLeft h3').mouseover(function() { // užvedus pelyte
                $(this).css('cursor', 'pointer'); // pakeičiamas pelytės žymeklis
            });

            $('#contentLeft h3').click(function() { // paspaudus contentLeft h2 elem.
                $('#contentLeft ul').slideToggle(); // slepiamas/rodomas ul meniu elem.
            });
        });
    </script>

</head>
<body>
<div id="body">
    <div id="header">
        <a href ="/zaidimu_naujienos/public/home"> <h3 id="slogan">Žaidimų naujienos</h3></a>
    </div>

    <div id="content">
        <div id="topMenu">

            <ul>

                <li><a   class="active">Žaidimai</a></li>
                <li><a href="/zaidimu_naujienos/public/kurejai" class="active">Kūrėjai</a></li>
                <li><a href="/zaidimu_naujienos/public/kontaktai" class="active">Kontaktai</a></li>
                @guest
                    <li><a href="{{ route('login') }}" class="active">Prisijungti</a></li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registruotis') }}</a>
                        </li>
                    @endif
                @else
                    <li><a href="{{ route('logout') }}" class="active"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Atsijungti') }}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </a>
                    </li>
                @endguest
            </ul>




        </div>

        <div id="contentLeft">
            <h3>Pasirinkti metus</h3>
            <ul>
                <li><a href="/zaidimu_naujienos/public/zaidimai/2019">2019</a></li>
                <li><a href="/zaidimu_naujienos/public/zaidimai/2018">2018</a></li>
                <li><a href="/zaidimu_naujienos/public/zaidimai/2017">2017</a></li>
                <li><a href="/zaidimu_naujienos/public/zaidimai/2016">2016</a></li>
            </ul>
        </div>
        <div id="contentRight">

            <p>
                <main class="py-4">
                    <div class="col-12 col-md-9">
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
            <p>{!! \Session::get('success') !!}</p>
        </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <p>jūsų įvedamuose duomenyse yra klaidu:</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @yield('content')
    </div>


    </main>
    </p>

</div>
</div>
<div id="footer">
    Rekvizitai:
    <br>UAB "zaidimaaa"
    <br>Įmonės kodas: 132141896
    <br>PVM kodas: LT321418917

    <br>Sąsk. Nr. LT 62 7180 9000 1546 7035
    <br>AB "Šiaulių bankas" (banko kodas: 71809)
</div>
</div>
</body>
</html>

