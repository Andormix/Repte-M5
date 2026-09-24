<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- ------------ TÍTOL + FAVICON FINESTRA  ------------ -->
    <link rel="shortcut icon" href="img/rsz_favicon.jpg" type="image/x-icon">
    
    <!-- ------------ RESET PRO ------------ -->
    <link rel="stylesheet" href="css/reset.css">

    <!-- ------------ LINKS  ------------ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/estil.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <!--<script src="https://cdn.tailwindcss.com"></script>-->

</head>







<!-- --------------------------------------------------------------------------------------------------------------------------- -->







<header>
<!-- ---------------------- INICI ESPAI 1 --------------------------  -->
<div class="header-info">

    <!-- ------------ EMAIL I TELEFON ------------ -->
    <div class="header-info__contacte">
        Tel: <a href="tel:+376000000">+376 000 000</a> &nbsp  Email: <a href="mailto:RacóDelLlibre@andorra.ad">RacóDelLlibre@andorra.ad</a>
    </div>
    <div class="header-info__idiomes">
        <a href="404.html#Ancla-gif"> <img src="img/flags.png"></a>
    </div>

</div>

<!-- ---------------------- INICI ESPAI 2 --------------------------  -->
<div class="header-centre">
    
    <!-- ------------ LOGO ------------ -->
    <div class="header-centre__logo">
        <a href="{{ route('home') }}">
        <img id="logo" src="img/favicon.jpg" alt="Logo">
        </a>
    </div>
    
    <!-- ------------ TÍTOL ------------ -->
    <div> 
        <h1 class="header-centre__titol">Racó <br> Del <br> Llibre</h1>
    </div>

    <!-- ------------ BARRA DE CERCA ------------ -->
    <div class="header-centre__barraCerca">
        <div class="input-group">
            <button type="button" class="btn">Cerca</button>
            <input type="search" class="form-control background__primary--tenue" placeholder="..." aria-label="Search" aria-describedby="search-addon" />
        </div>
    </div>

    @auth
    <!-- ------------ ICON CISTELLA ------------ -->
    <div id ="cistella" class="header-centre__iconCarrousel header-centre__iconText" data-bs-toggle="modal" data-bs-target="#modalCistella">
        <i class="fas fa-shopping-cart icon"></i>
        <p class="header-centre-icon-text">Cistella</p>
    </div>
    @endauth

    <!-- ------------ INON out SESSIÓ ------------ -->
    @auth
    <div id="outS" class="header-centre__iconIniciSes header-centre__iconText" data-bs-toggle="modal" data-bs-target="#myModalLogout">
        <i id="myIcon" class="fas fa-sign-out-alt icon"></i>
        <p id="textoCuenta" class="header-centre-icon-text">{{$nombreUsuario}}</p>
    </div>
    @endauth

    @guest
    <!-- ------------ INON  SESSIÓ ------------ -->
    <div id="inS" class="header-centre__iconIniciSes header-centre__iconText" data-bs-toggle="modal" data-bs-target="#myModal">
        <i id="myIcon" class="fas fa-user icon"></i>
        <p id="textoCuenta" class="header-centre-icon-text">Iniciar Sesió</p>
    </div>
    @endguest

</div> 

</div> 
<!-- ---------------------- INICI ESPAI 3 --------------------------  -->

<!-- ------------ NAVIGATION  ------------ -->
<br><nav id="index-inici" class="navbar nvar-custom navbar-expand-md navbar-custom  navbar-dark">
    <div class="container-fluid">
        <a href="index.html"> <i class="fas fa-home nvar__icon"></i></a>
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button"  data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" href="{{ route('productes') }}" >Tots els Temes</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="temes.html">Literatura</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="juvenil.html">Juvenil i Infantil</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="ebooks.html">eBooks</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('ODS') }}">Dona i Recull Llibres pels ODS</a>
            </li>
        </ul>
        </div>
    </div>
</nav> 

