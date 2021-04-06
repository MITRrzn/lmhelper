<!DOCTYPE html>



<html lang="RU">
@section('head')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    <link rel="shortcut icon" href="/storage/favico.png" type="image/png">


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

    <script src="{{ asset('js/phoneMask.js') }}"></script>
</head>
@show
@section('body')

<body>


    @section('main')


    <main>

        @section('dropdown')
        <a class='dropdown-trigger btn indigo darken-1 menu-ico' href='#' data-target='dropdown1'>
            Menu
        </a>

        <!-- Dropdown Structure -->
        <ul id='dropdown1' class='dropdown-content'>
            <li><a href="{{ route('grout_page') }}"><i class="material-icons">home</i>Затирки</a></li>
            <li><a href="{{ route('orders') }}"><i class="material-icons">star_half</i>Заказы</a></li>
        </ul>
        @show
        <div class="header">
            <h3>{{ $title }}</h3>
        </div>
        @section('content')

        @show

        @section('search')
        <div class="container">
            <div class="row cont">

                <div class="srch-form col s6 offset-s3">
                    <form action="" method="get">
                        <input type="text" name="search" placeholder="Поиск по цвету" value="{{ $search }}">
                        <button type="submit" class="btn action-btn indigo darken-1">Найти</button>
                        <a href="/" class="btn action-btn indigo darken-1">Сброс</a>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col s12 tab">
                    @if(@isset($grout_all))

                    <ul class="tabs">
                        <li class="tab col s2"><a href="/#ceresit">Ceresit</a></li>
                        <li class="tab col s2"><a href="/#litokol">Litokol</a></li>
                        <li class="tab col s2"><a href="/#osnovit">ОСНОВИТ</a></li>
                        <li class="tab col s2"><a href="/#mapei">MAPEI</a></li>
                        <li class="tab col s2"><a href="/#axton">Axton</a></li>
                    </ul>
                    @else
                    <ul class="tabs">
                        <li class="tab col s2"><a href="#ceresit">Ceresit</a></li>
                        <li class="tab col s2"><a href="#litokol">Litokol</a></li>
                        <li class="tab col s2"><a href="#osnovit">ОСНОВИТ</a></li>
                        <li class="tab col s2"><a href="#mapei">MAPEI</a></li>
                        <li class="tab col s2"><a href="#axton">Axton</a></li>
                    </ul>
                    @endif
                </div>
                <div id="ceresit" class="col s12">
                    @isset($ceresit)
                    <table class="highlight">
                        <thead>
                            <tr>
                                <th>Название</th>
                                <th>Цвет</th>
                                <th>LM код</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($ceresit as $grout)
                            <tr>
                                <td>{{ $grout->name }}</td>
                                <td>{{ $grout->color }}</td>
                                <td class="article" onclick="M.toast({html: 'Скопировано', classes: 'rounded'})">
                                    <b>{{$grout->article }}</b>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endisset

                </div>
                <div id="litokol" class="col s12">
                    @isset($litokol)
                    <table class="highlight">
                        <thead>
                            <tr>
                                <th>Название</th>
                                <th>Цвет</th>
                                <th>LM код</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($litokol as $grout)
                            <tr>
                                <td>{{ $grout->name }}</td>
                                <td>{{ $grout->color }}</td>
                                <td class="article"><b>{{ $grout->article }}</b></td>
                            </tr>
                            @endforeach
                            @foreach($starlike as $grout)
                            <tr>
                                <td>{{ $grout->name }}</td>
                                <td>{{ $grout->color }}</td>
                                <td class="article" onclick="M.toast({html: 'Скопировано', classes: 'rounded'})"><b>{{
                                        $grout->article }}</b></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endisset


                </div>
                <div id="osnovit" class="col s12">
                    @isset($osnovit)
                    <table class="highlight">
                        <thead>
                            <tr>
                                <th>Название</th>
                                <th>Цвет</th>
                                <th>LM код</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($osnovit as $grout)
                            <tr>
                                <td>{{ $grout->name }}</td>
                                <td>{{ $grout->color }}</td>
                                <td class="article" onclick="M.toast({html: 'Скопировано', classes: 'rounded'})"><b>{{
                                        $grout->article }}</b></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endisset

                </div>
                <div id="mapei" class="col s12">
                    @isset($mapei)
                    <table class="highlight">
                        <thead>
                            <tr>
                                <th>Название</th>
                                <th>Цвет</th>
                                <th>LM код</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($mapei as $grout)
                            <tr>
                                <td>{{ $grout->name }}</td>
                                <td>{{ $grout->color }}</td>
                                <td class="article" onclick="M.toast({html: 'Скопировано', classes: 'rounded'})"><b>{{
                                        $grout->article }}</b></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endisset

                </div>
                <div id="axton" class="col s12">
                    @isset($axton)
                    <table class="highlight">
                        <thead>
                            <tr>
                                <th>Название</th>
                                <th>Цвет</th>
                                <th>LM код</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($axton as $grout)
                            <tr>
                                <td>{{ $grout->name }}</td>
                                <td>{{ $grout->color }}</td>
                                <td class="article" onclick="M.toast({html: 'Скопировано', classes: 'rounded'})"><b>{{
                                        $grout->article }}</b></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endisset

                </div>
            </div>
        </div>
        @show

        @section('serch-result')
        <div class="container srch-cont">
            <div class="row grout-cards">
                @isset($grout_all)
                @foreach($grout_all as $grout_det)
                <div class="grout-card col">
                    <div class="grout-card-head">
                        <div class="article" onclick="M.toast({html: 'Скопировано', classes: 'rounded'})">{{
                            $grout_det->article }}</div>

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
        @show

    </main>
    @show

    @section('footer')
    <footer class="page-footer indigo darken-2">

        <div class="footer-copyright indigo darken-4">
            <div class="container">
                &copy 2020
            </div>
        </div>
    </footer>
    @show
    @section('script')
    <script>
        @if(!isset($grout_all))
        var el = document.querySelector('.tabs');
        var instance = M.Tabs.init(el, {});
        @endif



        function copyToClipboard(str) {
            var area = document.createElement("textarea");
            document.body.appendChild(area);
            area.value = str;
            area.select();
            document.execCommand("copy");
            document.body.removeChild(area);
        }


        $(document).ready(function() {
            $('.materialboxed').materialbox();

            $(".article").on("click", function() {
                copyToClipboard($(this).text());
            });

            $('.dropdown-trigger').dropdown();

        });

    </script>
    @show

</body>
@show


</html>
