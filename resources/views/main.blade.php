<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <!-- JQuerry -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- Compiled and minified ICONS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <main>

        <div class="container">
            <div class="row">
                <div class="col s3"></div>
                <div class="srch-form col s6">
                    <form action="" method="get">
                        <input type="text" name="search" placeholder="Поиск">
                        <button type="submit" class="btn srch-btn indigo lighten-3">Найти</button>
                    </form>
                </div>
                <div class="col s3"></div>
            </div>
            <div class="row">
                <div class="col s12">
                    <ul class="tabs">
                        <div class="col s2"></div>
                        <li class="tab col s2"><a href="#ceresit">Ceresit</a></li>
                        <li class="tab col s2"><a href="#litokol">Litokol</a></li>
                        <li class="tab col s2"><a href="#osnovit">ОСНОВИТ</a></li>
                        <li class="tab col s2"><a href="#mapei">MAPEI</a></li>
                        <li class="tab col s2"><a href="#axton">MAPEI</a></li>
                    </ul>
                </div>
                <div id="ceresit" class="col s12">
                    @foreach($ceresit as $grout)
                    {{ $grout->name }}<br>
                    @endforeach
                </div>
                <div id="litokol" class="col s12">
                    @foreach($litokol as $grout)
                    {{ $grout->name }}<br>
                    @endforeach
                    @foreach($starlike as $grout)
                    {{ $grout->name }}<br>
                    @endforeach

                </div>
                <div id="osnovit" class="col s12">
                    @foreach($osnovit as $grout)
                    {{ $grout->name }}<br>
                    @endforeach
                </div>
                <div id="mapei" class="col s12">
                    @foreach($mapei as $grout)
                    {{ $grout->name }}<br>
                    @endforeach
                </div>
                <div id="axton" class="col s12">
                    @foreach($axton as $grout)
                    {{ $grout->name }}<br>
                    @endforeach
                </div>
            </div>
        </div>



        @foreach($grout_all as $grout_det)
        {{ $grout_det->name }}: {{ $grout_det->color }}<br>
        <!-- <img src="{{ $grout_det->img }}" alt="Grout image"> -->
        @endforeach







    </main>
    <footer class="page-footer indigo darken-2">

        <div class="footer-copyright indigo darken-4">
            <div class="container">
                © 2020
            </div>
        </div>
    </footer>

</body>

<script>
    var el = document.querySelector('.tabs');
    var instance = M.Tabs.init(el, {});

</script>

</html>