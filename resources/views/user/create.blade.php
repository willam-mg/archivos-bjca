@section('title', __('Nuevo Usuario'))
@section('breadcrumbs', Breadcrumbs::render('users.create') )

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <form action="{{ route('users.store') }}" method="POST" class="needs-validation" novalidate>
                                @csrf
                                @method('POST')
                        
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="name">Nombre</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nombre" required>
                                            @error('name')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" name="email" value="" class="form-control" @error('email') is-invalid @enderror" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="password">Password</label>
                                            <input id="password" class="form-control"
                                                type="password"
                                                name="password"
                                                @error('password') is-invalid @enderror"
                                                required autocomplete="new-password">
                                            @error('name')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                                            <input id="password_confirmation" class="form-control"
                                                type="password"
                                                name="password_confirmation"
                                                @error('password_confirmation') is-invalid @enderror"
                                                required autocomplete="new-password">
                                            @error('password_confirmation')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="rol">Rol</label>
                                            <select name="rol" id="rol" class="form-control" @error('rol') is-invalid @enderror" required>
                                                <option value="{{App\Models\User::ROL_ADMIN}}">Adminsitrador</option>
                                                <option value="{{App\Models\User::ROL_JEFE_ACADEMICO}}">Jefe academico</option>
                                                <option value="{{App\Models\User::ROL_CORDINADOR_CARRERA}}">Cordinador de  carrera</option>
                                                <option value="{{App\Models\User::ROL_DOCENTE}}">Docente</option>
                                            </select>
                                            @error('rol')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-end">
                                        <button type="submit" class="btn btn-outline-success">
                                            <i class="bi bi-plus"></i>
                                            Regsitrar
                                        </button>
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



