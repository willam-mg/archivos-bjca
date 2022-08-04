<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Usuario '.$model->id) }}
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
                    <form action="{{ route('users.update', $model->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')
                
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" name="name" value="{{$model->name}}" class="form-control @error('name') is-invalid @enderror" placeholder="Nombre" required>
                                    @error('name')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" name="email" value="{{$model->email}}" class="form-control" @error('email') is-invalid @enderror" placeholder="Fecha documento" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-end">
                                <button type="submit" class="btn btn-warning">Modificar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>