@extends("layouts.template")

@section("content")

    <div class="row justify-content-center">
        <div class="col-md-10">

           <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white text-center">
                    <h4 class="mb-0">Lista de Ninios</h4>
                </div>
                
                <div class="card-body p-4">
                    <div class="mb-3">
                        <a class="btn btn-info" href="{{route('ninios.create')}}">
                           <i class="bi bi-plus-circle"></i> Agregar
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Matricula</th>
                                    <th>No. Persona</th>
                                    <th>No. Centro</th>
                                    <th>Fecha Ingreso</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach($ninios as $ninio)
                                <tr>
                                    <td class="fw-bold">{{$loop->iteration}}</td>
                                    <td>{{$ninio->matricula}}</td>
                                    <td>{{$ninio->id_persona}}</td>
                                    <td>{{$ninio->id_centro}}</td>
                                    <td>
                                        <span class="badge bg-info text-dark">
                                            {{$ninio->fecha_ingreso}}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="{{ route('ninios.edit', $ninio) }}" 
                                               class="btn btn-outline-primary btn-sm me-2" 
                                               title="Editar">
                                                <i class="bi bi-pencil-square"></i> Editar
                                            </a>
                                            
                                            <form action="{{ route('ninios.destroy', $ninio) }}" method="POST" class="m-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('¿Eliminar?')">
                                                    <i class="bi bi-trash"></i> Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td> </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection