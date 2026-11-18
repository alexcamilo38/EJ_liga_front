@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">

        <div class="card shadow-lg border-0 rounded-5">

            <div class="card-header text-white" style="background-color: #39A900;">
                <h3 class="mb-0">Actualizar deportistas</h3>
            </div>

            <div class="card-body">

                <form action="{{ route('deportistas.update', $deportistas['id']) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">
                            Nombre del deportistas
                        </label>

                        <input type="text" class="form-control" id="nombre" name="nombre"
                            value="{{ old('nombre', $deportistas['nombre']) }}" placeholder="Ingrese el nombre del deportistas">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">
                            Apellido del alumno
                        </label>

                        <input type="text" class="form-control" id="apellido" name="apellido"
                            value="{{ old('apellido', $deportistas['apellido']) }}"
                            placeholder="Ingrese el apellido del profesor">
                    </div>

                    <div class="mb-3">
                        <label for="fecha_nacimiento" class="form-label fw-bold">
                            Fecha de Nacimiento
                        </label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
                            value="{{ old('fecha_nacimiento', $deportistas['fecha_nacimiento']) }}">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">
                            Expediente
                        </label>

                        <input type="text" class="form-control" id="expediente" name="expediente"
                            value="{{ old('expediente', $deportistas['expediente']) }}"
                            placeholder="Ingrese el expediente del alumno">
                    </div>

                    <div class="mb-4">
                                <label for="disciplina_id" class="form-label text-muted small fw-bold text-uppercase tracking-wider">disciplina asociado</label>
                                <select name="disciplina_id" id="disciplina_id" class="form-select form-select-lg bg-light border-0 rounded-3 text-dark fw-medium" required>
                                    @foreach($disciplinas as $disciplina)
                                    <option value="{{ $disciplina['id'] }}" {{ old('disciplina_id', $deportistas['disciplina_id']) == $deportistas['id'] ? 'selected' : '' }}>
                                        {{ $disciplina['nombre'] }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">
                            Volver
                        </a>

                        <button type="submit" class="btn text-white" style="background-color: #143084;">
                            Actualizar deportistas
                        </button>
                    </div>

                </form>

            </div>

        </div>

    </div>
@endsection
