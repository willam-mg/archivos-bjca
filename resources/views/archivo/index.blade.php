<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Archivos') }}
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
                    <table class="table table-light">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Titulo</th>
                                <th>Fecha hora</th>
                                <th>Departamento</th>
                                <th>Usuario</th>
                                <th>descripcion</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datos as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->titulo}}</td>
                                <td>{{$item->fecha_hora}}</td>
                                <td>{{$item->departamento_id}}</td>
                                <td>{{$item->user_id}}</td>
                                <td>{{$item->descripcion}}</td>
                                <td>
                                    <form action="{{ route('archivos.destroy',$item->id) }}" method="POST">

                                        <a class="btn btn-info" href="{{ route('archivos.show',$item->id) }}">Ver</a>

                                        <a class="btn btn-primary" href="{{ route('archivos.edit',$item->id) }}">Editar</a>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">Eliminar</button>
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