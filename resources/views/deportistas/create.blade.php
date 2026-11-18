@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow border-0 rounded-4">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">Registrar deportistas</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('deportistas.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label fw-bold">
                                    Nombre
                                </label>
                                <input type="text" name="nombre" class="form-control"
                                    placeholder="Ingrese el nombre de deportistas">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">
                                    Apellido
                                </label>
                                <input type="text" name="apellido" class="form-control"
                                    placeholder="Ingrese el Apellido del deportistas">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">
                                    fecha de nacimiento
                                </label>
                                <input type="date" name="fecha_nacimiento" class="form-control"
                                    placeholder="Ingrese la fecha nacimiento del deportistas">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">
                                    expediente
                                </label>
                                <input type="text" name="expediente" class="form-control"
                                    placeholder="Ingrese el expediente del deportistas">
                            </div>


                            <div class="form-floating mb-4">
                                <select name="disciplina_id" id="deportistas_disciplina_id" class="form-select" required>
                                    <option value="" selected disabled>Seleccione una disciplina...</option>
                                    @foreach ($disciplinas as $disciplina)
                                        <option value="{{ $disciplina['id'] }}">{{ $disciplina['nombre'] }}</option>
                                    @endforeach
                                </select>
                                <label for="deportistas_disciplina_id" class="text-secondary">deportistas Asociado</label>
                            </div>

                            <label class="form-label">Imagen</label>
                            <input type="file" name="imagen" class="form-control" accept="image/*">

                            <button type="submit" class="btn btn-success">
                                Enviar Formulario
                            </button>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
