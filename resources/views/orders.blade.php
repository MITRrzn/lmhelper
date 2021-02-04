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
    <div class="col s12">
        <a class="waves-effect waves-light btn modal-trigger newordr" href="#modal1">Новая заявка</a>
    </div>
</div>



<div id="modal1" class="modal">
    <div class="modal-content">
        <form action="{{ route('addorder') }}" method="post">
            @csrf
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Клиент" id="name" type="text" class="validate" name="name" required>
                    <label for="name">Клиент</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Номер телефона" id="phone" type="text" class="validate" name="phone" required>
                    <label for="phone">Номер телефона</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Артикул" data-length="8" id="article" type="number" class="validate count" name="article" id="article" min="0" max="99999999" step="1" required onkeyup="this.value = this.value.replace(/[^\d]/g,'');">
                    <label for="article">ЛМ код</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Количество" id="quantity" type="number" class="validate" name="quantity" min="0" max="9999" step="1" required onkeyup="this.value = this.value.replace(/[^\d]/g,'');">
                    <label for="quantity">Количество</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="Номер заказа/сметы" data-length="12" id="inner_order" type="number" class="validate count" name="inner_order" min="0" max="999999999999" step="1" required onkeyup="this.value = this.value.replace(/[^\d]/g,'');">
                    <label for="inner_order">Номер заказа/сметы</label>
                </div>
                <!-- <div class="input-field col s6">
                    <input disabled type="number" name="ship_num" id="shipnum">
                    <label for="ship_num">Shipment num</label>
                </div> -->
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="note" id="note">
                    <label for="note">Заметки к заказу</label>
                </div>
            </div>
            <div class="row">
                <button type="submit" class="btn addbtn">Создать заявку</button>
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
                <td>{{ $elem->article }}</td>
                <td>{{ $elem->status }}</td>
                <td>
                    @switch($elem->status)
                    @case("заказать")
                    <a class="btn-small btn-floating pulse red"><i class="tiny material-icons">error</i></a>
                    @break
                    @case("заказан")
                    <a class="btn-small btn-floating  green "><i class="tiny material-icons">check</i></a>
                    @break
                    @case("выдан")
                    <a class="btn-small btn-floating  green "><i class="tiny material-icons">attach_money</i></a>
                    @break
                    @case("позвонить")
                    <a class="btn-small btn-floating yellow accent-4 "><i class="tiny material-icons">local_phone</i></a>
                    @break
                    @endswitch
                </td>


                <td>{{ $elem->date }}</td>
                <td> <a href="/orders/{{ $elem->id }}"> <i class="material-icons">info_outline</i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>






<script>
    $(document).ready(function() {
        $('.modal').modal();

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
