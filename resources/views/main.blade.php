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