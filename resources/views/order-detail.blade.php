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

<form>
    {{-- <form action="/update/{{ $order->id }}" method="post"> --}}
    @csrf
    @foreach($orderDetail as $det)
    <div class="container order-cont">
        <div class="row">
            <div class="info col s6">
                Дата создания: <b>{{ Carbon\Carbon::parse($order->date)->format('d.m.Y H:i') }}</b>
                <br>
                @isset($order->updated_at)
                Последнее обновление:
                <b>{{ Carbon\Carbon::parse($order->updated_at)->format('d.m.Y H:i') }}</b>
                @endisset

                <br>
                Заказ № {{ $order->id }}
            </div>
            <div class="info col s6">
                <div class="input-field col s12">
                    <select name="status" id="status">
                        <option value="{{ $order->status }}" selected>Статус: {{ $det->status_value }}
                        </option>

                        @foreach($status_list as $item)
                        <option value="{{ $item->id }}">{{ $item->status_value }}</option>
                        @endforeach

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
                <input type="text" name="product" disabled id="product" value="{{ $det->name }}">
                <label for="product">Наименование</label>


            </div>
            <div class="info col s6">
                <input type="number" name="quantity" id="quantity" value="{{ $order->quantity }}">
                <label for="quantity">Количество</label>
            </div>
        </div>

        <div class="row">
            <div class="info col s6">
                <input type="number" disabled name="article" id="article" value="{{ $order->article }}">
                <label for="article">ЛМ код</label>
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

        <div class="row">
            <div class="info col s4">
                <input type="number" name="order_num" id="order_number" value="{{ $det->order_number }}">
                <label for="order_num">Номер заказа/трансфера</label>
            </div>
            <div class="info col s4">
                <input type="number" name="shipment_num" id="shipment_num" value="{{ $det->shipment_num }}">
                <label for="shipment_num">Номер отгрузки</label>
            </div>
            <div class="info col s4">
                <input type="number" required name="inner_order" id="inner_order" value="{{ $det->inner_order }}">
                <label for="inner_order">Номер заказа/сметы</label>
            </div>
        </div>
        @endforeach
        <div class="row">
            <div class="info col s12">
                <input type="text" name="note" id="note" value="{{ $order->note }}">
                <label for="note">Коментарии</label>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="info col s12">
                <button type="submit" class="btn actionbtn indigo darken-1 btn-submit">Обновить информацию</button>
            </div>
        </div>


    </div>
</form>
<div class="container">
    <div class="row">
        <div class="info col s12">
            <ul class="collapsible">
                <li>
                    <div class="collapsible-header"><i class="material-icons close pulse">close</i>Удаление
                        заказа
                    </div>
                    <div class="collapsible-body">
                        <form action="/delete/{{ $order->id }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn actionbtn red darken-4">Удалить заказ</button>
                        </form>
                        <!-- <a href="" class="btn actionbtn red darken-4">Удалить заказ</a> -->
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

    $(document).ready(function() {

        $(".row").on("click", ".btn-submit", function(e) {
            // $(".btn-submit").click(function (e) {

            e.preventDefault();


            var _token = $("input[name='_token']").val();
            var status = $('#status').val();
            var name = $("#name").val();
            var phone = $("#phone").val();
            var article = $("#article").val();
            var quantity = $("#quantity").val();
            var order_number = $("#order_number").val();
            var shipment_num = $("#shipment_num").val();
            var inner_order = $("#inner_order").val();
            var note = $('#note').val();


            $.ajax({

                url: "/update/{{ $order->id }}"
                , type: 'POST'
                , data: {
                    _token: _token
                    , status: status
                    , name: name
                    , phone: phone
                    , article: article
                    , quantity: quantity
                    , order_number: order_number
                    , shipment_num: shipment_num
                    , inner_order: inner_order
                    , note: note
                },

                success: function(data) {
                    console.log(data.error)
                    if ($.isEmptyObject(data.error)) {
                        console.log("Order updated");
                        M.toast({
                            html: 'Заказ обновлен'
                        });
                    } else {
                        console.log("some error here");
                        M.toast({
                            html: '<ul><li><span class="text-danger error-text name_err"></span></li><li><span class="text-danger error-text phone_err"></span></li><li><span class="text-danger error-text article_err"></span></li><li><span class="text-danger error-text quantity_err"></span></li><li><span class="text-danger error-text inner_order_err"></span></li></ul>'
                            , classes: 'rounded red darken-4'
                            , displayLength: 10000
                        });
                        // $("#error-info").fadeIn("slow");
                        printErrorMsg(data.error);
                    }
                }
            });
        });

        function printErrorMsg(msg) {
            $.each(msg, function(key, value) {
                console.log(key);
                $('.' + key + '_err').text(value);
            });
        }
    });

</script>

@endsection
@section('footer')
@parent
@endsection
@endsection
