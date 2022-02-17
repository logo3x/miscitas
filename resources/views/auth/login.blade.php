
@extends('layouts.form')

@section('content')
 <!-- Page content -->
<div class="container mt--8 pb-5">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7">
        <div class="card bg-secondary shadow border-0">
         

         
       
          <div class="card-body px-lg-5 py-lg-5">
            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
             @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            @if($errors->any())
             <div class="alert alert-danger" role="alert">
                <strong>Error!</strong> <strong>{{ $errors->first()}}</strong>
            </div>
            @endif
           
             <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                  </div>
                  <input id="email" type="email" name="email" :value="old('email')" required autofocus class="form-control" placeholder="Email" ">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                  <input id="password" name="password" required autocomplete="current-password" class="form-control" placeholder="Password" type="password">
               
               
                </div>
              </div>
              <div class="custom-control custom-control-alternative custom-checkbox">
                <input name="remember_me" class="custom-control-input" id=" remember_me" type="checkbox">
                <label class="custom-control-label" for=" remember_me">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
              </div>
              <div class="text-center">
                <button type="submin" class="btn btn-primary my-4">Ingresar</button>
              </div>
            </form>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-6">
            <a href="{{ route('password.request') }}" class="text-light"><small>Recordar password?</small></a>
          </div>
          <div class="col-6 text-right">
            <a href="{{ route('register') }}" class="text-light"><small>Registrarme</small></a>
          </div>
        </div>
      </div>
    </div>
  </div>



@endsection  