<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Usuario '.$model->id) }}
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
                                        <th>Nombre</th>
                                        <td>{{$model->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{$model->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Rol</th>
                                        <td> {{$model->rol}} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                        
            </div>
        </div>
    </div>
</x-app-layout>