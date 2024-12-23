@extends('layouts.app')

@section('content')

<div class="card mb-0  auth-login m-auto w-30"style="background-color:#E6F7FF" >
    <div class="row gx-0">
      <!-- ------------------------------------------------- -->
      <!-- Part 1 -->
      <!-- ------------------------------------------------- -->
      <div class="col-xl-12 border-end" >
        <div class="row justify-content-center py-4">
          <div class="col-lg-11">
            <div class="card-body" >
              <a href="#" class="text-center text-nowrap logo-img d-block mb-4 w-100">
                <img src="{{asset('img/imagen.png')}}"width="90%"height="100px" class="dark-logo" alt="Logo-Dark" />
                <p></p>
                <h4 class="lh-base mb-4"style="color:rgb(0, 170, 212)"  ><b>INDICADORES DE SALUD</b> </h4>
              </a>

              <form method="POST" action="{{ route('login') }}">
                @csrf
            
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email :</label>
                <input id="email"placeholder="Ingrese email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              </div>
              <div class="mb-4">
                <div class="d-flex align-items-center justify-content-between">
                  <label for="exampleInputPassword1" class="form-label">Contraseña:</label>
            
                  @if (Route::has('password.request'))
                        <a class="text-primary link-dark fs-2" href="{{ route('password.request') }}">
                            {{ __('Olvidé mi contraseña?') }}
                        </a>
                    @endif
                </div>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"placeholder="Ingrese contraseña" required autocomplete="current-password">
              </div>
              <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="form-check">
                  <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                  <label class="form-check-label text-dark" for="flexCheckChecked">
                    Recordarme
                  </label>
                </div>
              </div>
              <button type="submit"class="btn btn-dark w-100 py-8 mb-4 rounded-1">
                        {{ __('Iniciar Sesión') }}
                    </button>
            
            
            </form>

          
            </div>
          </div>
        </div>

      </div>
      <!-- ------------------------------------------------- -->
      <!-- Part 2 -->
      <!-- ------------------------------------------------- -->
      <!-- <div class="col-xl-6 d-none d-xl-block">
        <div class="row justify-content-center align-items-start h-100">
          <div class="col-lg-9">
            <div id="auth-login" class="carousel slide auth-carousel mt-5 pt-4" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#auth-login" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#auth-login" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#auth-login" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="d-flex align-items-center justify-content-center w-100 h-100 flex-column gap-9 text-center">
                    <img src="../assets/images/backgrounds/login-side.png" alt="login-side-img" width="300" class="img-fluid" />
                    <h4 class="mb-0">Feature Rich 3D Charts</h4>
                    <p class="fs-12 mb-0">Donec justo tortor, malesuada vitae faucibus ac, tristique sit amet
                      massa.
                      Aliquam dignissim nec felis quis imperdiet.</p>
                    <a href="javascript:void(0)" class="btn btn-primary rounded-1">Learn More</a>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="d-flex align-items-center justify-content-center w-100 h-100 flex-column gap-9 text-center">
                    <img src="../assets/images/backgrounds/login-side.png" alt="login-side-img" width="300" class="img-fluid" />
                    <h4 class="mb-0">Feature Rich 2D Charts</h4>
                    <p class="fs-12 mb-0">Donec justo tortor, malesuada vitae faucibus ac, tristique sit amet
                      massa.
                      Aliquam dignissim nec felis quis imperdiet.</p>
                    <a href="javascript:void(0)" class="btn btn-primary rounded-1">Learn More</a>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="d-flex align-items-center justify-content-center w-100 h-100 flex-column gap-9 text-center">
                    <img src="../assets/images/backgrounds/login-side.png" alt="login-side-img" width="300" class="img-fluid" />
                    <h4 class="mb-0">Feature Rich 1D Charts</h4>
                    <p class="fs-12 mb-0">Donec justo tortor, malesuada vitae faucibus ac, tristique sit amet
                      massa.
                      Aliquam dignissim nec felis quis imperdiet.</p>
                    <a href="javascript:void(0)" class="btn btn-primary rounded-1">Learn More</a>
                  </div>
                </div>
              </div>

            </div>


          </div>
        </div>

      </div> -->
    </div>

  </div>
@endsection
