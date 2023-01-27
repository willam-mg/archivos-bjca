@section('title', __('Usuario '.$model->id))
@section('breadcrumbs', Breadcrumbs::render('users.edit', $model) )
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row justify-center">
                <div class="col-5">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <form action="{{ route('users.update', $model->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" name="name" value="{{$model->name}}" class="form-control @error('name') is-invalid @enderror" placeholder="Nombre" required>
                                    @error('name')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" name="email" value="{{$model->email}}" class="form-control" @error('email') is-invalid @enderror" placeholder="Fecha documento" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label" for="rol">Rol</label>
                                    <select name="rol" id="rol" class="form-control @error('rol') is-invalid @enderror" required>
                                        <option value="{{App\Models\User::ROL_ADMIN}}" @if($model->rol == App\Models\User::ROL_ADMIN) selected="selected" @endif>Adminsitrador</option>
                                        <option value="{{App\Models\User::ROL_JEFE_ACADEMICO}}" @if($model->rol == App\Models\User::ROL_JEFE_ACADEMICO) selected="selected" @endif>Jefe academico</option>
                                        <option value="{{App\Models\User::ROL_CORDINADOR_CARRERA}}" @if($model->rol == App\Models\User::ROL_CORDINADOR_CARRERA) selected="selected" @endif>Cordinador de  carrera</option>
                                        <option value="{{App\Models\User::ROL_DOCENTE}}" @if($model->rol == App\Models\User::ROL_DOCENTE) selected="selected" @endif>Docente</option>
                                    </select>
                                    @error('rol')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>

                                <div class="text-end">
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