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
                    <input placeholder="Артикул" id="article" type="number" class="validate" name="article" id="article"
                        min="0" max="99999999" step="1" required
                        onkeyup="this.value = this.value.replace(/[^\d]/g,'');">
                    <label for="article">ЛМ код</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Количество" id="quantity" type="number" class="validate" name="article"
                        id="article" min="0" max="9999" step="1" required
                        onkeyup="this.value = this.value.replace(/[^\d]/g,'');">
                    <label for="quantity">Количество</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input disabled type="number" name="order_num" id="ordernum">
                    <label for="order_num">Номер заказа</label>
                </div>
                <div class="input-field col s6">
                    <input disabled type="number" name="ship_num" id="shipnum">
                    <label for="ship_num">Shipment num</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="note" class="materialize-textarea"></textarea>
                    <label for="note">Заметки к заказу</label>
                </div>
            </div>
            <div class="row">
                <button type="submit" class="btn addbtn">Создать заявку</button>
            </div>
        </form>
    </div>
</div>

<div class="container">
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Article</th>
                <th>Status</th>
                <th>Date</th>
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
                <td>{{ $elem->create_date }}</td>
                <td> <a href="#"> <i class="material-icons">info_outline</i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>






<script>
    $(document).ready(function () {
        $('.modal').modal();

        $('#note').val('');
        M.textareaAutoResize($('#note'));

    });
    $(function () {
        $("#phone").mask("+7 (999) 999-99-99");
    });

</script>

@endsection
@section('footer')
@parent
@endsection
@endsection