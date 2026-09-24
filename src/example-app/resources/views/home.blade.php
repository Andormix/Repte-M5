@extends('plantillas.plantilla')
@section('title', 'Home')
@section('navegacio', 'Inici')

@section('continguts')

<!-- ---------------------- SECCIÓ CARROUSEL --------------------------  -->
<section>

    <!-- ---------------------- INICI ESPAI 1 --------------------------  -->
    <div class="section-carrousel ">

        <!-- ------------ CARROUSEL ------------ -->
        <div class="section-carrousel__slides">

            <div id="demo" class="carousel slide" data-bs-ride="carousel">

                <!-- ------------ INDICADORS ------------ -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                </div>
                
                <!-- ------------ SLIDES ------------ -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/carrousel1.jpg" alt="Benvingut/da!" class="carrousel__image">
                        <div class="carousel-caption">
                            <h3 class="carousel-caption--titol">'Fuertes, libres y nómadas', el nou llibre d'Elsa Punset</h3>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/carrousel2.png" alt="Chicago" class="carrousel__image">
                        <div class="carousel-caption">
                            <h3 class="carousel-caption--titol">Berto Romero presenta "En ocasiones veo pelis"</h3>
                        </div> 
                    </div>
                <div class="carousel-item">
                    <img src="img/carrousel3.jpeg" alt="New York" class="carrousel__image">
                        <div class="carousel-caption">
                            <h3 class="carousel-caption--titol">Arriba la fira del llibre al Pirineu!</h3>
                        </div>  
                    </div>
                </div>
        
                <!-- Left and right controls/icons -->
                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                </button>
        
                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
                </button>
            </div>  
        </div>
    </div>
</section>
<!-- ---------------------- FI SECCIÓ CARROUSEL --------------------------  -->






