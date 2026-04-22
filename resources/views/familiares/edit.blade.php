@extends("layouts.template")

@section("content")

    <div class="row justify-content-center">
        <div class="col-md-8"> <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white text-center">
                    <h4 class="mb-0">Editar el familiar</h4>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('familiares.update', $familiar->id_familiar) }}" method="POST">
                        @csrf
                        @method("PUT")

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="id_persona" class="form-label">ID Persona</label>
                                <input type="text" class="form-control @error('id_persona') is-invalid @enderror" 
                                       id="id_persona" name="id_persona" required 
                                       value="{{ $familiar->id_persona }}">
                                @error('id_persona')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control @error('telefono') is-invalid @enderror" 
                                       id="telefono" name="telefono" required 
                                       value="{{ $familiar->telefono }}">
                                @error('telefono')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="dni" class="form-label">DNI</label>
                                <input type="text" class="form-control @error('dni') is-invalid @enderror" 
                                       id="dni" name="dni" required 
                                       value="{{ $familiar->dni }}">
                                @error('dni')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control @error('direccion') is-invalid @enderror" 
                                       id="direccion" name="direccion" required 
                                       value="{{ $familiar->direccion }}">
                                @error('direccion')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="id_parentesco" class="form-label">ID Parentesco</label>
                                <input type="text" class="form-control @error('id_parentesco') is-invalid @enderror" 
                                       id="id_parentesco" name="id_parentesco" required 
                                       value="{{ $familiar->id_parentesco }}">
                                @error('id_parentesco')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="id_ninio" class="form-label">ID Niño</label>
                                <input type="text" class="form-control @error('id_ninio') is-invalid @enderror" 
                                       id="id_ninio" name="id_ninio" required 
                                       value="{{ $familiar->id_ninio }}">
                                @error('id_ninio')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('familiares.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Regresar
                            </a>

                            <button type="submit" class="btn btn-success px-4">
                                <i class="bi bi-save"></i> Guardar Cambios
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection