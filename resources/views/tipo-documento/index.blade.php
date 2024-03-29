@section('title', __('Tipos de documento'))
@section('breadcrumbs', Breadcrumbs::render('tipo-documento') )
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row mb-3">
                        <div class="col-12 text-end">
                            <a href="{{url('tipo-documento/create')}}" class="btn btn-success">
                                <i class="bi bi-plus"></i>
                                Nuevo
                            </a>
                        </div>
                    </div>
                    <table class="table table-light">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datos as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->nombre}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a class="btn btn-outline-secondary" href="{{ route('tipo-documento.show',$item->id) }}">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    
                                        <a class="btn btn-outline-secondary" href="{{ route('tipo-documento.edit',$item->id) }}">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    
                                        <form action="{{ route('tipo-documento.destroy',$item->id) }}" method="POST"
                                            data-confirm="Esta seguro de eliminar este elemnto">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-secondary">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $datos->onEachSide(5)->links() }}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>