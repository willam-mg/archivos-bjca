@section('title', __('Seccion '.$model->id ))
@section('breadcrumbs', Breadcrumbs::render('secciones.show', $model) )
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row justify-center">
                <div class="col-5">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <table class="table table-light">
                                <tbody>
                                    <tr>
                                        <th>Nombre</th>
                                        <td>{{$model->nombre}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="text-end">
                                <a href="{{url('secciones')}}" class="btn btn-outline-secondary">
                                    <i class="bi bi-x"></i>
                                    Cerrar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>