<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Usuarios') }}
                </h2>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-end">
                <a href="{{url('users/create')}}" class="btn btn-success">Nuevo</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="table-responsive">
                        @include('user.search', $model)
                        <table class="table table-light">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datos as $key => $item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td> rol </td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('users.show',$item->id) }}">Ver</a>
                                        
                                        <a class="btn btn-primary" href="{{ route('users.edit',$item->id) }}">Editar</a>
                                        
                                        <form action="{{ route('users.destroy',$item->id) }}" method="POST" data-confirm="Esta seguro de eliminar este elemnto">
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