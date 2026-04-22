@extends("layouts.template")

@section("content")

<div class="row justify-content-center">
    <div class="col-md-10">

        <div class="card shadow-lg border-0">
            <div class="card-header bg-success text-white text-center">
                <h4 class="mb-0">Lista de Cuentas</h4>
            </div>

            <div class="row">
                <div class="col-2">
                    <a class="btn btn-info" href="{{ route('registro_cuentas.create') }}">Agregar</a>
                </div>
            </div>

            <div class="card-body p-4">

                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>No.</th>
                                <th>Número de Cuenta</th>
                                <th>Persona</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($cuentas as $cuenta)
                            <tr>
                                <td class="fw-bold">{{ $loop->index + 1 }}</td>

                                <td>{{ $cuenta->numero_cuenta }}</td>

                                <td>
                                    {{ $cuenta->familiar->persona->nombre }}
                                    {{ $cuenta->familiar->persona->apellido_paterno }}
                                </td>

                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('registro_cuentas.edit', $cuenta) }}"
                                           class="btn btn-outline-primary btn-sm me-2">
                                            Editar
                                        </a>

                                        <form action="{{ route('registro_cuentas.destroy', $cuenta) }}" method="POST">
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