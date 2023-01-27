<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Archivo '.$model->id) }}
                </h2>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-end">
                <a href="{{url('archivos/create')}}" class="btn btn-success">Nuevo</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('archivos.update', $model->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')
                
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="titulo">Titulo</label>
                                    <input type="text" name="titulo" value="{{$model->titulo}}" class="form-control @error('titulo') is-invalid @enderror" placeholder="Nombre" required>
                                    @error('titulo')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="fecha_documento">Fecha documento</label>
                                    <input type="date" name="fecha_documento" value="{{$model->fecha_documento}}" class="form-control" placeholder="Fecha documento">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="resolucion_ministerial">Resolucion ministerial</label>
                                    <input type="text" name="resolucion_ministerial" value="{{$model->resolucion_ministerial}}" class="form-control" placeholder="Resolucion ministerial">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <strong>CIFE:</strong>
                                    <label class="form-label" for="cife">CIFE</label>
                                    <input type="text" name="cife" value="{{$model->cife}}" class="form-control" placeholder="CIFE">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="fecha_emision">Fecha emision</label>
                                    <input type="date" name="fecha_emision" value="{{$model->fecha_emision}}" class="form-control" placeholder="Fecha emision">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="ano">Año</label>
                                    <input type="number" name="ano" value="{{$model->ano}}" class="form-control" placeholder="Año">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="seccion">Seccion</label>
                                    <select name="departamento_id"class="form-control @error('departamento_id') is-invalid @enderror" required>
                                        <option value="">Selecciona seccion</option>
                                        @foreach ($secciones as $item)
                                            @if ($model->departamento_id == $item->id)
                                                <option value="{{$item->id}}" selected="selected">{{$item->nombre}}</option>
                                            @else
                                                <option value="{{$item->id}}">{{$item->nombre}}</option>
                                            @endif
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
                                            @if ($model->tipo_documento_id == $item->id)
                                                <option value="{{$item->id}}" selected="selected">{{$item->nombre}}</option>
                                            @else
                                                <option value="{{$item->id}}">{{$item->nombre}}</option>
                                            @endif
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
                                    <textarea name="descripcion" value="{{$model->descripcion}}" class="form-control" cols="5" rows="1" placeholder="Descripcion"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-end">
                                <button type="submit" class="btn btn-warning">Modificar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>