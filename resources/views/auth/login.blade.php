@extends("landing.layout.principal")
@section('contenido')

<div style="width:100%;padding-top:8rem;    background: linear-gradient(to bottom, rgba(92, 77, 80, 0.8) 0%, rgba(92, 77, 80, 0.8) 100%), url({{ asset('landing/assets/img/Zona.png') }});padding-bottom:16rem;">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">

                   <h2 class="row gx-4 gx-lg-5 justify-content-center mb-5">{{ __('Iniciar Sesión') }}</h2>
                   <hr class="divider" />


                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div>


                            <div class="form-floating mb-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <label for="email">Correo electrónico</label>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div >


                            <div class="form-floating mb-3">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Ingresar Contraseña" name="password" required autocomplete="current-password">
                                <label for="email">Contraseña</label>


                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recordar Contraseña') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4" style="width: 500px;">
                            <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-xl">
                                    {{ __('Acceder') }}
                                </button>
                            </div>


                                <br>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