@guest
<!-- ---------------------- MODAL INICI SESSIO --------------------------  -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
    
            <!-- ------------ HEADER MODAL ------------ -->
            <div class="modal-header">
                <h2 class="modal-title">Inici de Sessió </h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

            </div>
    
            <!-- ------------ BODY MODAL ------------ -->
            <div class="modal-body">

                <form action="{{ route('login') }}" method="post">
                    @csrf

                    <div class="form-floating form-floating--margen form-floating--max-width ">
                        <input name="email" type="email" class="form-control" id="email-input-login">
                        <span class="span--vermell" id="error-email-input-login"></span>
                        <label class="label--light" for="email-input-login"><i class="input-icon fas fa-envelope"></i> Email: correu@andorra.ad </label>
                    </div> 

                    <div class="form-floating form-floating--margen form-floating--max-width ">
                        <input name="password" type="password" class="form-control" id="contrasenya-input-login">
                        <span class="span--vermell" id="error-contrasenya-input-login"></span>
                        <label class="label--light" for="contrasenya-input-login"><i class="input-icon fas fa-lock"></i> Contrasenya: Contrasenya77 </label>
                    </div>

                    <div>
                        <a href="{{ route('registre') }}"> Crea el teu compte  <br></a>
                        <a href="recuperacio.html"> Recuperar contrasenya  <br></a>
                    </div>
                    <br>
                    <a href="404.html#Ancla-gif"> <img src="img/socis.png"></a>

                     <!-- ------------ FOOTER MODAL ------------ -->
                    <div class="modal-footer">
                        <button id="btn-login" type="submit" class="btn btn-primary ">Iniciar Sessió</button>
                        <a href="index.html"><button type="submit" class="btn btn-primary"><i class="fab fa-google"></i></button></a>
                    </div>
                    
                
            </div>
    
           
        </form>
    
        </div>
    </div>
</div>
@endguest

@auth
<!-- ---------------------- MODAL LOG OUT --------------------------  -->
<div class="modal fade" id="myModalLogout">
    <div class="modal-dialog">
        <div class="modal-content">
    
            <!-- ------------ HEADER MODAL ------------ -->
            <div class="modal-header">
                <h2 id="nomUsuari" class="modal-title">Hola {{ $nombreUsuario }}!</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

            </div>
    
            <!-- ------------ BODY MODAL ------------ -->
            <div class="modal-body">
                <div class="background__primary">
                    <p><strong>Usuari:</strong> {{ $usuario->estatus }} ({{ $usuario->getDescompte()}}% de descompte addicional) <br> <strong>Punts:</strong> {{ $usuario->puntos }}</p>
                </div>
                <div class="progress-bar-container">
                    <div id="progress-bar" class="progress-bar" style="width: {{ min(($usuario->puntos)*0.5, 100) }}%;"></div>
                    <div class="progress-mark normal-mark" style="left: 5%;">(Normal)</div>
                    <div class="progress-mark original-mark" style="left: 25%;">50 punts (Original)</div>
                    <div class="progress-mark genuino-mark" style="left: 50%;">100 punts (Genuino)</div>
                    <div class="progress-mark leyenda-mark" style="left: 75%;">150 punts (Leyenda)</div>
                </div><br>
                <a class="nav-link" href="{{ route('dashboard') }}" >Veure panel d'usuari</a>
            </div>
    
            <!-- ------------ FOOTER MODAL ------------ -->
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <div class="modal-footer">
                    <button id="btn-logout" type="submit" class="btn btn-primary ">Log out</button>
                </div>
            </form>
    
        </div>
    </div>
</div>
@endauth

