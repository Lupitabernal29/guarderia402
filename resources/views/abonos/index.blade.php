@extends("layouts.template")

@section("content")

<div class="row justify-content-center">
    <div class="col-md-10">

        <div class="card shadow-lg border-0">
            <div class="card-header bg-success text-white text-center">
                <h4 class="mb-0">Lista de Abonos</h4>
            </div>

            <div class="row">
                <div class="col-2">
                    <a class="btn btn-info" href="{{ route('abonos.create') }}">Agregar</a>
                </div>
            </div>

            <div class="card-body p-4">

                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Cantidad</th>
                                <th>Niño</th>
                                <th>Persona</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($abonos as $abono)
                        <tr>
                            <td>{{ $abono->id_abono }}</td>

                            <td>
                                <span class="badge bg-info text-dark">
                                    {{ $abono->fecha_abono }}
                                </span>
                            </td>

                            <td>{{ $abono->cantidad_abono }}</td>

                            {{-- NIÑO --}}
                            <td>
                                {{ $abono->registroCuenta->familiar->ninio->persona->nombre ?? 'Sin nombre' }} 
                                {{ $abono->registroCuenta->familiar->ninio->persona->apellido_paterno ?? '' }}
                            </td>

                            {{-- COLUMNA PERSONA (Encargado) --}}
                            <td>
                                {{ $abono->registroCuenta->familiar->persona->nombre ?? 'N/A' }} 
                                {{ $abono->registroCuenta->familiar->persona->apellido_paterno ?? '' }}
                            </td>

                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('abonos.edit', $abono) }}"
                                    class="btn btn-outline-primary btn-sm me-2">
                                        Editar
                                    </a>

                                    <form action="{{ route('abonos.destroy', $abono) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger btn-sm">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection