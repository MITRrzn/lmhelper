<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/add" method="post">
        @csrf
        <input type="number" name="article" placeholder="article">
        <br>
        <br>
        <input type="text" name="name" placeholder="name">
        <br>
        <br>
        <input type="text" name="plant" placeholder="plant">
        <br><br>
        <input type="text" name="color" placeholder="color">
        <br><br>
        <button type="submit">press me</button>
    </form>

    @foreach($litokol as $elem)
    {{ $elem->name }}<br>
    @endforeach
</body>
<style>

</style>

</html>
