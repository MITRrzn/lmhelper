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
    <div class="row cont">
        <div class="srch-form col s12">
            <form action="" method="get">
                <div class="row">
                    <div class="col s12">
                        <input type="text" name="search" placeholder="Поиск" value="{{ $search }}">
                    </div>
                </div>
                <div class="row">
                    {{-- <div class="col s12 findselect">
                        <label>
                            <input name="findBy" type="radio" value="customer_phone" checked />
                            <span>Телефон</span>
                        </label>
                        <label>
                            <input name="findBy" type="radio" value="customer_name" />
                            <span>Клиент</span>
                        </label>
                        <label>
                            <input name="findBy" type="radio" value="inner_order" />
                            <span>№ заказа</span>
                        </label>
                        <label>
                            <input name="findBy" type="radio" value="article" />
                            <span>Артикул</span>
                        </label>
                    </div> --}}
                </div>

                <button type="submit" class="btn action-btn indigo darken-1">Найти</button>
                <a href="{{ route('orders') }}" class="btn action-btn indigo darken-1">Сброс</a>
            </form>
        </div>
    </div>
</div>


<div class="container">
    <div class="col s12">
        <a class="waves-effect waves-light btn modal-trigger newordr indigo darken-1" href="#modal1">Новая заявка</a>
    </div>
</div>



<div id="modal1" class="modal">
    <div class="modal-content">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('addorder') }}" method="post">
            @csrf
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Клиент" id="name" type="text" class="validate" name="name">
                    <label for="name">Клиент</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Номер телефона" id="phone" type="text" class="validate" name="phone">
                    <label for="phone">Номер телефона</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Артикул" data-length="8" id="article" type="number" class="validate count" name="article" id="article" onkeyup="this.value = this.value.replace(/[^\d]/g,'');">
                    <label for="article">ЛМ код</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Количество" id="quantity" type="number" class="validate" name="quantity" onkeyup="this.value = this.value.replace(/[^\d]/g,'');">
                    <label for="quantity">Количество</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="Номер заказа/сметы" data-length="12" id="inner_order" type="number" class="validate count" name="inner_order">
                    <label for="inner_order">Номер заказа/сметы</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="note" id="note">
                    <label for="note">Заметки к заказу</label>
                </div>
            </div>
            <div class="row">
                <button type="submit" class="btn addbtn indigo darken-1">Создать заявку</button>
            </div>
        </form>
    </div>
</div>


<div class="container orders">
    <table>
        <thead>
            <tr>
                <th>№</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>№ заказа</th>
                <th>Артикул</th>
                <th>Статус</th>
                <th></th>
                <th>Дата создания</th>
            </tr>
        </thead>

        <tbody>
            @foreach($all as $elem)
            <tr>
                <td>{{ $elem->id }}</td>
                <td>{{ $elem->customer_name }}</td>
                <td>{{ $elem->customer_phone }}</td>
                <td>
                    <a href="https://customerorders.leroymerlin.ru/orders_v2/{{ $elem->inner_order }}">{{ $elem->inner_order }}</a>
                </td>
                <td>{{ $elem->article }}</td>
                <td>{{ $elem->status_value }}</td>
                <td>
                    @switch($elem->status_value)
                    @case("Заказать")
                    <a class="btn-small btn-floating pulse red"><i class="tiny material-icons">error</i></a>
                    @break
                    @case("Заказан")
                    <a class="btn-small btn-floating orange lighten-1"><i class="tiny material-icons">local_shipping</i></a>
                    @break
                    @case("Приехал")
                    <a class="btn-small btn-floating grey darken-1 "><i class="tiny material-icons">shopping_basket</i></a>
                    @break
                    @case("Выдан")
                    <a class="btn-small btn-floating  green "><i class="tiny material-icons">attach_money</i></a>
                    @break
                    @endswitch
                </td>

                <td>{{ Carbon\Carbon::parse($elem->date)->format('d.m.Y') }}</td>
                <td> <a href="/orders/{{ $elem->id }}_{{ $elem->article }}_{{ $elem->inner_order }}"> <i class="material-icons">info_outline</i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>






<script>
    $(document).ready(function() {
        $('.modal').modal();
        $('select').formSelect();
        $('#note').val('');
        M.textareaAutoResize($('#note'));

        $('.count').characterCounter();

    });
    $(function() {
        $("#phone").mask("+7 (999) 999-99-99");
    });

</script>

@endsection
@section('footer')
@parent
@endsection
@endsection
