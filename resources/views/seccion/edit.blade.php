<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Seccion '.$model->id) }}
                </h2>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-end">
                <a href="{{url('secciones/create')}}" class="btn btn-success">Nuevo</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row justify-center">
                <div class="col-5">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <form action="{{ route('secciones.update',$model->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <strong>Nombre:</strong>
                                    <input type="text" name="nombre" value="{{ $model->nombre }}" class="form-control" placeholder="Nombre">
                                </div>
                                <div class="text-end">
                                    <a href="{{url('secciones')}}" class="btn btn-outline-secondary">
                                        <i class="bi bi-x"></i>
                                        Cerrar
                                    </a>
                                    <button type="submit" class="btn btn-outline-warning">
                                        <i class="bi bi-plus"></i>
                                        Modificar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>