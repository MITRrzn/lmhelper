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
            <div class="row cont">
                <div class="col s3"></div>
                <div class="srch-form col s6">
                    <form action="" method="get">
                        <input type="text" name="search" placeholder="Поиск по цвету" value="{{ $search }}">
                        <button type="submit" class="btn action-btn indigo darken-1">Найти</button>
                        <a href="/" class="btn action-btn indigo darken-1">Сброс</a>
                    </form>
                </div>
                <div class="col s3"></div>
            </div>
            <div class="row">
                <div class="col s12 tab">
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
                    @isset($ceresit)
                    @foreach($ceresit as $grout)
                    {{ $grout->name }}<br>
                    @endforeach
                    @endisset

                </div>
                <div id="litokol" class="col s12">
                    @isset($litokol)
                    @foreach($litokol as $grout)
                    {{ $grout->name }}<br>
                    @endforeach
                    @foreach($starlike as $grout)
                    {{ $grout->name }}<br>
                    @endforeach
                    @endisset


                </div>
                <div id="osnovit" class="col s12">
                    @isset($osnovit)
                    @foreach($osnovit as $grout)
                    {{ $grout->name }}<br>
                    @endforeach
                    @endisset

                </div>
                <div id="mapei" class="col s12">
                    @isset($mapei)
                    @foreach($mapei as $grout)
                    {{ $grout->name }}<br>
                    @endforeach
                    @endisset

                </div>
                <div id="axton" class="col s12">
                    @isset($axton)
                    @foreach($axton as $grout)
                    {{ $grout->name }}<br>
                    @endforeach
                    @endisset

                </div>
            </div>
        </div>

        <div class="container srch-cont">
            <div class="row">
                @isset($grout_all)
                @foreach($grout_all as $grout_det)
                <div class="grout-card col s12">
                    <div class="grout-card-head">
                        <div class="article">{{ $grout_det->article }}</div>
                        <div class="copy">
                            <i class="material-icons copy-btn">content_copy</i>
                        </div>
                    </div>
                    <div class="grout-card-img">
                        <img src="{{ $grout_det->img }}" alt="" class="grout-img materialboxed ">
                    </div>
                    <div class="grout-card-info">
                        <div class="name">
                            <b>Название:</b><span class="name"> {{ $grout_det->name }}</span>
                        </div>

                        <div class="color">
                            <b>Цвет:</b><span class="color-name">
                                {{ $grout_det->color }}
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
                @endisset
            </div>
        </div>

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

    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('.materialboxed');
        var instances = M.Materialbox.init(elems, options);
    });

    // Or with jQuery

    $(document).ready(function () {
        $('.materialboxed').materialbox();
    });


</script>

</html>