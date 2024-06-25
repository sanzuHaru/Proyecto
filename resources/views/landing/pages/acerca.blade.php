@extends("landing.layout.principal")
@section('contenido')
<!-- About-->
<section class="page-section bg-primary" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">¡Ante todo tu mejor opción!</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4">Somos un equipo dedicado a la innovación y la tecnología, comprometidos con el desarrollo de soluciones inteligentes para los desafíos de movilidad de hoy.</p>
                        <p class="text-white-75 mb-4">Nuestra aplicación móvil es el corazón de nuestra empresa. Diseñada para ser intuitiva y fácil de usar, permite a los usuarios notificar sobre posibles accidentes o rutas peligrosas en tiempo real. Con esta información, ofrecemos rutas alternas seguras y actualizaciones constantes para que puedas llegar a tu destino sin contratiempos.</p></p>
                    </div>
                </div>
            </div>
        </section>
<!-- Services-->
<section class="page-section" id="services">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">Servicios</h2>
                <hr class="divider" />
                <div class="row gx-4 gx-lg-5">
                    <!-- <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi bi-cart4 fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Entrega a domicilio</h3>
                            <p class="text-muted mb-0">Brindamos un sistema rápido de entrega a domicilio desde cualquier parte del país.</p>
                        </div>
                    </div> -->
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
        </section>
@endsection()
