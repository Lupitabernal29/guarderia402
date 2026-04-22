@extends("layouts.template")

@section("content")

    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white text-center">
                    <h4 class="mb-0">Editar cuenta</h4>
                </div>

                <div class="card-body p-4">

                    <form action="{{ route('registro_cuentas.update', $registro_cuenta) }}" method="post">
                        @csrf
                        @method("PUT")

                        <div class="mb-3">
                            <label class="form-label">Número de cuenta</label>
                            <input type="text"
                                name="numero_cuenta"
                                class="form-control @error('numero_cuenta') is-invalid @enderror"
                                value="{{ $registro_cuenta->numero_cuenta }}"
                                required>

                            @error('numero_cuenta')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Persona</label>

                            <select name="id_familiar"
                                    class="form-control @error('id_familiar') is-invalid @enderror"
                                    required>

                                @foreach($familiares as $familiar)
                                    <option value="{{ $familiar->id_familiar }}"
                                        {{ $registro_cuenta->id_familiar == $familiar->id_familiar ? 'selected' : '' }}>
                                        
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
                                Editar
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

@endsection