<!-- ---------------------- INICI SECCIÓ AMB ANUNCI--------------------------  -->
<section >
    <!-- ------------ VIDEO / ANUNCI ------------ -->
    <div class="section-amb-anunci">
        <div class="section-amb-anunci__anunci">
            <div class="section-amb-anunci__anunci-img" >
                <img src="img/andorra.png">
            </div>
            <a href="https://visitandorra.com/es/" target="_blank">
                <video id="anunci-seccio" width="100%" height="75%" autoplay loop muted>
                <source src="video/anunci2022.mp4" type="video/mp4">
                <source src="movie.ogg" type="video/ogg">
                Your browser does not support the video tag.
            <video></a><br>
            <button id="btn-video-playPause" class="btn btn-primary btn--margin-3">Play/Pause</button> 
            <button id="btn-video-mute" class="btn btn-primary btn--margin-3">Mute</button>
            <button class="btn btn-primary btn--margin-3">Audio Descripció</button>
            <audio id="anunci-seccio-audio-descripcio"></audio>
        </div>

        <!-- ------------ ZONA NOVETATS ------------ -->
        <div class="section-amb-anunci__novetats" >

            
            <h2 class="section-amb-anunci_titol section-amb-anunci_titol--subrayado"> <u> &nbsp; NOVETATS &nbsp; <hr></u></h2>
            
    
            <div class="targeta-contenedor-swipe">
                <div class="swiper mySwiper1">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="targeta" data-bs-toggle="modal" data-bs-target="#modalLlibre">
                                <div class="targeta__contenidor-img">
                                    <img class="targeta__img" src="img/llibre1.jpg" alt="llibre">
                                    <button class="btn targeta__botoAfegirCistella"> Afegir a la cistella </button>
                                </div>
                                    <div class="targeta__contenidor-descripcio">
                                    <h3 class="targeta__preu">Preu: 7.95€</h3>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="targeta">
                                <div class="targeta__contenidor-img">
                                    <img class="targeta__img" src="img/llibre2.jpg" alt="llibre">
                                    <button class="btn targeta__botoAfegirCistella"> Afegir a la cistella </button>
                                </div>
                                    <div class="targeta__contenidor-descripcio">
                                    <h3 class="targeta__preu">Preu: 7.95€</h3>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="targeta">
                                <div class="targeta__contenidor-img">
                                    <img class="targeta__img" src="img/llibre3.jpg" alt="llibre">
                                    <button class="btn targeta__botoAfegirCistella"> Afegir a la cistella </button>
                                </div>
                                    <div class="targeta__contenidor-descripcio">
                                    <h3 class="targeta__preu">Preu: 7.95€</h3>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="targeta">
                                <div class="targeta__contenidor-img">
                                    <img class="targeta__img" src="img/llibre4.jpg" alt="llibre">
                                    <button class="btn targeta__botoAfegirCistella"> Afegir a la cistella </button>
                                </div>
                                    <div class="targeta__contenidor-descripcio">
                                    <h3 class="targeta__preu">Preu: 7.95€</h3>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="targeta">
                                <div class="targeta__contenidor-img">
                                    <img class="targeta__img" src="img/llibre5.jpg" alt="llibre">
                                    <button class="btn targeta__botoAfegirCistella"> Afegir a la cistella </button>
                                </div>
                                    <div class="targeta__contenidor-descripcio">
                                    <h3 class="targeta__preu">Preu: 7.95€</h3>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="targeta">
                                <div class="targeta__contenidor-img">
                                    <img class="targeta__img" src="img/llibre6.jpg" alt="llibre">
                                    <button class="btn targeta__botoAfegirCistella"> Afegir a la cistella </button>
                                </div>
                                    <div class="targeta__contenidor-descripcio">
                                    <h3 class="targeta__preu">Preu: 7.95€</h3>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="targeta">
                                <div class="targeta__contenidor-img">
                                    <img class="targeta__img" src="img/llibre7.jpg" alt="llibre">
                                    <button class="btn targeta__botoAfegirCistella"> Afegir a la cistella </button>
                                </div>
                                    <div class="targeta__contenidor-descripcio">
                                    <h3 class="targeta__preu">Preu: 7.95€</h3>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="targeta">
                                <div class="targeta__contenidor-img">
                                    <img class="targeta__img" src="img/llibre8.jpg" alt="llibre">
                                    <button class="btn targeta__botoAfegirCistella"> Afegir a la cistella </button>
                                </div>
                                    <div class="targeta__contenidor-descripcio">
                                    <h3 class="targeta__preu">Preu: 7.95€</h3>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="targeta">
                                <div class="targeta__contenidor-img">
                                    <img class="targeta__img" src="img/llibre9.jpg" alt="llibre">
                                    <button class="btn targeta__botoAfegirCistella"> Afegir a la cistella </button>
                                </div>
                                    <div class="targeta__contenidor-descripcio">
                                    <h3 class="targeta__preu">Preu: 7.95€</h3>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="targeta">
                                <div class="targeta__contenidor-img">
                                    <img class="targeta__img" src="img/llibre10.jpg" alt="llibre">
                                    <button class="btn targeta__botoAfegirCistella"> Afegir a la cistella </button>
                                </div>
                                    <div class="targeta__contenidor-descripcio">
                                    <h3 class="targeta__preu">Preu: 7.95€</h3>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="targeta">
                                <div class="targeta__contenidor-img">
                                    <img class="targeta__img" src="img/llibre11.jpg" alt="llibre">
                                    <button class="btn targeta__botoAfegirCistella"> Afegir a la cistella </button>
                                </div>
                                    <div class="targeta__contenidor-descripcio">
                                    <h3 class="targeta__preu">Preu: 7.95€</h3>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="targeta">
                                <div class="targeta__contenidor-img">
                                    <img class="targeta__img" src="img/llibre12.jpg" alt="llibre">
                                    <button class="btn targeta__botoAfegirCistella"> Afegir a la cistella </button>
                                </div>
                                    <div class="targeta__contenidor-descripcio">
                                    <h3 class="targeta__preu">Preu: 7.95€</h3>
                                </div>
                            </div>
                        </div>
                    </div>   

                    <!-- FLECHES DE NAVEGACIÓ -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>

                    <!-- BOLES DE NAVEGACIÓ -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>      
        </div>

    

        <!-- ------------ ZONA OFERTES ------------ -->
        <div class="section-amb-anunci__ofertes">

            <h2 class="section-amb-anunci_titol section-amb-anunci_titol--subrayado"><u>OFERTES</u> </h2><hr>
           
            <div class="targeta-contenedor">
                <div class="targeta">
                    <div class="targeta__contenidor-img">
                        <img class="targeta__img" src="img/llibre9.jpg" alt="llibre">
                        <button class="btn targeta__botoAfegirCistella"> Afegir a la cistella </button>
                    </div>
                        <div class="targeta__contenidor-descripcio">
                        <h3 class="targeta__preu">Preu: 7.95€</h3>
                    </div>
                </div>
                <div class="targeta">
                    <div class="targeta__contenidor-img">
                        <img class="targeta__img" src="img/llibre10.jpg" alt="llibre">
                        <button class="btn targeta__botoAfegirCistella"> Afegir a la cistella </button>
                    </div>
                        <div class="targeta__contenidor-descripcio">
                        <h3 class="targeta__preu">Preu: 7.95€</h3>
                    </div>
                </div>
                <div class="targeta">
                    <div class="targeta__contenidor-img">
                        <img class="targeta__img" src="img/llibre11.jpg" alt="llibre">
                        <button class="btn targeta__botoAfegirCistella"> Afegir a la cistella </button>
                    </div>
                        <div class="targeta__contenidor-descripcio">
                        <h3 class="targeta__preu">Preu: 7.95€</h3>
                    </div>
                </div>
                <div class="targeta">
                    <div class="targeta__contenidor-img">
                        <img class="targeta__img" src="img/llibre12.jpg" alt="llibre">
                        <button class="btn targeta__botoAfegirCistella"> Afegir a la cistella </button>
                    </div>
                        <div class="targeta__contenidor-descripcio">
                        <h3 class="targeta__preu">Preu: 7.95€</h3>
                    </div>
                </div>
            </div> 
        </div>
        
        <!-- ------------ ZONA OFERTES ------------ -->
        <div class="section-amb-anunci__best-sellers">

            <h2 class="section-amb-anunci_titol section-amb-anunci_titol--subrayado"><u>BEST SELLERS</u> </h2><hr>
           
            <div class="targeta-contenedor__zona-baixa">
                @foreach($llibres as $llibre)
                <form action="{{ route('agregar-al-carrito', ['id' => $llibre->id]) }}" method="post">
                    @csrf
                    <div class="targeta">
                        <div class="targeta__titol">
                            <h3>{{ $llibre->titol }}</h3>
                        </div>
                        <div class="targeta__contenidor-img">
                            <img class="targeta__img abrir-modal" src="{{ $llibre->imatge ?? 'img/llibre0.png' }}" alt="llibre" data-bs-toggle="modal" data-bs-target="#modalLlibre{{ $llibre->id }}">
                            @auth
                                <button class="btn targeta__botoAfegirCistella"> Afegir a la cistella </button>
                            @endauth
                        </div>
                        <div class="targeta__contenidor-descripcio">
                            <h3 class="targeta__preu">Preu:{{ $llibre->preu }}</h3>
                        </div>
                    </div>
                </form>
        
                <!-- Modal para cada libro -->
                <div class="modal fade" id="modalLlibre{{ $llibre->id }}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Contenido del modal aquí -->
                            <div class="modal-header">
                                <h4 class="modal-title">{{ $llibre->titol }}</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>


                            <!-- ------------ BODY MODAL LLIBRE ------------ -->
                            <div class="modal-body">
                                <P><strong>ISBN:</strong> PLANETA-{{ $llibre->isbn}} <br><strong>Autor:</strong>{{ $llibre->autor }}<br><strong>Categoria:</strong>{{ $llibre->categoria }}</P>
                            
                                <div class="modal-llibre">
                                    <div class="modal-llibre_img" >
                                        <img src="{{ $llibre->imatge }}" alt="01">  
                                    </div>
                                    <div class="modal-llibre__text">
                                        <p>{{$llibre->descripcio}}</p> 
                                    </div>
                                </div>
                                <div>
                                    <p><strong>Preu:</strong>{{$llibre->preu }}</p>      
                                </div>
                            </div>

                            <div class="modal-footer">    
                                <button class="btn btn-primary">Afegir a la cistella &#160; <strong class="fas fa-shopping-cart"></strong> </button>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tancar</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
                
        </div>   
    </div>
