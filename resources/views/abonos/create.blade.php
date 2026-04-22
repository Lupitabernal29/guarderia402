@extends("layouts.template")

@section("content")

    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white text-center">
                    <h4 class="mb-0">Registrar un abono</h4>
                </div>

                <div class="card-body p-4">

                    <form action="{{ url('abonos') }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label for="fecha_abono" class="form-label">Fecha de abono</label>
                            <input type="date"
                                class="form-control @error('fecha_abono') is-invalid @enderror"
                                name="fecha_abono"
                                required>

                            @error('fecha_abono')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="cantidad_abono" class="form-label">Cantidad</label>
                            <input type="text"
                                class="form-control @error('cantidad_abono') is-invalid @enderror"
                                name="cantidad_abono"
                                placeholder="$100.00"
                                required>

                            @error('cantidad_abono')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="id_registrocuenta" class="form-label">Persona (quien paga)</label>

                            <select name="id_registrocuenta"
                                    class="form-control @error('id_registrocuenta') is-invalid @enderror"
                                    required>

                                <option value="">Seleccione una persona</option>

                                @foreach($cuentas as $cuenta)
                                    <option value="{{ $cuenta->id_registrocuenta }}">
                                        {{ $cuenta->familiar->persona->nombre }}
                                        {{ $cuenta->familiar->persona->apellido_paterno }}
                                    </option>
                                @endforeach

                            </select>

                            @error('id_registrocuenta')
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