<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>

<body>

    <form action="/add" method="post">



        <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
        <br>
        <br>
        <input type="number" name="article" placeholder="article" id="article">
        <br>
        <br>
        <input type="text" name="name" placeholder="name" id="name">
        @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
        <br>
        <br>
        <input type="text" name="plant" placeholder="plant" id="plant">
        <br><br>
        <input type="text" name="color" placeholder="color" id="color">
        <br><br>
        <button type="submit" id="add">press me</button>
    </form>



    {{--
    <script>
        $(document).ready(function () {
            $("#add").on("click", function () {
                var article = $('#article').val();
                var name = $('#name').val();
                var plant = $('#plant').val();
                var color = $('#color').val();
                var btn = $(this);
                $.ajax({
                    url: "{{ route('addgrout') }}"
                    , method: 'POST'
                    , data: {
                        _token: $("#csrf").val()
                        , article: article
                        , name: name
                        , plant: plant
                        , color: color
                    }
                    , success: function (data) {
                        alert('SUCCESS!')
                    }
                });
            });

        });

    </script> --}}

</body>


</html>