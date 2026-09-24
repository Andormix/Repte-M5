@extends('plantillas.plantilla')
@section('title', 'Home')
@section('navegacio', 'Inici')

@section('continguts')

<section>
    <form action="{{ route('filtrar-libros') }}" method="get">
        <div class="filtre background__primary">
            <div class="filtre__preu">
                <label for="precio_min">Preu mínim:</label>
                <input class="form-control" type="number" name="precio_min" id="precio_min" min="0" step="0.01" value= 1 >
            </div>

            <div class="filtre__preu2">
                <label for="precio_max">Preu màxim:</label>
                <input class="form-control" type="number" name="precio_max" id="precio_max" min="0" step="0.01" value=30>
            </div>
            
            <div class="filtre__categoria">
                <label for="categoria">Categoria:</label>
                <select class="form-control" name="categoria" id="categoria">
                    <option value="Totes">Totes</option>
                    <option value="Juvenil">Juvenil</option>
                    <option value="Còmics i manga">Còmics i manga</option>
                    <option value="Infantil">Infantil</option>
                    <option value="Novel·la">Novel·la</option>
                    <option value="Poesia">Poesia</option>
                    <option value="Teatre">Teatre</option>
                    <option value="Ciència-ficció">Ciència-ficció</option>
                    <option value="Història">Història</option>
                    <option value="Formació">Formació</option>
                    <option value="Idiomes">Idiomes</option>
                    <option value="Art">Art</option>
                    <option value="Biografia">Biografia</option>
                    <option value="Ciències">Ciències</option>
                    <option value="Cuina">Cuina</option>
                    <option value="Viatges">Viatges</option>
                </select>
            </div>

            <div class="filtre__btn">
                <button id="btn-login" type="submit" class="btn btn-primary">Filtrar</button>
            </div>
            
        </div>
    </form>
</section>

<section>
    <!-- ------------ ZONA OFERTES ------------ -->
    <div class="section-amb-anunci__best-sellers">

        <h2 class="section-amb-anunci_titol section-amb-anunci_titol--subrayado"><u>TOTS ELS LLIBRES</u> </h2><hr>

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
                            <h3 class="targeta__preu">Preu:{{ $llibre->preu }}€</h3>
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
                                <P><strong>ISBN:</strong> PLANETA-{{ $llibre->isbn}} <br><strong>Autor: </strong>{{ $llibre->autor }}<br><strong>Categoria: </strong>{{ $llibre->categoria }}<br> <strong>Estoc: </strong>{{$llibre->stock }}</p>
                            
                                <div class="modal-llibre">
                                    <div class="modal-llibre_img" >
                                        <img src="{{ $llibre->imatge }}" alt="01">  
                                    </div>
                                    <div class="modal-llibre__text">
                                        <p>{{$llibre->descripcio}}</p> 
                                    </div>
                                </div>
                                <div>
                                    <p><strong>Preu: </strong>{{$llibre->preu }}€</p>   
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

        <!-- Paginació -->
        <div class="pagination-container text-center mt-3">
            <span class="pagination-info">Pàgina {{ $llibres->currentPage() }} de {{ $llibres->lastPage() }}</span>
            
            @if ($llibres->hasPages())
                <nav>
                    <!-- pag anterior -->
                    @if ($llibres->onFirstPage())
                        <span class="pagination-disabled">« Anterior</span>
                    @else
                        <a href="{{ $llibres->previousPageUrl() }}" rel="prev" class="pagination-link">« Anterior</a>
                    @endif

                    <!-- pagines tot -->
                    @foreach ($llibres->getUrlRange(1, $llibres->lastPage()) as $page => $url)
                        @if ($page == $llibres->currentPage())
                            <span class="pagination-current">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="pagination-link">{{ $page }}</a>
                        @endif
                    @endforeach

                    <!-- següent -->
                    @if ($llibres->hasMorePages())
                        <a href="{{ $llibres->nextPageUrl() }}" rel="next" class="pagination-link">Següent »</a>
                    @else
                        <span class="pagination-disabled">Següent »</span>
                    @endif
                </nav>
            @endif
        </div>

    </div>  
</section>

@endsection