@auth
 <!-- ---------------------- MODAL CARRITO --------------------------  -->
 <div class="modal fade" id="modalCistella">
    <div class="modal-dialog">
        <div class="modal-content">
    
            <!-- ------------ HEADER MODAL CARRITO ------------ -->
            <div class="modal-header">

                <h2 class="modal-title">Cistella</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

            </div>
    
           <!-- ------------ BODY MODAL CARRITO ------------ -->
            <div class="modal-body">
                @if($carrito && $carrito->totalElements() > 0)
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Llibre</th>
                                <th>Preu</th>
                                <th>Qty</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carrito->carritoItems as $carritoItem)
                                <tr>
                                    <td>{{ $carritoItem->TitolLlibre()}}</td>
                                    <td>{{ $carritoItem->PreuLlibre()}}€</td>
                                    <td>
                                        <form action="{{ route('carrito.editar-cantidad', $carritoItem->id) }}" method="post">
                                            @csrf
                                            <div>
                                                <input type="number" name="cantidad" value="{{ $carritoItem->cantidad }}" min="1" max="99" class="form-control" aria-label="Cantidad" aria-describedby="btn-eliminar" style="background-color: #f2f2f2;" onchange="this.form.submit()">
                                            </div>
                                        </form>
                                    </td>
                                    <td>{{ $carritoItem->Total()}}€</td>
                                    <td>
                                        <form action="{{ route('carrito.eliminar', $carritoItem->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                    <div class="cesta__pago background__secondary">
                        <strong>Productes:</strong> {{ $carrito->calcularTotal() }}€ 
                    </div>
                    <div class="cesta__pago background__secondary">
                        <strong>Descomptes:</strong> {{ $carrito->calcularDescompte() }}€
                        (Usuari {{ $usuario->estatus }}: {{ $usuario->getDescompte()}}%)
                    </div>
                    <hr>
                    <div class="cesta__pago background__primary">
                        <p><strong>Total: </strong>{{ $carrito->calcularTotalAmbDescompte() }}€</p>
                    </div>
                    
                @else
                    <p> La teva cistella està buida 🤷‍♂️</p>
                @endif

                @if(session('abrirModal'))
                    @if(session('success'))
                        <div class="alert alert-success"> {{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @endif
                
            </div>

        <!-- ------------ FOOTER MODAL CARRITO ------------ -->
        <div class="modal-footer">
            <form action="{{ route('carrito.buidar') }}" method="post">
                @csrf
                @method('DELETE')
                <div>
                    <button type="submit" class="btn btn-primary">Buidar</button>
                </div>
            </form>

            <form action="{{ route('carrito.pagar', ['id' => $usuario->id]) }}"  method="post">
                @csrf
                @method('DELETE')
                <div>
                    <button type="submit" class="btn btn-primary" @if(session('error')) disabled @endif>Tramitar</button>
                </div>
            </form>
        </div>
    
        </div>
    </div>
</div>
@endauth

 <!-- ------------ BREADCRUMB ------------ -->
 <section>
    <br><nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Navegabilitat:</li>
            <!--<li class="breadcrumb-item"><a href="#">Home</a></li>-->
            <li class="breadcrumb-item active" aria-current="page">@yield('navegacio')</li>
        </ol>
    </nav><hr>
</section>
@if(session('abrirModal'))
    <script>
        // Códi per tornar a obrir el modal.
        $(document).ready(function(){
            $('#modalCistella').modal('show');
        });
    </script>
@endif
@if(!session('abrirModal'))
    @if(session('success'))
        <div class="alert alert-success"> {{ session('success') }}</div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@endif

</header>





<!-- --------------------------------------------------------------------------------------------------------------------------- -->




<body>

    <!-- PART NO COMUNA A EDITAR -->
    @yield('continguts') 

</body>







<!-- --------------------------------------------------------------------------------------------------------------------------- -->







<footer>
    <!-- ---------------------- NEWSLETTER --------------------------  -->
    <div id="newsletter" class="background__primary newsletter">

        <div class="newsletter__hidden__text">
            <p id="newsletter-gracies" style="display:none"> Felicitats per prendre aquesta excel·lent decisió! Ara que estàs subscrit, 
            prometem no omplir la teva safata d'entrada amb fotos de gats... almenys no masses. 😉</p>
        </div>

        <div id="newsletter-text" class="newsletter__text">
            <p>Subscriu-te a la nostra newsletter per estar al corrent de les últimes novetats i ofertes especials! &#160 <i class="fas fa-thumbs-up" ></i> </p>
        </div>
        
        <div id="newsletter-form" class="newsletter__form">
            <div class="form-floating">
                <input type="email" class="form-control" id="email-input-news">
                <span class="span--vermell" id="error-email-input-news"></span>
                <label class="label--light" for="email-input-news"><i class="input-icon fas fa-envelope"></i> Email: </label>
            </div>   
        </div>
        
        <div id="newsletter-btn" class="newsletter__btn">
            <button id="btn-newsletter" class="btn btn-primary newsletter__btn__fix">
                Subscriure's &#160 <i class="fas fa-envelope"></i>
            </button>
        </div>

        <div class="newsletter__avis-legal">
            <p class="newsletter__avis-legal--tamany" > <a href="infoLegal.html" >Política de privacitat aquí</a>. No us enviarem correu brossa. Cancel·la la subscripció en qualsevol moment. </p>
        </div>
    </div>

    <!-- ---------------------- INICI ESPAI 1 --------------------------  -->
    <div class="footer-top">

        <!-- ------------ XARXES ------------ -->
        <div class="footer-top__xarxes">
                <i class="fab fa-facebook-f footer-top__btn"></i>
                <i class="fab fa-google footer-top__btn" ></i>
                <i class="fab fa-twitter footer-top__btn"></i>
                <i class="fab fa-github footer-top__btn" ></i>
        </div>


        <!-- ------------ EMAIL I TELEFON ------------ -->
        <div class = "footer-top__contacte ">
            <a href="404.html#Ancla-gif" ><img src="img/trustpilot.png"></a>
            <!-- Tel: <a href="tel:+376000000">+376 000 000</a> &nbsp  Email: <a href="mailto:RacóDelLlibre@andorra.ad">RacóDelLlibre@andorra.ad</a> -->
        </div>
                    
    </div>
    <hr>
    <!-- ---------------------- INICI ESPAI 2 --------------------------  -->
    <div class="footer-enlaces">

        <!-- ------------ QUI SOM qui som, Contactes, equip, geolocalització ------------ -->
        <div>
            <h4 class="no-margin">La nostra empressa<br></h4>
            <a href="quiSom.html"> Qui som? <br></a>
            <a href="contactes.html"> Contactes <br></a>
            <a href="equip.html"> Equip <br></a>
            <a href="geolocalitzacio.html">Geolocalització<br></a>
            <a href="emmagatzematge.html"> Emmagatzematge en client <br></a>
            <a href="emmagatzematgeSQL.html"> Emmagatzematge en MariaDB <br></a>
            <a href="pujaMultiplesImatges.php"> Prova pujada multiples arxius a MariaDB <br></a>
        </div>

        <!-- ------------ AJUDA ------------ -->
        <div>
            <h4 class="no-margin"> Ajuda <br></h4>
            <a href="FAQs.html"> Pagament segur amb tarja <br></a>
            <a href="FAQs.html"> Devolucions <br></a>
            <a href="FAQs.html"> Formes d'enviament <br></a>
            <a href="FAQs.html"> Preguntes freqüents <br></a>
            <a href="contactes.html"> Contacta amb nosaltres <br></a>
        </div>

        <!-- ------------ SERVEIS ------------ -->
        <div>
            <h4 class="no-margin">Serveis<br></h4>
            <a href="404.html#Ancla-gif"> Preventa <br></a>
            <a href="404.html#Ancla-gif"> Informació per editorials <br></a>
            <a href="404.html#Ancla-gif"> Venda a empreses i institucions <br></a>
            <a href="404.html#Ancla-gif"> Dwight Schrute's Random Fact Generator <br></a>
        </div>

        <!-- ------------ TEMA LEGAL ------------ -->
        <div>
            <h4 class="no-margin">Informacció legal<br></h4>
            <a href="infoLegal.html"> Avis legal <br></a>
            <a href="infoLegal.html"> Política de protección de datos <br></a>
            <a href="infoLegal.html"> Política de devoluciones y anulaciones <br></a>
            <a href="infoLegal.html"> Política de cookies <br></a>
            <a href="infoLegal.html"> Termes d'ús <br></a>
        </div>
    </div>

    <hr>
    <div class="creative"> 

        
        <div class="creative-commons__img">
            <a href="404.html#Ancla-gif"><img src="img/by-nc-nd.png" style = "display:grid;"></a>
            
        </div>

        <div class="creative-commons__WCAG">
            <a href="404.html#Ancla-gif"><img src="img/wcag.png"></a>
        </div>

        <div class="creative-commons__text">
            <p xmlns:cc="http://creativecommons.org/ns#" >This work is licensed under <a href="http://creativecommons.org/licenses/by-nc-nd/4.0/?ref=chooser-v1"
            target="_blank" rel="license noopener noreferrer" style="display:inline-block;">CC BY-NC-ND 4.0</p>
            <a href="#"><p> Tornar a dalt </p><br></a>
        </div>

    </div> 

    <!-- ---------------------- MODAL COOKIES --------------------------  -->
    <section>
        <div class="cookie__contenidor" id="contenidorCookie">
            <img class="cookie__img" src="img/Cookie.jpg">

            <h3 class="cookie__titol" >Consentiment de Cookies</h3>
            <p class="cookie__text" >Dwight Schrute (Assistant to the Regional Manager): Acceptar cookies és com fer un negoci amb la família Schrute: pots confiar-hi plenament.</p>
            <div class="registre__btn cookie__btn-accpetar" >
                <button id="boto-acceptar-cookies" class="btn btn-primary"> Accepta totes les Cookies  &nbsp; <i class="fas fa-cookie"></i> </button>
            </div> 
            <div class="registre__btn cookie__btn-denegar" >
                <button id="boto-denegar-cookies" class="btn btn-primary"> Rebutja totes les Cookies &nbsp; <i class="fas fa-ban"></i> </button>
            </div> 

        </div>

        <div class="cookie__contenidor2" id="contenidorCookieVideo" hidden>

            <img class="cookie__img" src="img/Cookie.jpg">
            <h3 class="cookie__titol" >Don't expect any cookie!</h3>

            <div class="cookie_video">
                <video id="video/No-cookie.mp4" width="100%" height="100%">
                    <source src="video/No-cookie.mp4" type="video/mp4">
                    El teu navegador no suporta el video
                </video>
            </div>
        </div>

    </section>

    <!-- scrips comunes -->

    <!-- ------------ JS SWIPER https://swiperjs.com/ ------------ -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- ------------ TOTS ELS SCRIPTS GENÈRICS ------------ -->
    <script src="js/calaix_de_sastre.js"></script>

</footer>
</html>