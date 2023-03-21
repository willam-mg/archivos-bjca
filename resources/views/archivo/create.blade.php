@section('title', __('Archivos'))
@section('breadcrumbs', Breadcrumbs::render('archivos.create') )
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{ route('archivos.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        @method('POST')

                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="fondo">fondo</label>
                                    <input type="text" name="fondo" class="form-control @error('fondo') is-invalid @enderror" placeholder="fondo" required>
                                    @error('fondo')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="seccion">Seccion</label>
                                    <select name="seccion_id" class="form-control @error('seccion_id') is-invalid @enderror" required>
                                        @foreach ($secciones as $item)
                                        <option value="">Selecciona seccion</option>
                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                        @endforeach
                                    </select>
                                    @error('seccion_id')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="serie">serie</label>
                                    <input type="text" name="serie" class="form-control @error('serie') is-invalid @enderror" placeholder="serie" required>
                                    @error('serie')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="autor">autor</label>
                                    <input type="text" name="autor" class="form-control @error('autor') is-invalid @enderror" placeholder="autor" required>
                                    @error('autor')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="descripcion">descripcion</label>
                                    <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" placeholder="descripcion" required>
                                    @error('descripcion')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="fecha_inicio">fecha_inicio</label>
                                    <input type="date" name="fecha_inicio" value="{{date('Y-m-d')}}" class="form-control @error('fecha_inicio') is-invalid @enderror" placeholder="Fecha inicio">
                                    @error('fecha_inicio')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="fecha_finalizacion">fecha_finalizacion</label>
                                    <input type="date" name="fecha_finalizacion" value="{{date('Y-m-d')}}" class="form-control @error('fecha_finalizacion') is-invalid @enderror" placeholder="fecha_finalizacion" required>
                                    @error('fecha_finalizacion')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="folio">folio</label>
                                    <input type="text" name="folio" class="form-control @error('folio') is-invalid @enderror" placeholder="folio" required>
                                    @error('folio')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="volumen">volumen</label>
                                    <input type="text" name="volumen" class="form-control @error('volumen') is-invalid @enderror" placeholder="volumen" required>
                                    @error('volumen')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="ubicacion">ubicacion</label>
                                    <input type="text" name="ubicacion" class="form-control @error('ubicacion') is-invalid @enderror" placeholder="ubicacion" required>
                                    @error('ubicacion')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="tipo_documento_id">Tipo documento</label>
                                    <select name="tipo_documento_id" class="form-control @error('tipo_documento_id') is-invalid @enderror" required>
                                        <option value="">Seleccionar un tipo</option>
                                        @foreach ($tipoDocumentos as $item)
                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                        @endforeach
                                    </select>
                                    @error('tipo_documento_id')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="imagen">Primer archivo</label>
                                    <input class="form-control" type="file" name="imagen" accept="application/pdf" required>
                                </div>
                            </div>











                            <!-- <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="fecha_documento">Fecha documento</label>
                                    <input type="date" name="fecha_documento" value="{{date('Y-m-d')}}" class="form-control" placeholder="Fecha documento">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="resolucion_ministerial">Resolucion ministerial</label>
                                    <input type="text" name="resolucion_ministerial" class="form-control" placeholder="Resolucion ministerial">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <strong>CIFE:</strong>
                                    <label class="form-label" for="cife">CIFE</label>
                                    <input type="text" name="cife" class="form-control" placeholder="CIFE">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="fecha_emision">Fecha emision</label>
                                    <input type="date" name="fecha_emision" value="{{date('Y-m-d')}}" class="form-control" placeholder="Fecha emision">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="ano">Año</label>
                                    <input type="number" name="ano" value="{{date('Y')}}" class="form-control" placeholder="Año">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="seccion">Seccion</label>
                                    <select name="departamento_id" class="form-control @error('departamento_id') is-invalid @enderror" required>
                                        @foreach ($secciones as $item)
                                        <option value="">Selecciona seccion</option>
                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                        @endforeach
                                    </select>
                                    @error('departamento_id')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="tipo_documento_id">Tipo documento</label>
                                    <select name="tipo_documento_id" class="form-control @error('tipo_documento_id') is-invalid @enderror" required>
                                        <option value="">Seleccionar un tipo</option>
                                        @foreach ($tipoDocumentos as $item)
                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                        @endforeach
                                    </select>
                                    @error('tipo_documento_id')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="descripcion">Descripcion</label>
                                    <textarea name="descripcion" class="form-control" cols="5" rows="1" placeholder="Descripcion"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="imagen">Primer archivo</label>
                                    <input class="form-control" type="file" name="imagen" accept="application/pdf" required>
                                </div>
                            </div> -->
                            <div class="col-xs-12 col-sm-12 col-md-12 text-end">
                                <button type="submit" class="btn btn-outline-success">
                                    <i class="bi bi-plus"></i>
                                    Regsitrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>