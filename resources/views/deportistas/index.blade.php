@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold text-dark"> Lista de deportistas</h1>
            <a href="{{ route('deportistas.create') }}" class="btn btn-success shadow-sm">
                <i class="bi bi-plus-circle"></i> Nuevo deportistas
            </a>
        </div>

        <div class="card shadow-lg border-0 rounded-4">

            <div class="card-header text-white encabezado-tabla" style="background-color: #25c72f;">
                <h5 class="mb-0">deportistas Registrados</h5>
            </div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                @endif

                <table id="idalumno" class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>apellido</th>
                            <th>fecha_nacimiento</th>
                            <th>expediente</th>
                            <th>disciplina_id</th>
                            <th>Imagen</th>
                            <th class="text-center">Acciones</th>

                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($deportistas as $deportista)
                            <tr>

                                <td>{{ $deportista['id'] }}</td>

                                <td class="fw-semibold">
                                    {{ $deportista['nombre'] }}
                                </td>
                                <td class="fw-semibold">
                                    {{ $deportista['apellido'] }}
                                </td>
                                <td class="fw-semibold">
                                    {{ $deportista['fecha_nacimiento'] }}
                                </td>
                                <td class="fw-semibold">
                                    {{ $deportista['expediente'] }}
                                </td>
                                <td>{{ $deportista['disciplina_id'] ?? 'N/A' }}</td>
                                <td>
                                    <img src="{{ $deportista['imagen_url'] }}" alt="{{ $deportista['nombre'] }}" width="100">
                                </td>

                                <td class="text-center">

                                    <a href="{{ route('deportistas.show', $deportista['id']) }}" class="btn btn-info btn-sm me-1">
                                        Mostrar
                                    </a>
                                    <a href="{{ route('deportistas.edit', $deportista['id']) }}" class="btn btn-warning btn-sm me-1">
                                        Editar
                                    </a>

                                    <form action="{{ route('deportistas.destroy', $deportista['id']) }}" method="POST" class="d-inline">

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
