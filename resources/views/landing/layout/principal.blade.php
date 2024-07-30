<!DOCTYPE html>
<html lang="es">
    <head>
        @include('landing.include.head')
        <style>
            /* Estilos para la barra de navegación */
            #mainNav {
                background-color: #3f51b5; /* Color de fondo */
            }
            #mainNav .navbar-light .navbar-nav .nav-link,
            #mainNav .navbar-light .navbar-brand {
                color: #ffffff !important; /* Color blanco fijo */
            }
            /* Asegúrate de que el color de las letras sea blanco en todos los estados */
            #mainNav .navbar-light .navbar-nav .nav-link:hover,
            #mainNav .navbar-light .navbar-nav .nav-link:focus,
            #mainNav .navbar-light .navbar-brand:hover,
            #mainNav .navbar-light .navbar-brand:focus {
                color: #ffffff !important; /* Color blanco fijo en hover y focus */
            }
            #mainNav .navbar-light .navbar-toggler {
                border-color: #ffffff; /* Color del borde del botón de menú */
            }
            #mainNav .navbar-light .navbar-toggler-icon {
                background-color: #ffffff; /* Color del icono de la hamburguesa */
            }
        </style>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            @include('landing.include.menu')
        </nav>

        @yield("contenido")

        <!-- Footer-->
        <footer class="bg-light py-5">
            @include('landing.include.footer')
        </footer>

        @include("landing.include.script")

    </body>
</html>
