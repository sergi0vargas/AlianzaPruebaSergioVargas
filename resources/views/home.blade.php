@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4 justify-content-center ">
            <div class="col-2">
                <div class="card-header">Bienvenido! <br> {{ Auth::user()->name }} {{ Auth::user()->last_name }}</div>
            </div>
        </div>
        <div class="row mt-2 justify-content-center">
            <div class="col-md-6">
                <p>Añade los datos personales de tus empleados y despues agrega su cargo en tu empresa</p>
            </div>
        </div>
        <div class="row mt-2 justify-content-center">
            <div class="col-2">
                <a href="/users"><img width="80"
                        src="https://upload.wikimedia.org/wikipedia/commons/0/0e/Add_user_icon_%28blue%29.svg"
                        alt=""><br> Empieza Aqui</a>
            </div>
        </div>
    </div>
@endsection
