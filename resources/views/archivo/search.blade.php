<form action="{{ route('archivos.index') }}" method="GET" class="needs-validation" novalidate>
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
            <div class="mb-3">
                <label for="titulo">Tiulo</label>
                <input type="text" name="titulo" value="{{$model->titulo}}" id="titulo" class="form-control @error('titulo') is-invalid @enderror" placeholder="Titulo">
            </div>
        </div>
        {{-- <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
            <div class="mb-3">
                <label for="titulo">Descripcion</label>
                <input type="text" name="descripcion" value="{{$model->descripcion}}" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" placeholder="Descripcion">
            </div>
        </div> --}}
        <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
            <div class="mb-3">
                <label for="titulo">Fecha documento</label>
                <input type="date" name="fecha_documento" value="{{$model->fecha_documento}}" id="fecha_documento" class="form-control @error('fecha_documento') is-invalid @enderror" placeholder="fecha_documento">
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
            <div class="mb-3">
                <label for="titulo">Resolucion ministerial</label>
                <input type="text" name="resolucion_ministerial" value="{{$model->resolucion_ministerial}}" id="resolucion_ministerial" class="form-control @error('resolucion_ministerial') is-invalid @enderror" placeholder="Resolucion ministerial">
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
            <div class="mb-3 pt-4">
                <button type="submit" class="btn btn-outline-primary"> 
                    <i class="bi bi-search"></i>
                    Buscar
                </button>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-end">
            <div class="mb-3 pt-4">
                <a href="{{url('archivos/create')}}" class="btn btn-success">
                    <i class="bi bi-plus"></i>
                    Nuevo
                </a>
            </div>
        </div>
    </div>

</form>