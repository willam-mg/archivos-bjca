<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Nuevo ') }}
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
                    <form action="{{ route('archivos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Titulo:</strong>
                                    <input type="text" name="titulo" value="" class="form-control" placeholder="Nombre">
                                </div>
                                <div class="form-group">
                                    <strong>Departamento:</strong>
                                    <select name="departamentos_id" id="">
                                        @foreach ($departamentos as $dep)
                                            <option value="{{$dep->id}}">{{$dep->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <strong>Descripcion:</strong>
                                    <textarea name="descripcion" class="form-control" cols="5" rows="3" placeholder="Descripcion"></textarea>
                                </div>
                                <div class="form-group">
                                    <strong>Imagen:</strong>
                                    <input type="file" name="imagen">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-success">Regsitrar</button>
                            </div>
                        </div>
                
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>