<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Nuevo archivo') }}
                </h2>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-end">
                
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                                    <x-label for="password" :value="__('Password')" />

                                    <x-input id="password" class="block mt-1 w-full"
                                                    type="password"
                                                    name="password"
                                                    required autocomplete="new-password" />
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <x-label for="password_confirmation" :value="__('Confirm Password')" />

                                    <x-input id="password_confirmation" class="block mt-1 w-full"
                                                    type="password"
                                                    name="password_confirmation" required />
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-3">
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
                                <button type="submit" class="btn btn-success">Regsitrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



