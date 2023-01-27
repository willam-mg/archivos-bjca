@section('title', __('Seccion ' ))
@section('breadcrumbs', Breadcrumbs::render('secciones.create') )
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row justify-center">
                <div class="col-5">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <form action="{{ route('secciones.store') }}" method="POST">
                                @csrf
                                @method('POST')
                        
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group mb-3">
                                            <strong>Nombre:</strong>
                                            <input type="text" name="nombre" value="" class="form-control" placeholder="Nombre">
                                        </div>
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-outline-success">
                                                <i class="bi bi-plus"></i>
                                                Regsitrar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                        
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>