</section>
<!-- ---------------------- FI SECCIÓ AMB ANUNCI  --------------------------  -->



<!-- ---------------------- MODAL LLIBRE --------------------------  -->
<div class="modal fade" id="modalLlibre">
    <div class="modal-dialog">
        <div class="modal-content">
    
            <!-- ------------ HEADER MODAL LLIBRE ------------ -->
            <div class="modal-header">

                <h4 class="modal-title">En ocasiones veo pelis</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

            </div>
    
            <!-- ------------ BODY MODAL LLIBRE ------------ -->
            <div class="modal-body">
                <P><strong>ISBN:</strong> PLANETA- 9788408139430 <br><strong>Autor:</strong>Berto Romero (Alias: Berto Seco)<br>Mes info <a href="plantillaDetall.html">aquí</a></P>
               
                <div class="modal-llibre">
                    <div class="modal-llibre_img" >
                        <img src="img/llibre1.jpg" alt="Fotografia d'un llibre, Autor: Berto Romero, Títol: En ocasiones veo pelis">

                    </div>
                    <div class="modal-llibre__text">
                        <p>
                            <strong>Sinopsis:</strong> 75 monólogos de la mano de Berto, con su inconfundible ingenio y sentido del humor, 
                            y con el mundo del cine como telón de fondo. 
                    </div>

                </div>
                <p>Un compendio de todo lo que no necesitabas 
                    saber sobre el universo cinematográfico, ¡por fin en tus manos! ¿Por qué Hulk no viste 
                    ropa superelástica al transformarse?, o muy ancha, rollo rapero? ¡Lo que se ahorraría en 
                    camisetas! ¿O por qué Spiderman tiene todos los poderes de una araña menos el de comer moscas? 
                    Casablanca, El Padrino, Matrix, Pretty Woman, Titanic, El señor de los anillos, Harry Potter, V
                    oldemort y otras chicas del montón...? Ningún gran clásico escapa al ingenio de Berto Romero. 
                    ¿Te lo vas a perder?Basado en el programa «MovieBerto» de Paramount Channel.
                </p>
                
                <p><strong>Preu: 7,90€</strong></p>      
            </div>
    
            <!-- ------------ FOOTER MODAL LLIBRE ------------ -->
            <div class="modal-footer">              
                <div>
                    <button class="btn btn-primary">Afegir a la cistella &#160; <strong class="fas fa-shopping-cart"></strong> </button>
                </div>
               
            </div>
    
        </div>
    </div>
</div>
@endsection