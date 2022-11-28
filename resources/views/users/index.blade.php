@extends('layouts.app')
@section('imports')
    <script src="js/geodatasource-cr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/geodatasource-countryflag.css">

    <link rel="gettext" type="application/x-po" href="languages/es/LC_MESSAGES/es.po" />
    <script type="text/javascript" src="js/Gettext.js"></script>
    <style>
        .modal-backdrop {
            /* bug fix - no overlay */
        }

        .ui-front {
            z-index: 2000;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row m-4">
            <div class="col">
                <h2>Users </h2>
            </div>
            <div class="col"><button data-bs-toggle="modal" data-bs-target="#new"
                    class="btn btn-success">Agregar</button>
            </div>
        </div>
        <div class="row mt-4 justify-content-center">
            <div class="col-12">
                <table class="table table-striped table-responsive table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Identificacion</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Ciudad</th>
                            <th>Email</th>
                            <th>Jefe</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->last_name }}</td>
                                <td>{{ $item->document_number }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->birth_place }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->jefe ? $item->jefe->name : 'No tiene' }}</td>
                                <td>
                                    <div class="row">

                                        <div class="col-6">
                                            <button data-bs-toggle="modal" data-bs-target="#add"
                                                data-bs-user="{{ $item }}" class="btn btn-primary">Agregar
                                                Cargo</button>
                                        </div>
                                        <div class="col-6">
                                            <form action="{{ url('/users', $item) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input class="btn btn-danger" type="submit" value="Eliminar Usuario" />
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Identificacion</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Ciudad</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal Agregar -->
    <div class="modal fade" id="new" tabindex="-1" aria-labelledby="AddLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddLabel">Add</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formNew" class="basicform" action="{{ route('users.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input required class="form-control" type="text" name="name" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Apellido</label>
                                    <input class="form-control" type="text" name="last_name" id="last_name">
                                </div>
                                <div class="form-group">
                                    <label for="document_number">Identificacion</label>
                                    <input class="form-control" type="text" name="document_number" id="document_number">
                                </div>
                                <div class="form-group">
                                    <label for="address">Direccion</label>
                                    <input class="form-control" type="text" name="address" id="address">
                                </div>
                                <div class="form-group">
                                    <label for="password">password</label>
                                    <input class="form-control" type="password" name="password" id="password">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="phone">Telefono</label>
                                    <input class="form-control" type="text" name="phone" id="phone">
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Pais</label>
                                    <div class="col-sm-10">
                                        <select class="form-control gds-cr gds-countryflag"
                                            country-data-region-id="gds-cr-1" data-language="es"></select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="gds-cr-1" class="col-sm-2 control-label">Ciudad</label>
                                    <div class="col-sm-10">
                                        <select name="birth_place" class="form-control" id="gds-cr-1"></select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Correo</label>
                                    <input class="form-control" type="email" name="email" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="type">Jefe</label>
                                    <select class="form-control" name="boss_id" id="boss_id">
                                        @foreach ($data as $usuario)
                                            <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button form="formNew" type="submit" class="btn btn-primary basicbtn">Add</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal Agregar -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="AddLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddLabel">Agregar Rol</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formAdd" class="basicform" action="{{ route('roles.adduser') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Usuario</label>
                            <input required class="form-control" type="text" name="user_name" id="user_name">
                            <input type="hidden" name="user_id" id="user_id">
                        </div>
                        <div class="form-group">
                            <label for="type">Cargo</label>
                            <select required class="form-control" name="role_id" id="role_id">
                                @foreach ($roles as $item)
                                    <option value="{{ $item->id }}">{{ $item->area }} - {{ $item->cargo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="type">Rol</label>
                            <select class="form-control" name="rol" id="rol">
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button form="formAdd" type="submit" class="btn btn-primary basicbtn">Add</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var addModal = document.getElementById('add');
        addModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var user = button.getAttribute('data-bs-user');
            user = (JSON.parse(user));
            console.log(user);
            $("#rol").empty();
            if (user.is_president == 1) {
                $('#rol').append("<option value='1'>Jefe</option>")
            } else {

                $('#rol').append("<option value='1'>Jefe</option><option value='2'>Colaborador</option>")
            }
            var modalTitle = addModal.querySelector('.modal-title');
            modalTitle.textContent = 'Agregar rol a  ' + user.name;

            var inputid = addModal.querySelector('#user_id');
            inputid.value = user.id;

            var name = addModal.querySelector('#user_name');
            name.value = user.name + ' ' + user.last_name;
        })
    </script>
@endsection
