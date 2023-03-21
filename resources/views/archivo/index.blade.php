@section('title', __('Archivos'))
@section('breadcrumbs', Breadcrumbs::render('archivos') )
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="table-responsive">
                        @include('archivo.search', $model)
                        <table class="table table-light">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>fondo</th>
                                    <th>seccion_id</th>
                                    <th>serie</th>
                                    <th>autor</th>
                                    <th>descripcion</th>
                                    <th>fecha_inicio</th>
                                    <th>fecha_finalizacion</th>
                                    <th>folio</th>
                                    <th>volumen</th>
                                    <th>ubicacion</th>
                                    <th>user_id</th>
                                    <th>fecha_hora</th>
                                    <th>tipo_documento_id</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datos as $key => $item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->fondo}}</td>
                                    <td>{{$item->seccion_id}}</td>
                                    <td>{{$item->serie}}</td>
                                    <td>{{$item->autor}}</td>
                                    <td>{{$item->descripcion}}</td>
                                    <td>{{$item->fecha_inicio}}</td>
                                    <td>{{$item->fecha_finalizacion}}</td>
                                    <td>{{$item->folio}}</td>
                                    <td>{{$item->volumen}}</td>
                                    <td>{{$item->ubicacion}}</td>
                                    <td>{{$item->user_id}}</td>
                                    <td>{{$item->fecha_hora}}</td>
                                    <td>{{$item->tipo_documento_id}}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('archivos.show',$item->id) }}">Ver</a>
                                        <a class="btn btn-primary" href="{{ route('archivos.edit',$item->id) }}">Editar</a>
                                        <form action="{{ route('archivos.destroy',$item->id) }}" method="POST" data-confirm="Esta seguro de eliminar este elemnto">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger delete">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $datos->onEachSide(5)->links() }}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>