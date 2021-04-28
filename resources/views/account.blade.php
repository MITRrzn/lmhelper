@extends('main')
@section('body')
@parent

@section('search')

@endsection


@section('serch-result')

@endsection
@section('dropdown')
@parent
@endsection
@section('content')
{{-- content here --}}
<div class="container">
    <h1>Hello {{ $user->name }}</h1>
    <h2>Скоро здесть что то будет</h2>
</div>



<script>


</script>

@endsection
@section('footer')
@parent
@endsection
@endsection
