@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold text-dark"> Lista de Entrenadores</h1>
            <a href="{{ route('entrenadors.create') }}" class="btn btn-success shadow-sm">
                <i class="bi bi-plus-circle"></i> Nuevo Entrenador
            </a>
        </div>

        <div class="card shadow-lg border-0 rounded-4">

            <div class="card-header text-white encabezado-tabla" style="background-color: #25c72f;">
                <h5 class="mb-0">entrenador Registrado</h5>
            </div>

            <div class="card-body">

                <table id="identrenador" class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>apellido</th>
                            <th>telefono</th>
                            <th>cedula</th>
                            <th>imagen</th>
                            <th class="text-center">Acciones</th>

                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($entrenadors as $entrenador)
                            <tr>

                                <td>{{ $entrenador['id'] }}</td>

                                <td class="fw-semibold">
                                    {{ $entrenador['nombre'] }}
                                </td>
                                <td class="fw-semibold">
                                    {{ $entrenador['apellido'] }}
                                </td>
                                <td class="fw-semibold">
                                    {{ $entrenador['telefono'] }}
                                </td>
                                <td class="fw-semibold">
                                    {{ $entrenador['cedula'] }}
                                </td>

                                 <td>
                                    <img src="{{ $entrenador['imagen_url'] }}" alt="{{ $entrenador['nombre'] }}" width="100">
                                </td>

                                <td class="text-center">

                                    <a href="{{ route('entrenadors.show', $entrenador['id']) }}" class="btn btn-info btn-sm me-1">
                                        Mostrar
                                    </a>
                                    <a href="{{ route('entrenadors.edit', $entrenador['id']) }}" class="btn btn-warning btn-sm me-1">
                                        Editar
                                    </a>

                                    <form action="{{ route('entrenadors.destroy', $entrenador['id']) }}" method="POST" class="d-inline">

                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Eliminar
                                        </button>

                                    </form>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>
@endsection