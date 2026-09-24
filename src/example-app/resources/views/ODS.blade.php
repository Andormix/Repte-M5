@extends('plantillas.plantilla')
@section('title', 'Home')
@section('navegacio', 'Llibres pels ODS')

@section('continguts')

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
crossorigin=""/>
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
crossorigin=""></script>


<section>
    <div class="cesta__pago background__primary">
        <p>En aquesta secció descobriràs tots els llibres gratuïts disponibles i els nostres punts de
             donació i recollida! 🌍 Uneix-te a nosaltres per impulsar la col·laboració i donar suport 
             als Objectius de Desenvolupament Sostenible (ODS). Cada llibre és una oportunitat per fer 
             del món un lloc millor! 📚✨ <br><br><a href="https://www.sostenibilitat.ad/ods/">Més info aquí</a></p> 

    </div>
</section>

<section><br>
    <!-- ------------ ZONA OFERTES ------------ -->
    <div class="section-amb-anunci__best-sellers">

        <h2 class="section-amb-anunci_titol section-amb-anunci_titol--subrayado"><u>Llibres disponibles a la nostra botiga de Sant Julià</u> </h2><hr>

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
                        </div>
                        <div class="targeta__contenidor-descripcio">
                            <h3 class="targeta__preu">Gratuït</h3>
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
                            </div>

                            <div class="modal-footer">    
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tancar</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>  
</section>

<section><br><br><br>
<div class="geolocal">

    <h2 class="geolocal__titol"><i class="input-icon fas fa-box"></i> Punts de donació i recollida - Pots enviar el llibre per correu 💌 <hr></h2> 

    <div class="geolocal__desplegable-calaix">
        <div class="form-floating form-floating--margen geolocal__desplegable">
            <select class="form-control" id="parroquias">
            </select>
            <span class="span--vermell" id="error-parroquies-opcio"></span>
            <label class=" geolocal__label--light" for="parroquias"><i class="input-icon fas fa-map-marker-alt"></i> Seleccioni un punt de recollida: </label>       
        </div>
    </div>

    <div class="geolocal__mapa background__secondary">
        <div id="mapid"></div>
    </div>

    <div class="geolocal__latitud">
        <div class="form-floating form-floating--margen  ">
            <input type="text" class="form-control" id="longitud-output" disabled>
            <label class="label--light" for="longitud-output"><i class="input-icon fas fa-compass"></i> Latitud i longitud: </label>
        </div>
    </div>

    <div class="geolocal__lloc">
        <div class="form-floating form-floating--margen ">
            <input type="text" class="form-control" id="latitud-output" disabled>
            <label class="label--light" for="latitud-output"><i class="input-icon fas fa-store"></i> Lloc: </label>
        </div>
    </div>
    

    <div class="geolocal__relleno">

    </div>
</div>
</section>


<!-- ---------------------- ODS TEXT --------------------------  -->
<section><br><br><br>
   
    <h3 class="ods-cabecera__frase background__primary"> “ Cada llibre donat és una promesa de noves aventures per a algú altre. I mentre
        fem això, construïm un món més sostenible, una història a la vegada, hehe... ”
        <br><br> - Eric Torrontera Ruiz 🕊️
    </h3>

<div class="ods-cabecera background__secondary">


    <div class="ods-cabecera__text">
        
        <p>Un dels gestos més senzills i significatius que podem fer per a contribuir als Objectius de Desenvolupament 
        Sostenible (ODS) és l'acte de regalar o deixar llibres usats perquè uns altres els utilitzin. Aquesta acció 
        s'alinea particularment amb diversos ODS, inclosos el <strong> ODS 4 (Educació de Qualitat)</strong> i el <strong>ODS 11 (Ciutats i 
        Comunitats Sostenibles)</strong>.</p>
        
        <div>
            <video id="video/ODS_4.mp4" max-width="320" max-height="240" controls>
                <source src="video/ODS_4.mp4" type="video/mp4">
                El teu navegador no suporta el video
            </video>
        </div>

        <p>En compartir llibres que ja hem llegit, no sols promovem la lectura i l'accés a l'educació, sinó que també 
        fomentem la reutilització i la reducció de deixalles. En un món on l'accés a l'educació és fonamental per a 
        l'apoderament i el desenvolupament, compartir llibres és una forma accessible i significativa de fer una diferència.</p>

        <div>
            <video id="video/ODS_1.mp4" max-width="320" max-height="240" controls>
                <source src="video/ODS_1.mp4" type="video/mp4">
                El teu navegador no suporta el video
            </video>
        </div>

        <p>A més, quan deixem llibres en llocs públics o biblioteques comunitàries, estem contribuint a la creació d'espais 
        d'aprenentatge compartits que enforteixen les comunitats locals. Estem promovent la igualtat d'accés a la informació 
        i la cultura, la qual cosa s'alinea amb el <strong>ODS 10 (Reducció de les Desigualtats)</strong> i el <strong>ODS 16 (Pau, Justícia i Institucions Sòlides)</strong>.</p>

        <div>
            <video id="video/ODS_10.mp4" max-width="320" max-height="240" controls>
                <source src="video/ODS_10.mp4" type="video/mp4">
                El teu navegador no suporta el video
            </video>
        </div>

        <p>En última instància, el simple gest de compartir llibres usats no sols enriqueix la vida dels qui els reben, 
        sinó que també contribueix a la construcció d'un món més sostenible i equitatiu. En abraçar aquesta pràctica, 
        participem en un cicle de coneixement i cultura que pot marcar la diferència en la consecució de múltiples Objectius 
        de Desenvolupament Sostenible. </p>
        <div>
            <video id="video/ODS_16.mp4" max-width="320" max-height="240" controls>
                <source src="video/ODS_16.mp4" type="video/mp4">
                El teu navegador no suporta el video
            </video>
        </div><hr>

        <img src="img/ODS2.PNG" class="ods-cabecera-img" alt="Taula amb les 17 icones representatives dels ODS">

        <p>Coneix més sobre els ODS <a href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/"> aqui</a>.</p>
    </div>
</div>
</section>



@endsection

<!-- ------------ DOM GEOLOCAL------------ -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="js/DOM_geolocal.js"></script>