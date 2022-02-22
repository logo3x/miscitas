@extends('layouts.panel')

@section('content')

    <div class="card shadow">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Editar Paciente</h3>
          </div>
          <div class="col text-right">
            <a href="{{ url('patients')}}" class="btn btn-sm btn-default">Cancelar y Volver</a>
          </div>
        </div>
      </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>           
            @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ url('patients/'.$patient->id) }}" method="POST" >
            @csrf
            @method ('PUT')
            <div class="form-group">
                <label for="name">Nombre del medico</label>
                <input id="name" class="form-control" type="text" name="name" value="{{ old ('name', $patient->name) }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" class="form-control" type="text" name="email" value="{{ old ('email', $patient->email) }}" >
            </div>
            <div class="form-group">
                <label for="dni">DNI</label>
                <input id="dni" class="form-control" type="text" name="dni" value="{{ old ('dni', $patient->dni) }}" >
            </div>
            <div class="form-group">
                <label for="address">Direccion</label>
                <input id="address" class="form-control" type="text" name="address" value="{{ old ('address', $patient->address) }}" >
            </div>
            <div class="form-group">
                <label for="phone">Telefono</label>
                <input id="phone" class="form-control" type="text" name="phone" value="{{ old ('phone',$patient->phone) }}" >
            </div>
            <div class="form-group">
              <label for="password">Contraseña </label>
              <input id="password" class="form-control" type="text" name="password" value="" >
              <em>Ingrese un valor si desea modificar la contraseña</em>
          </div>
            <button type="submit" class="btn btn-primary">
                Guardar
            </button>
        </form>
    </div>
    </div>


@endsection