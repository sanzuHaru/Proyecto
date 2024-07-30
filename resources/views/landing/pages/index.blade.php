@extends("landing.layout.principal")
@section('contenido')

<!-- Masthead-->
<section>
    <header class="masthead" style="background-color: #3f51b5;">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">ZONA</h1>
                    <h2 class="text-white font-weight-bold">Prevención y combate de siniestros viales</h2>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white font-weight-bold">Creemos firmemente que la prevención es la clave para reducir los accidentes viales. Por eso, cada alerta generada por nuestra aplicación es minuciosamente evaluada para garantizar su precisión y relevancia. Así, continuamos trabajando incansablemente para crear una experiencia de conducción más segura y proteger a nuestra comunidad en las carreteras.</p>
                    <i class="bi bi-car-front text-white"></i>
                </div>
            </div>
        </div>
    </header>
</section>

<section class="page-section" style="background-color: #d6d6d6;" id="services">
    <div class="container px-4 px-lg-5">
        <h2 class="text-center mt-0">Servicios</h2>
        <hr class="divider" />
        <div class="row gx-4 gx-lg-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-laptop fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Asesoramiento en línea</h3>
                            <p class="text-muted mb-0">Tu puedes recibir una orientación elemental entorno al manejo correcto de la plataforma</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-heart fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Cuidamos tu bienestar</h3>
                            <p class="text-muted mb-0">Permitimos a los usuarios información acerca de accidentes o zonas de riesgo</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi bi-clock fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Atención a todas horas</h3>
                            <p class="text-muted mb-0">Le brindamos una atención las 24 horas del día todos los días de la semana.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
