@section('title', __('Secciones'))
@section('breadcrumbs', Breadcrumbs::render('secciones') )
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> --}}
            <div class="bg-white overflow-hidden">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row mb-3 justify-center">
                        <div class="col-12 text-end">
                            <a href="{{url('secciones/create')}}" class="btn btn-success">
                                <i class="bi bi-plus"></i>
                                Nueva seccion
                            </a>
                        </div>
                    </div>
                    <table class="table table-light">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datos as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->nombre}}</td>
                                <td>
                                    <form action="{{ route('secciones.destroy',$item->id) }}" method="POST">

                                        <a class="btn btn-outline-secondary" href="{{ route('secciones.show',$item->id) }}">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <a class="btn btn-outline-secondary" href="{{ route('secciones.edit',$item->id) }}">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-outline-secondary">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
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