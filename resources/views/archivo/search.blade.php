<form action="{{ route('archivos.index') }}" method="GET" class="needs-validation" novalidate>
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
            <label for="fondo">fondo</label>
            <input type="text" name="fondo" value="{{$model->fondo}}" id="fondo" class="form-control @error('fondo') is-invalid @enderror" placeholder="fondo">
        </div>
        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
            <label for="seccion_id">seccion_id</label>
            <select name="seccion_id" class="form-control @error('seccion_id') is-invalid @enderror" required>
                @foreach ($secciones as $item)
                <option value="">Selecciona seccion</option>
                <option value="{{$item->id}}">{{$item->nombre}}</option>
                @endforeach
            </select>
            @error('seccion_id')
            <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
            <!-- <input type="text" name="seccion_id" value="{{$model->seccion_id}}" id="seccion_id" class="form-control @error('seccion_id') is-invalid @enderror" placeholder="seccion_id"> -->
        </div>
        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
            <label for="serie">serie</label>
            <input type="text" name="serie" value="{{$model->serie}}" id="serie" class="form-control @error('serie') is-invalid @enderror" placeholder="serie">
        </div>
        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
            <label for="autor">autor</label>
            <input type="text" name="autor" value="{{$model->autor}}" id="autor" class="form-control @error('autor') is-invalid @enderror" placeholder="autor">
        </div>
        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
            <label for="descripcion">descripcion</label>
            <input type="text" name="descripcion" value="{{$model->descripcion}}" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" placeholder="descripcion">
        </div>
        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
            <label for="fecha_inicio">fecha_inicio</label>
            <input type="text" name="fecha_inicio" value="{{$model->fecha_inicio}}" id="fecha_inicio" class="form-control @error('fecha_inicio') is-invalid @enderror" placeholder="fecha_inicio">
        </div>
        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
            <label for="fecha_finalizacion">fecha_finalizacion</label>
            <input type="text" name="fecha_finalizacion" value="{{$model->fecha_finalizacion}}" id="fecha_finalizacion" class="form-control @error('fecha_finalizacion') is-invalid @enderror" placeholder="fecha_finalizacion">
        </div>
        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
            <label for="folio">folio</label>
            <input type="text" name="folio" value="{{$model->folio}}" id="folio" class="form-control @error('folio') is-invalid @enderror" placeholder="folio">
        </div>
        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
            <label for="volumen">volumen</label>
            <input type="text" name="volumen" value="{{$model->volumen}}" id="volumen" class="form-control @error('volumen') is-invalid @enderror" placeholder="volumen">
        </div>
        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
            <label for="ubicacion">ubicacion</label>
            <input type="text" name="ubicacion" value="{{$model->ubicacion}}" id="ubicacion" class="form-control @error('ubicacion') is-invalid @enderror" placeholder="ubicacion">
        </div>
        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
            <label for="user_id">user_id</label>
            <input type="text" name="user_id" value="{{$model->user_id}}" id="user_id" class="form-control @error('user_id') is-invalid @enderror" placeholder="user_id">
        </div>
        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
            <label for="fecha_hora">fecha_hora</label>
            <input type="text" name="fecha_hora" value="{{$model->fecha_hora}}" id="fecha_hora" class="form-control @error('fecha_hora') is-invalid @enderror" placeholder="fecha_hora">
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