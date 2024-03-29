@section('title', __('Tipo Documento '.$model->id))
@section('breadcrumbs', Breadcrumbs::render('tipo-documento.edit', $model) )
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row justify-center">
                <div class="col-5">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <form action="{{ route('tipo-documento.update',$model->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <strong>Nombre:</strong>
                                    <input type="text" name="nombre" value="{{ $model->nombre }}" class="form-control" placeholder="Nombre">
                                </div>
                                <div class="text-end">
                                    <a href="{{url('tipo-documento')}}" class="btn btn-outline-secondary">
                                        <i class="bi bi-x"></i>
                                        Cerrar
                                    </a>
                                    <button type="submit" class="btn btn-outline-warning">
                                        <i class="bi bi-pencil"></i>
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