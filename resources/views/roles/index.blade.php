@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row m-4">
            <div class="col">
                <h2>Roles</h2>
            </div>
            <div class="col"><button data-bs-toggle="modal" data-bs-target="#new" class="btn btn-success">Nuevo
                    Rol</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3>Listado de roles disponibles</h3>
            </div>
        </div>
        <div class="row mt-4 justify-content-center">
            <div class="col-12">
                <table class="table table-striped table-responsive table-hover">
                    <thead>
                        <tr>
                            <th>Area</th>
                            <th>Cargo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $cargo)
                            <tr>
                                <td>
                                    {{ $cargo->area }}
                                </td>
                                <td>
                                    {{ $cargo->cargo }}
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-6">
                                            <form action="{{ url('/roles', $cargo) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input class="btn btn-danger" type="submit" value="Eliminar" />
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Area</th>
                            <th>Cargo</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3>Usuarios con roles asignados</h3>
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
                            <th>Area</th>
                            <th>Cargo</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            @foreach ($item->cargos as $cargo)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->last_name }}</td>
                                    <td>{{ $item->document_number }}</td>
                                    <td>
                                        {{ $cargo->area }}
                                    </td>
                                    <td>
                                        {{ $cargo->cargo }}
                                    </td>
                                    <td>
                                        {{ $cargo->rol == 1 ? 'Jefe' : 'Colaborador' }}
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-6">
                                                <form action="{{ route('roles.borrarcargo') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value="{{ $item->id }}">
                                                    <input type="hidden" name="role_id" value="{{ $cargo->id }}">
                                                    <input class="btn btn-danger" type="submit" value="Eliminar Cargo" />
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Identificacion</th>
                            <th>Area</th>
                            <th>Cargo</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal Agregar -->
    <div class="modal fade" id="new" tabindex="-1" aria-labelledby="NewLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="NewLabel">Nuevo Rol</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formNew" class="basicform" action="{{ route('roles.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="area">Area</label>
                            <input required class="form-control" type="text" name="area" id="area">
                        </div>
                        <div class="form-group">
                            <label for="cargo">Cargo</label>
                            <input required class="form-control" type="text" name="cargo" id="cargo">
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
@endsection
