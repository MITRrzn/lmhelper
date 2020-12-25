<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Hello {{ $name }}</h2>

    <ul>
        @foreach($grout as $grout_det)
        <li>{{ $grout_det->img_pth }}</li>
        @endforeach
    </ul>
</body>

</html>
