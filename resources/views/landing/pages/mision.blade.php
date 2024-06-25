@extends("landing.layout.principal")
@section('contenido')
<div style=" height: 50%;">
<section style="width: 50%; overflow: auto; float: left; background: linear-gradient(to bottom, rgba(92, 77, 80, 0.8) 0%, rgba(92, 77, 80, 0.8) 100%), url({{ asset('landing/assets/img/mapa.png') }}); height: 200%;">
</section>
<aside class="bg-primary" style="width: 50%; float: left; height: 200%; text-align: center;
    padding-top: 9%;
    padding-left: 10%;">

    <div class="col-lg-8 align-self-end">

         <h1 class="text-white font-weight-bold">Visión</h1>
    </div>
    <div class="col-lg-8 align-self-baseline">
        <p class="text-white-75 mb-5"> A través de la innovación constante, colaboraciones estratégicas y datos precisos, aspiramos a reducir significativamente los incidentes de tráfico y crear un mundo donde todos lleguen a su destino de manera segura. </p>
    </div>
    <div class="col-lg-8 align-self-end">
    <hr class="divider" />
         <h1 class="text-white font-weight-bold">Misión</h1>
    </div>
    <div class="col-lg-8 align-self-baseline">
        <p class="text-white-75 mb-5">Salvar vidas y reducir accidentes automovilísticos al proporcionar a los usuarios una aplicación móvil confiable y fácil de usar, alertando a los conductores sobre zonas de riesgo, condiciones peligrosas y accidentes, brindando así una experiencia de conducción más segura y consciente.</p>
    </div>
</aside>
</div>

@endsection()
