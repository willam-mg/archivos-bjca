<form action="{{ route('users.index') }}" method="GET" class="needs-validation" novalidate>
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
            <div class="mb-3">
                <label for="name">Nombre</label>
                <input type="text" name="name" value="{{$model->name}}" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nombre">
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{$model->email}}" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="email">
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="mb-3 pt-4">
                <button type="submit" class="btn btn-outline-primary"> 
                    <i class="bi bi-search"></i>
                    Buscar
                </button>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-end">
            <div class="mb-3 pt-4">
                <a href="{{url('users/create')}}" class="btn btn-success">
                    <i class="bi bi-plus"></i>
                    Nuevo
                </a>
            </div>
        </div>
    </div>

</form>