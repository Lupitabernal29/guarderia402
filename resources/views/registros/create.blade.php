@extends("layouts.template")

@section("content")

<div class="row justify-content-center">
    <div class="col-md-7">

        <div class="card shadow-lg border-0">
            <div class="card-header bg-success text-white text-center">
                <h4 class="mb-0">Crear una cuenta</h4>
            </div>

            <div class="card-body p-4">

                <form action="{{ url('registro_cuentas') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="numero_cuenta" class="form-label">Número de cuenta</label>
                        <input type="text" 
                               class="form-control @error('numero_cuenta') is-invalid @enderror" 
                               name="numero_cuenta" 
                               placeholder="123456789" 
                               required>
                        
                        @error('numero_cuenta')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="id_familiar" class="form-label">Persona</label>

                        <select name="id_familiar" 
                                class="form-control @error('id_familiar') is-invalid @enderror" 
                                required>

                            <option value="">Seleccione una persona</option>

                            @foreach($familiares as $familiar)
                                <option value="{{ $familiar->id_familiar }}">
                                    {{ $familiar->persona->nombre }}
                                    {{ $familiar->persona->apellido_paterno }}
                                </option>
                            @endforeach

                        </select>

                        @error('id_familiar')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="reset" class="btn btn-outline-secondary">
                            Limpiar
                        </button>

                        <button type="submit" class="btn btn-success px-4">
                            Guardar
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection