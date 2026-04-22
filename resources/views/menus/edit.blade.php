@extends("layouts.template")

@section("content")

    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white text-center">
                    <h4 class="mb-0">Editar el menu {{$menu->id_menu}}</h4>
                </div>

                <div class="card-body p-4">
                    <form action="{{route('menus.update',$menu)}}" method="post">
                        @csrf
                        @method("Put")
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label for="id_plato" class="form-label">No. Platos</label>
                                <input type="text" class="form-control @error('id_plato') is-invalid @enderror" id="id_plato" name="id_plato" placeholder="" required value="{{$menu->id_plato}}">
                                @error('id_plato')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="id_ingrediente" class="form-label">No. Ingredientes</label>
                                <input type="text" class="form-control @error('id_ingrediente') is-invalid @enderror" id="id_ingrediente" name="id_ingrediente" placeholder="" required value="{{$menu->id_ingrediente}}">
                                 @error('id_ingrediente')
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