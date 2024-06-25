@extends("landing.layout.principal")
@section('contenido')
<div style="width:100%;padding-top:6rem;    background: linear-gradient(to bottom, rgba(92, 77, 80, 0.8) 0%, rgba(92, 77, 80, 0.8) 100%), url({{ asset('landing/assets/img/zona.png') }});padding-bottom:12rem;">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h2 class="row gx-4 gx-lg-5 justify-content-center mb-5">{{ __('Registrarse') }}</h2>
                    <hr class="divider" />

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div>

                                <div class="form-floating mb-3">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="name@example.com" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    <label for="name">{{ __('Nombre') }}</label>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div>

                                <div class="form-floating mb-3">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"  placeholder="name@example.com" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    <label for="email">{{ __('Correo electronico') }}</label>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div >

                                <div class="form-floating mb-3">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="name@example.com" name="password" required autocomplete="new-password">
                                    <label for="password">{{ __('Contraseña') }}</label>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div>

                                <div class="form-floating mb-3">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="name@example.com" required autocomplete="new-password">
                                    <label for="password-confirm">{{ __('Confirmar Contraseña') }}</label>

                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4" style="width: 500px;">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary btn-xl">
                                            {{ __('Registrarse') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@endsection
