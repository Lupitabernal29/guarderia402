@extends("layouts.template")

@section("content")

    <div class="row justify-content-center">
        <div class="col-md-10">

           <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white text-center">
                    <h4 class="mb-0">Lista de Platos</h4>
                </div>
                 <div class="row">
                   <div class="col-1">
                       <a type="button" class="btn btn-info" href="{{route("platos.create")}}">Agregar</a>

                   </div>
               </div>

                <div class="card-body p-4">

                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre de los Platos</th>
                                    <th>Precio</th>
                                    <th>Accion</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach($platos as $plato)
                                <tr>
                                    <td class="fw-bold">{{$loop->index+1}}</td>
                                    <td>{{$plato->nombre}}</td>
                                    <td>{{$plato->precio}}</td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="{{ route('platos.edit', $plato) }}" 
                                            class="btn btn-outline-primary btn-sm me-2" 
                                            title="Editar">
                                                <i class="bi bi-pencil-square"></i> Editar
                                            </a>
                                            
                                            <form action="{{ route('platos.destroy', $plato) }}" method="POST" class="m-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm" >
                                                    <i class="bi bi-trash"></i> Eliminar
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