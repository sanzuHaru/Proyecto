@extends("landing.layout.principal")
@section('contenido')
<div style="height: 50%;">
    <section style="width: 50%; overflow: auto; float: left; background: linear-gradient(to bottom, rgba(92, 77, 80, 0.3) 0%, rgba(92, 77, 80, 0.3) 100%), url({{ asset('landing/assets/img/fondo.jpeg') }}); height: 200%;">
    </section>
    <aside style="width: 50%; float: left; height: 200%; text-align: center;
        padding-top: 9%;
        padding-left: 10%;
        background-color: #3f51b5; /* Color de fondo principal */
        color: #d6d6d6; /* Color de texto principal */
    ">

        <div class="col-lg-8 align-self-end">
             <h1 class="font-weight-bold" style="color: #d6d6d6;">Visión</h1>
        </div>
        <br>
        <div class="col-lg-8 align-self-baseline">
            <p class="mb-5" style="color: #d6d6d6;">A través de la innovación constante, colaboraciones estratégicas y datos precisos, aspiramos a reducir significativamente los incidentes de tráfico y crear un mundo donde todos lleguen a su destino de manera segura.</p>
        </div>
        <div class="col-lg-8 align-self-end">
            <br>
        <hr class="divider" />
        <br>
             <h1 class="font-weight-bold" style="color: #d6d6d6;">Misión</h1>
        </div>
        <br>
        <div class="col-lg-8 align-self-baseline">
            <p class="mb-5" style="color: #d6d6d6;">Salvar vidas y reducir accidentes automovilísticos al proporcionar a los usuarios una aplicación móvil confiable y fácil de usar, alertando a los conductores sobre zonas de riesgo, brindando así una experiencia de conducción más segura y consciente.</p>
        </div>
    </aside>
</div>

@endsection()
