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



<div class="container order-cont">
    <div class="row">
        <div class="info col s6">
            Дата создания: <b>{{ Carbon\Carbon::parse($order->date)->format('d.m.Y H:m') }}</b>
            <br>
            Заказ № {{ $order->id }}
        </div>
        <div class="info col s6">
            <div class="input-field col s12">
                <select name="status">
                    <option value="" disabled selected>Статус: {{ $order->status }}</option>
                    <option value="1">Заказать</option>
                    <option value="2">Заказано</option>
                    <option value="3">Приехал</option>
                    <option value="4">Выдан</option>
                </select>
                <label>Статус заказа</label>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="info col s6">
            <input type="text" id="name" name="name" value="{{ $order->customer_name }}">
            <label for="name">Клиент</label>
        </div>
        <div class="info col s6">
            <input type="text" id="phone" name="phone" value="{{ $order->customer_phone }}">
            <label for="phone">Телефон</label>
        </div>
    </div>
    <div class="row order-info">
        <div class="info col s6">
            <input type="number" name="article" id="article" value="{{ $order->article }}">
            <label for="article">ЛМ код</label>
        </div>
        <div class="info col s6">
            <input type="number" name="quantity" id="quantity" value="{{ $order->quantity }}">
            <label for="quantity">Количество</label>
        </div>
    </div>
    @foreach($orderDetail as $det)
    <div class="row">
        <div class="info col s6">
            <input type="text" name="product" disabled id="product" value="{{ $det->name }}">
            <label for="product">Наименование</label>
        </div>
        <div class="info col s6">
            <input type="number" disabled name="EAN" id="EAN" value="{{ $det->EAN }}">
            <label for="quantity">Штрих-код</label>
        </div>
    </div>
    <div class="row">
        <div class="info col s6">
            <input type="number" disabled name="plant_id" id="plant_id" value="{{ $det->plant_id }}">
            <label for="plant_id">Код поставщика</label>
        </div>
        <div class="info col s6">
            <input type="text" disabled name="plant_name" id="plant_name" value="{{ $det->plant_name }}">
            <label for="plant_name">Поставщик</label>
        </div>
    </div>
    @endforeach
    <div class="row">
        <div class="info col s4">
            <input type="number" name="order_num" id="order_number" value="000000000">
            <label for="order_num">Номер заказа/трансфера</label>
        </div>
        <div class="info col s4">
            <input type="number" name="shipment_num" id="shipment_num" value="000000">
            <label for="shipment_num">Номер отгрузки</label>
        </div>
        <div class="info col s4">
            <input type="number" name="inner_order" id="inner_order" value="0000000000">
            <label for="inner_order">Номер заказа/сметы</label>
        </div>
    </div>

    <div class="row">
        <div class="info col s12">
            <input type="text" name="note" id="note" value="{{ $order->note }}">
            <label for="note">Коментарии</label>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="info col s12">
            <a href="/update/{{ $order->id }}" class="btn actionbtn">Обновить информацию</a>
        </div>
    </div>
    <div class="row">
        <div class="info col s12">

            <ul class="collapsible">
                <li>
                    <div class="collapsible-header"><i class="material-icons close pulse">close</i>Удаление заказа</div>
                    <div class="collapsible-body">
                        <a href="/delete/{{ $order->id }}" class="btn actionbtn red darken-4">Удалить заказ</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>





<script>
    $(document).ready(function() {
        $('select').formSelect();
        $('.collapsible').collapsible();
    });

</script>

@endsection
@section('footer')
@parent
@endsection
@endsection
