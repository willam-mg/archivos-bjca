@section('title', __('Usuarios'))
@section('breadcrumbs', Breadcrumbs::render('users') )
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('user.search', $model)
                    <div class="table-responsive">
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
                                    <td> {{$item->nombre_rol}} </td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-outline-secondary" href="{{ route('users.show',$item->id) }}">
                                                <i class="bi bi-eye"></i>
                                            </a> 
                        
                                            <a class="btn btn-outline-secondary" href="{{ route('users.edit',$item->id) }}">
                                                <i class="bi bi-pencil"></i>
                                            </a> 

                                            <form action="{{ route('users.destroy',$item->id) }}" method="POST"
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
                    </div>
                    {{ $datos->onEachSide(5)->links() }}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>