<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Archivo '.$model->id) }}
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
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <table class="table table-light">
                                <tbody>
                                    <tr>
                                        <th>Titulo</th>
                                        <td>{{$model->titulo}}</td>
                                    </tr>
                                    <tr>
                                        <th>Seccion</th>
                                        <td>{{$model->seccion->nombre}}</td>
                                    </tr>
                                    <tr>
                                        <th>Descripcion</th>
                                        <td>{{$model->descripcion}}</td>
                                    </tr>
                                    <tr>
                                        <th>Fecha</th>
                                        <td>{{$model->fecha_hora}}</td>
                                    </tr>
                                    <tr>
                                        <th>Usuario</th>
                                        <td>{{$model->user->name}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            {!! QrCode::size(300)->generate( url('/archivos', $model->id) ) !!}
                        </div>
                    </div>
                    
                    @foreach ($model->paginas as $key => $pagina)
                        <h4>Pagina {{$pagina->numero}}</h4>
                        <small> {{$pagina->descripcion}} </small>
                        <object data="{{Url('uploads/'.$pagina->imagen)}}" type="application/pdf" style="width:100%; height: 150vh">
                            <a href="{{Url('uploads/'.$pagina->imagen)}}" target="_blank">Ver Pagina {{$pagina->numero}}</a>
                        </object>
                    @endforeach
                        
            </div>
        </div>
    </div>
</x-app-layout>