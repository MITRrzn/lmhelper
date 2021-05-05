@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Регистрация нового пользователя</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col s12 col-form-label text-md-right">Имя</label>

                            <div class="col s12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col s12 col-form-label text-md-right">E-mail</label>

                            <div class="col s12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col s4">
                                <div class="input-field">
                                    <select name="departmentID" required>
                                        <option value="" disabled selected>Выберете отдел</option>
                                        <option value="1">Стройматериалы</option>
                                        <option value="2">Столярные изделия</option>
                                        <option value="3">Электрика</option>
                                        <option value="4">Инструменты</option>
                                        <option value="5">Напольные покрытия</option>
                                        <option value="6">Плитка</option>
                                        <option value="7">Сантехника</option>
                                        <option value="8">Водоснабжение</option>
                                        <option value="9">Сад</option>
                                        <option value="10">Скобяные изделия</option>
                                        <option value="11">Краски</option>
                                        <option value="12">Декор</option>
                                        <option value="13">Свет</option>
                                        <option value="14">Хранение</option>
                                        <option value="15">Кухни</option>
                                        <option value="99">B2B</option>
                                    </select>
                                    <label>Номер отедела</label>
                                </div>
                            </div>
                            <div class="col s4">
                                <label for="shopID">Номер магазина</label>
                                <input type="number" name="shopID" id="shopID" required>
                            </div>
                            <div class="col s4">
                                <label for="regionID">Номер региона</label>
                                <input type="number" name="regionID" id="regionID" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col s12 col-form-label text-md-right">Пароль</label>

                            <div class="col s12">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col s12 col-form-label text-md-right">Подтвердите
                                пароль</label>

                            <div class="col s12">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary confirm-btn indigo darken-1">
                                    Зарегестрировать пользователя
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('select').formSelect();
    });
</script>
@endsection