<!DOCTYPE html>
<html lang="es">
    <head>
    @include('landing.include.head')
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
