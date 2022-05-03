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
                    <table class="table table-light">
                        <tbody>
                            <tr>
                                <th>Titulo</th>
                                <td>{{$model->titulo}}</td>
                            </tr>
                            <tr>
                                <th>Departamento</th>
                                <td>{{$model->departamento->nombre}}</td>
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

                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach ($model->paginas as $key => $pagina)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{$key}}" class="{{!$key?'active':''}}"></li>
                            @endforeach
                            {{-- <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> --}}
                        </ol>
                        <div class="carousel-inner">
                            @foreach ($model->paginas as $key => $pagina)
                                <div class="carousel-item {{!$key?'active':''}}">
                                    <img class="d-block w-100" src="{{Url('uploads/'.$pagina->imagen)}}" alt="First slide">
                                </div>
                            @endforeach

                            {{-- <div class="carousel-item">
                                <img class="d-block w-100" src="..." alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="..." alt="Third slide">
                            </div> --}}
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>