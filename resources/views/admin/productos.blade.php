@extends('adminlte::page')
@section('content')

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
<!-- Portfolio-->
 <!-- Portfolio Section Heading-->
 <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Productos</h2>
 
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <!-- Portfolio Grid Items-->
        <div class="row justify-content-center">
            @foreach($producto as $row)
            <!-- Portfolio Item 6-->
            <div class="col-md-6 col-lg-4">
                <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#{{'portfolioModal'.$row->id}}">
                    <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                    </div>
                    <img class="img-fluid" src="{{URL::asset('imagenes/productos').'/'.$row->img}}" alt="..." />
                </div>
            </div>
            @endforeach
        </div>
        <!-- Portfolio Modal 6-->
        @foreach($producto as $row)

        <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" aria-labelledby="#{{'portfolioModal'.$row->id}}" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">{{$row->nombre}}</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="{{URL::asset('imagenes/productos').'/'.$row->img}}" alt="..." />
                                    <!-- Portfolio Modal - Text-->
                                    <h5 class="mb-4"><b>Descripcion</b> {{$row->descripcion}}</h5>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Agregar a Carrito
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
           
            @endforeach
</section>
        <!-- Call to action-->
    
        
@endsection()