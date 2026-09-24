@extends('plantillas.plantilla')
@section('title', 'Home')
@section('navegacio', 'Inici')

@section('continguts')
    <h2> Panel de {{ $nombreUsuario }} </h2><br>
    <div class= "background__primary">
        <p><strong>Categoria:</strong> {{ $usuario->estatus }} 
            @if ($usuario->puntos >= 50)
            <br> Tens un descompte addicional del {{ $usuario->getDescompte() }}% sobre les teves compres! Aprofita-ho al màxim 😉<br>
            @endif
        <br><strong>Punts acumulats:</strong> {{ $usuario->puntos }}</p>
    </div>
    <div class="progress-bar-container">
        <div id="progress-bar" class="progress-bar" style="width: {{ min(($usuario->puntos)*0.5, 100) }}%;"></div>
        <div class="progress-mark normal-mark" style="left: 5%;">0 punts (Normal)</div>
        <div class="progress-mark original-mark" style="left: 25%;">50 punts (Original)</div>
        <div class="progress-mark genuino-mark" style="left: 50%;">100 punts (Genuino)</div>
        <div class="progress-mark leyenda-mark" style="left: 75%;">150 punts (Leyenda)</div>
    </div><br><br><br>
    <div>
        <h2> Cistella </h2>
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
    <br><br><br></div>
    <div>
        <h2> Historial d'ordres </h2>
        @if(count($carritos) > 0)
            @foreach($carritos as $carritoOrder)
                <tr>
                    <p><strong>Data:</strong> {{ $carritoOrder->created_at->format('d/m/Y H:i:s') }} <strong>&nbsp;&nbsp;&nbsp;&nbsp;Total amb descomptes:</strong> {{ $carritoOrder->calcularTotalAmbDescompte() }}€ <strong>&nbsp;&nbsp;&nbsp;&nbsp;Order No.</strong>{{ $carritoOrder->id }}</p>
                </tr>
                    <table>
                        <thead>
                            <tr>
                                <th>Llibre</th>
                                <th>Preu unitari</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carritoOrder->carritoItems as $ordenItem)
                                <tr>
                                    <td>{{ $ordenItem->TitolLlibre() }}</td>
                                    <td>{{ $ordenItem->PreuLlibre() }}€</td>
                                    <td>{{ $ordenItem->cantidad }}</td>
                                    <td>{{ $ordenItem->Total() }}€</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </tr>
            @endforeach
        @else
            <p>No tens cap ordre al historial 🤷‍♂️</p>
        @endif
        
    </div>  
@endsection