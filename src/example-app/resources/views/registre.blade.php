@extends('plantillas.plantilla')
@section('title', 'Home')
@section('navegacio', 'Inici')

@section('continguts')

<section class="background__secondary">
    <h2 class="registre__titol"> Formulari de registre </h2><hr>

    <form class="registre" action="{{ route('registrar') }}" method="post">
    @csrf

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <div class="registre-c1" >

            <div class="form-floating form-floating--margen form-floating--max-width  ">
                <input name="name" type="text" class="form-control" id="nom-input">
                <span class="span--vermell" id="error-nom-input"></span>
                <label class="label--light" for="nom-input"><i class="input-icon fas fas fa-user"></i> Nom: </label>
            </div>

            <div class="form-floating form-floating--margen form-floating--max-width ">
                <input type="text" class="form-control" id="cognoms-input" name="cognoms-input">
                <span class="span--vermell" id="error-cognoms-input"></span>
                <label class="label--light" for="cognoms-input"><i class="input-icon fas fas fa-user"></i> Cognoms: </label>
            </div>

            <div class="form-floating form-floating--margen form-floating--max-width ">
                <input name="email" type="email" class="form-control" id="email-input">
                <span class="span--vermell" id="error-email-input"></span>
                <label class="label--light" for="email-input"><i class="input-icon fas fa-envelope"></i> Email: </label>
            </div>   

            <div class="form-floating form-floating--margen form-floating--max-width ">
                <input type="tel" class="form-control" id="telefon-input" name="telefon-input">
                <span class="span--vermell" id="error-telefon-input"></span>
                <label class="label--light" for="telefon-input"><i class="input-icon fas fa-phone"></i> Telèfon: </label>
            </div>

            <div class="form-floating form-floating--margen form-floating--max-width ">
                <input name="password" type="password" class="form-control" id="contrasenya-input">
                <span class="span--vermell" id="error-contrasenya-input"></span>
                <label class="label--light" for="contrasenya-input"><i class="input-icon fas fa-lock"></i> Contrasenya: </label>
            </div>

            <div class="form-floating form-floating--margen form-floating--max-width ">
                <input name="password_confirmation" type="password" class="form-control" id="segona-contrasenya-input">
                <span class="span--vermell" id="error-contrasenya2-input"></span>
                <label class="label--light" for="segona-contrasenya-input"><i class="input-icon fas fa-lock"></i> Repeteix la contrasenya: </label>
            </div>
        </div>

        <div class="registre-c2">

            <div class="form-floating form-floating--margen form-floating--max-width ">
                <input type="date" class="form-control" id="naixement-input">
                <span class="span--vermell" id="error-naixement-input"></span>
                <label class="label--light" for="naixement-input"><i class="input-icon far fa-calendar-alt"></i> Data de naixement: </label>
            </div>

            <div class="form-floating form-floating--margen form-floating--max-width">
                <select class="form-control" id="paisos-opcio">
                    <option value="Andorra">Andorra</option>
                    <option value="Espanya" disabled>Espanya</option>
                    <option value="França" disabled>França</option>
                </select>
                <label class="label--light" for="paisos-opcio"><i class="input-icon fas fa-globe"></i> País: </label>
            </div> 

            <div class="form-floating form-floating--margen form-floating--max-width  ">
                <input type="text" class="form-control" id="ciutat-input">
                <span class="span--vermell" id="error-ciutat-input"></span>
                <label class="label--light" for="ciutat-input"><i class="input-icon fas fas fa-home"></i> Ciutat: </label>
            </div>

            <div class="form-floating form-floating--margen form-floating--max-width  ">
                <input type="text" class="form-control" id="postal-input">
                <span class="span--vermell" id="error-postal-input"></span>
                <label class="label--light" for="postal-input"><i class="input-icon fas fas fa-home"></i> Codi postal: </label>
            </div>
            
            <div class="form-floating form-floating--margen form-floating--max-width  ">
                <input type="text" class="form-control" id="adreca-input">
                <span class="span--vermell" id="error-adreca-input"></span>
                <label class="label--light" for="adreca-input"><i class="input-icon fas fa-mail-bulk"></i> Adreça: </label>
            </div>
        </div>
    
        <h2 class="registre__titol3">Ajuda'ns a personalitzar la teva experiència <hr></h2>

        <div class="registre-checklist">

            <p> El teu gust és la nostra brúixola. Indica'ns els temes que 
                t'interessen i et guiararem cap a una biblioteca i newsletter
                personalitzada.
            </p>

            <div class="registre-checklist__contingut">

                <div class="registre-checklist__f1">
                    <label class="custom-checkbox">Ficció
                        <input type="checkbox" name="ficcio">
                        <span class="checkmark"></span>
                    </label>

                    <label class="custom-checkbox">No ficció
                        <input type="checkbox"  name="no-ficcio">
                        <span class="checkmark"></span>
                    </label>

                    <label class="custom-checkbox">Misteri
                        <input type="checkbox" name="misteri">
                        <span class="checkmark"></span>
                    </label>

                    <label class="custom-checkbox">Romàntic
                        <input type="checkbox"  name="romantic">
                        <span class="checkmark"></span>
                    </label>

                    <label class="custom-checkbox">Ciència Ficció
                        <input type="checkbox"  name="ciencia-ficcio">
                        <span class="checkmark"></span>
                    </label>

                    <label class="custom-checkbox">Aventura
                        <input type="checkbox" name="aventura">
                        <span class="checkmark"></span>
                    </label>   
                </div>
                
                <div class="registre-checklist__f2">
                    <label class="custom-checkbox">Suspens
                        <input type="checkbox" name="suspens">
                        <span class="checkmark"></span>
                    </label>
                    
                    <label class="custom-checkbox">Terror
                        <input type="checkbox" name="terror">
                        <span class="checkmark"></span>
                    </label>

                    <label class="custom-checkbox">Històric
                        <input type="checkbox" name="historic">
                        <span class="checkmark"></span>
                    </label>

                    <label class="custom-checkbox">Biografia
                        <input type="checkbox" name="biografia">
                        <span class="checkmark"></span>
                    </label>

                    <label class="custom-checkbox"> <a style="color:black; text-decoration: none;"href="404.html#Ancla-gif">The Office</a>
                        <input type="checkbox" name="autobiografia">
                        <span class="checkmark"></span>
                    </label>
                    
                    <label class="custom-checkbox">Assaig
                        <input type="checkbox" name="assaig">
                        <span class="checkmark"></span>
                    </label>
                    
                </div>

                <div class="registre-checklist__f3">

                    <label class="custom-checkbox">Conte
                        <input type="checkbox" name="conte">
                        <span class="checkmark"></span>
                    </label>
                    
                    <label class="custom-checkbox">Drama
                        <input type="checkbox" name="drama">
                        <span class="checkmark"></span>
                    </label>
                    
                    <label class="custom-checkbox">Humor
                        <input type="checkbox" name="humor">
                        <span class="checkmark"></span>
                    </label>
                    
                    <label class="custom-checkbox">Poesia
                        <input type="checkbox" name="poesia">
                        <span class="checkmark"></span>
                    </label>
                    
                    <label class="custom-checkbox">Filosofia
                        <input type="checkbox" name="filosofia">
                        <span class="checkmark"></span>
                    </label>
                    
                    <label class="custom-checkbox">Ciència i tecnologia
                        <input type="checkbox" name="ciencia-i-tecnologia">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
        </div>

        <div class="registre__btn">
            <button id="boto-registre" class="btn btn-primary"> Registrar-se &#160 <i class="fas fa-user"></i> </button>
        </div> 
    </form> 
</section>

@endsection