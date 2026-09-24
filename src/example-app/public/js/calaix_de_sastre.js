// -------------------------- APARTAT NEWSLETTER -------------------------- //

// Comprova si ja ha enviat el seu email
if(localStorage.getItem('subscritNewsletter?') === 'true')
{
    // Si es així fes desapareixer la newsletter
    eliminarNewsletter();
}
else
{
    // Event listener per la newsletter.
    document.getElementById("btn-newsletter").addEventListener('click', function() 
    {
        canviarNewsletter();
    });

}

// Funció que canvia la newsletter.
function canviarNewsletter() 
{
    document.getElementById('newsletter-gracies').style.display = 'block';

    var div = document.getElementById('newsletter-text');
    div.remove();
    div = document.getElementById('newsletter-form');
    div.remove();
    div = document.getElementById('newsletter-btn');
    div.remove();
    localStorage.setItem('subscritNewsletter?', true);
}

// Funció que elimina l'apartat de la newsletter de la pàgina.
function eliminarNewsletter() 
{
    var div = document.getElementById('newsletter');
    div.remove();
}

// ------------------------------------------------------------------------ //









// -------------------------- APARTAT COOKIES -------------------------- //

// Comprova si l'usuari ja ha acceptat les cookies
if(localStorage.getItem('DeciditCookies?') === 'true')
{
    // Si han estat acceptades no mostris el modal
    var contenidorCookie = document.getElementById('contenidorCookie');
    contenidorCookie.hidden = true;
}

// Event listener botó acceptar
document.getElementById("boto-acceptar-cookies").addEventListener('click', function() 
{
    acceptarCookies();
    tancarFinestra();
    localStorage.setItem('DeciditCookies?', true);
});

// Event listener botó denegar
document.getElementById("boto-denegar-cookies").addEventListener('click', function() {
    denegarCookies();
    tancarFinestra();
    mostrarVideoAmagat();
    localStorage.setItem('DeciditCookies?', true);
});


// Funció que mostra totes les cookies i les mostra amb una alerta
function mostrarCookies()
{
    var cookies = document.cookie.split(';');
    var cookieString = '';

    for (var i = 0; i < cookies.length; i++) 
    {
        var cookie = cookies[i];
        while (cookie.charAt(0) == ' ') 
        {
            cookie = cookie.substring(1);
        }
        cookieString += cookie + '\n';
    }
    alert(cookieString);
}

// Funció que elimina totes les cookies
function eliminarCookies() 
{
    var cookies = document.cookie.split(";");

    for (var i = 0; i < cookies.length; i++) 
    {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var nombre = eqPos > -1 ? cookie.split("=")[0].trim() : cookie.trim();
        document.cookie = nombre + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
}

// TODO: Canviar al DOOM de registre.
function guardarCookies() 
{
    if (localStorage.getItem('cookies?') === 'true')
    {
        document.cookie = "nom-input=" + document.getElementById('nom-input').value;
        document.cookie = "cognoms-input=" + document.getElementById('cognoms-input').value;
        document.cookie = "email-input=" + document.getElementById('email-input').value;
        document.cookie = "telefon-input=" + document.getElementById('telefon-input').value;
        document.cookie = "contrasenya-input=" + document.getElementById('contrasenya-input').value;
        document.cookie = "naixement-input=" + document.getElementById('naixement-input').value;
        document.cookie = "paisos-opcio=" + document.getElementById('paisos-opcio').value;
        document.cookie = "parroquies-opcio=" + document.getElementById('parroquies-opcio').value;
        document.cookie = "postal-opcio=" + document.getElementById('postal-opcio').value;
        document.cookie = "adreca-input=" + document.getElementById('adreca-input').value;
        document.cookie = "IBAN-input=" + document.getElementById('IBAN-input').value;
        document.cookie = "BIC-opcio=" + document.getElementById('BIC-opcio').value;
    }   
}

// Accepta les cookies - alerta
function acceptarCookies() 
{
    localStorage.setItem('cookies?', true);
    alert("Has activat totes les cookies del lloc web. Per motius de testing si tornes a la pàgina d'inici es farà un reset de la finestra de cookies i newsletter (localStorage) localStorage.setItem('DeciditCookies?', false) localStorage.setItem('subscritNewsletter?', false)");
}

// Denegació de cookies - alerta
function denegarCookies()
{
    localStorage.setItem('cookies?', false);
    alert("Has desactivat totes les cookies del lloc web. Per motius de testing si tornes a la pàgina d'inici es farà un reset de la finestra de cookies i newsletter (localStorage) localStorage.setItem('DeciditCookies?', false) localStorage.setItem('subscritNewsletter?', false) ");
}

// Tanca la finestra modal de les cookies
function tancarFinestra() 
{
    var contenidorCookie = document.getElementById('contenidorCookie');
    contenidorCookie.hidden = true;
}

// Mostra easter egg de les cookies.
function mostrarVideoAmagat()
{
    var contenidorCookieVideo = document.getElementById('contenidorCookieVideo');
    contenidorCookieVideo.hidden = false;
    
    var video = document.getElementById('video/No-cookie.mp4');
    video.play();

    video.addEventListener('ended', function() 
    {
        video.pause();
        contenidorCookieVideo.hidden = true;
    });
}

// --------------------------------------------------------------------- //









// -------------------------- VALIDADORS GENÈRICS -------------------------- //

function validadorNom()
{
    var regName = /^[a-zA-Z]+$/;

    if(!regName.test(this.value))
    {
        this.nextElementSibling.innerText = "Estàs segur que el teu nom real és " + this.value +"?";
        this.classList.remove('is-valid');
        this.classList.add('is-invalid');
        agitarContenedor(this.id);
    }
    else
    {
        this.nextElementSibling.innerText = "";
        this.classList.remove('is-invalid');
        this.classList.add('is-valid');
    }
}

function validadorCognoms()
{
    var regName = /^[a-zA-Z]+ [a-zA-Z]+$/;

    if(!regName.test(this.value))
    {
        this.nextElementSibling.innerText = "Ingressa dos cognoms separats amb un espai.";
        this.classList.remove('is-valid');
        this.classList.add('is-invalid');
        agitarContenedor(this.id);
    }
    else
    {
        this.nextElementSibling.innerText = "";
        this.classList.remove('is-invalid');
        this.classList.add('is-valid');
    }
}

function validadorEmail()
{
    var regName = /\S+@\S+\.\S+/;

    if(!regName.test(this.value))
    {
        this.nextElementSibling.innerText = "Sense estructura, el teu correu és un caos digital. ElTeuCorreu@proveïdor.algo";
        this.classList.remove('is-valid');
        this.classList.add('is-invalid');
        agitarContenedor(this.id);
    }
    else
    {
        this.nextElementSibling.innerText = "";
        this.classList.remove('is-invalid');
        this.classList.add('is-valid');
    }
}

function validadorTelefon()
{
    var regName = /^\+?376(?:\s?\d{2}\s?\d{2}\s?\d{2}|\-\d{3}\-\d{3}|\s\d{3}\s\d{3}|\-\d{6})$/;

    if(!regName.test(this.value))
    {
        this.nextElementSibling.innerText = " Únicament podem entrar telèfons Andorrans. "+ 
        "Format +376-XXX-XXX / +376 XXX XXX / +376 XX XX XX / +376-XXXXXX.";

        this.classList.remove('is-valid');
        this.classList.add('is-invalid');
        agitarContenedor(this.id);
    }
    else
    {
        this.nextElementSibling.innerText = "";
        this.classList.remove('is-invalid');
        this.classList.add('is-valid');
    }
}

function validadorContrasenya()
{
    var regName = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d.*\d).{6,}$/;

    if(!regName.test(this.value))
    {
        this.nextElementSibling.innerText = "La contrasenya ha de disposar de com a mínim una lletra majúscula, una minúscula, 2 dígits " + 
        "numèrics i una llargada mínima de 6 caràcters en total.";
        this.classList.remove('is-valid');
        this.classList.add('is-invalid');
        agitarContenedor(this.id);
        return false;
    }
    else
    {
        this.nextElementSibling.innerText = "";
        this.classList.remove('is-invalid');
        this.classList.add('is-valid');
        return true;
    }
}

function validadorSegonaContrasenya()
{
    var regName = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d.*\d).{6,}$/;

    if(!regName.test(this.value))
    {
        this.nextElementSibling.innerText = "La contrasenya ha de disposar de com a mínim una lletra majúscula, una minúscula, 2 dígits " + 
        "numèrics i una llargada mínima de 6 caràcters en total.";
        this.classList.remove('is-valid');
        this.classList.add('is-invalid');
        agitarContenedor(this.id);
    }
    else if(document.getElementById("contrasenya-input").hasAttribute('is-invalid'))
    {
        this.nextElementSibling.innerText = "Les contrasenyes no coincideixen.";
        this.classList.remove('is-valid');
        this.classList.add('is-invalid');
        agitarContenedor(this.id);

    }
    else
    {
        this.nextElementSibling.innerText = "";
        this.classList.remove('is-invalid');
        this.classList.add('is-valid');
    }
}

function validadorEdad() 
{

    var nacimiento = new Date(this.value);
    var hoy = new Date();
    var edad = hoy.getFullYear() - nacimiento.getFullYear();
    var m = hoy.getMonth() - nacimiento.getMonth();

    if (m < 0 || (m === 0 && hoy.getDate() < nacimiento.getDate())) 
    {
        edad--;
    }
    if (edad < 18) 
    { 
        this.nextElementSibling.innerText = "Has de tindre almenys 18 anys per poder registrar-te";
        this.classList.remove('is-valid');
        this.classList.add('is-invalid');
        agitarContenedor(this.id);    
    } 
    else 
    {
        this.classList.remove('is-invalid');
        this.classList.add('is-valid');
        this.nextElementSibling.innerText = "";
    }
}

function validadorPoblacio()
{
    if(this.value !== '-')
    {

        this.nextElementSibling.innerTex = ""
        this.classList.remove('is-invalid');
        this.classList.add('is-valid');
    }
    else
    {
        this.nextElementSibling.innerTex = "Tria la parròquia més cool de totes";
        this.classList.remove('is-valid');
        this.classList.add('is-invalid');
        agitarContenedor(this.id);
    }
}

function actualitzarCP() 
{
    const postalOpcio = document.getElementById('postal-opcio');

    switch (this.value) 
    {
        case '-':
            postalOpcio.value = '-';
            break;
        case 'Andorra la Vella':
            postalOpcio.value = 'AD100';
            break;
        case 'Canillo':
            postalOpcio.value = 'AD500';
            break;
        case 'Encamp':
            postalOpcio.value = 'AD200';
            break;
        case 'Escaldes-Engordany':
            postalOpcio.value = 'AD700';
            break;
        case 'La Massana':
            postalOpcio.value = 'AD400';
            break;
        case 'Ordino':
            postalOpcio.value = 'AD300';
            break;
        case 'Sant Julià de Lòria':
            postalOpcio.value = 'AD600';
            break;
        default:
            postalOpcio.value = '';
    }
}

function validarPoblacionCP() 
{
    actualitzarCP.call(document.getElementById(this.id));
    validadorPoblacio.call(document.getElementById(this.id));
}

function validadorAdreca()
{
    var regName = /^[a-zA-Z0-9\s,.'-]{3,}$/;

    if(!regName.test(this.value))
    {
        this.nextElementSibling.innerText = "Estàs segur que la teva adreça és " + this.value + "?";
        this.classList.remove('is-valid');
        this.classList.add('is-invalid');
        agitarContenedor(this.id);
    }
    else
    {
        this.nextElementSibling.innerText = "";
        this.classList.remove('is-invalid');
        this.classList.add('is-valid');
    }
}

function validadorBIC()
{
    if(this.value !== '-')
    {

        this.nextElementSibling.innerTex = ""
        this.classList.remove('is-invalid');
        this.classList.add('is-valid');
    }
    else
    {
        this.nextElementSibling.innerTex = "Tria el teu boli BIC";
        this.classList.remove('is-valid');
        this.classList.add('is-invalid');
        agitarContenedor(this.id);
    }
}

function validadorIBAN()
{
    var regName = /^AD\d{22}$/;

    if(!regName.test(this.value))
    {
        this.nextElementSibling.innerText = "Ooops! Si estàs buscant conversa, l'IBAN no és l'amistat que necessites, ja que és només un número de compte! Comprova el format!";
        this.classList.remove('is-valid');
        this.classList.add('is-invalid');
        agitarContenedor(this.id);
    }
    else
    {
        this.nextElementSibling.innerText = "";
        this.classList.remove('is-invalid');
        this.classList.add('is-valid');
    }
}

function validacioBoto(ID, num) {
   
    var inputs = document.querySelectorAll('.form-control');
    var validCount = 0;

    for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].classList.contains('is-valid')) {
            validCount++;
        }
    }

    var registerButton = document.getElementById(ID);
    if (validCount === num && validadorCheckbox()) 
    {
        registerButton.removeAttribute('disabled');
    }
    else 
    {
        registerButton.setAttribute('disabled', 'disabled');
    }
} 


function validadorCheckbox() 
{
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    var alMenosUnoMarcado = false;

    checkboxes.forEach(function(checkbox) 
    {
        if (checkbox.checked) 
        {
            alMenosUnoMarcado = true;
        }
    });

    if (alMenosUnoMarcado) 
    {
        return true;
    } 
    else 
    {
        return false;
    }
}

function agitarContenedor(ID) 
{
    var container = document.getElementById(ID);
    container.classList.add('moure-contenidor');

    setTimeout(function() 
    {
      container.classList.remove('moure-contenidor');
    }, 1000);
}


window.addEventListener('load', function() 
{
    associaDOMevents(); 
});
    
function associaDOMevents() 
{
 

    document.getElementById("email-input-login").onchange = validadorEmail;
    //document.getElementById("email-input-news").onchange = validadorEmail;
    document.getElementById("contrasenya-input-login").onchange = validadorContrasenya;


}
// ------------------------------------------------------------------------- //










// -------------------------- TRAKING D'USUARIS -------------------------- //

// Data de la ultima visita
localStorage.setItem('00-ultimaVisita', new Date().toString());
localStorage.setItem('01-ultimaURL', window.location.href);

// Comptador vegades que han passat per les pàgines:
switch (window.location.pathname.split('/').pop()) 
{
    case 'index.html':

        var visitsIndex = parseInt(localStorage.getItem('02-visitesIndex')) || 0;
        visitsIndex++;
        localStorage.setItem('02-visitesIndex', visitsIndex);
        break;

    case '404.html':

        var visitsIndex = parseInt(localStorage.getItem('03-visites404')) || 0;
        visitsIndex++;
        localStorage.setItem('03-visites404', visitsIndex);
        break;
      
    case 'temes.html':
        var visitsIndex = parseInt(localStorage.getItem('04-visitesTemes')) || 0;
        visitsIndex++;
        localStorage.setItem('04-visitesTemes', visitsIndex);
        break;

    case 'literatura.html':
        var visitsIndex = parseInt(localStorage.getItem('05-visitesLiteratura')) || 0;
        visitsIndex++;
        localStorage.setItem('05-visitesLiteratura', visitsIndex);
        break;

    case 'juvenil.html':
        var visitsIndex = parseInt(localStorage.getItem('06-visitesJuvenil')) || 0;
        visitsIndex++;
        localStorage.setItem('06-visitesJuvenil', visitsIndex);
        break;

    case 'ebooks.html':
        var visitsIndex = parseInt(localStorage.getItem('07-visitesEbooks')) || 0;
        visitsIndex++;
        localStorage.setItem('07-visitesEbooks', visitsIndex);
        break;

    case 'ODS.html':
        var visitsIndex = parseInt(localStorage.getItem('08-visitesODS')) || 0;
        visitsIndex++;
        localStorage.setItem('08-visitesODS', visitsIndex);
        break;
}


// ---------------------------------------------------------------------- //









// -------------------------- CONTROL AUDIOVISUAL -------------------------- //

function playPause(video) 
{ 
    if (video.paused)
    {
        video.play(); 
    } 
    else
    {
        video.pause();
    } 
} 

function muteVideo(video) 
{
    
    if(video.muted)
    {
        video.muted = false;
    }
    else
    {
        video.muted = true;
    }
}

function playVideo(video) {
    if (isPageVisible) {
        video.play();
    }
}

function pauseVideo(video) {
    if (isPageVisible) {
        video.pause();
    }
}

function playVideoMouseover(video) 
{
    video.play();
}

function pauseVideoMouseover(video) 
{
   
    video.pause();
}


// --------------------------------------------------------------------------- //









// -------------------------- SLIDER SWIPER -------------------------- //
document.addEventListener("DOMContentLoaded", function() 
{

    if (document.querySelector('.mySwiper1')) 
    {
        var mySwiper1 = new Swiper('.mySwiper1', {
            slidesPerView: 5,
            freeMode: true,   // Habilitar el freemode
            slidesOffsetAfter: 50,
            slidesOffsetBefore: 70,
            loop: true, // permite un bucle infinito
            loopAdditionalSlides: 1, // muestra un slide adicional antes y después
            speed: 15000, // velocidad de deslizamiento en milisegundos
            autoplay: {
                delay: 3000, // cambia la diapositiva cada 3 segundos
                disableOnInteraction: false, // permite la interacción del usuario durante la reproducción automática
            },
            navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
            },
            pagination: {
            el: '.swiper-pagination',
            clickable: true, 
            
            },
            breakpoints: {
            400: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            600: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            800: {
                slidesPerView: 3,
                spaceBetween: 40,
            },
            1000: {
                slidesPerView: 4,
                spaceBetween: 50,
            },
            1200: {
                slidesPerView: 5,
                spaceBetween: 60,
            },
            1400: {
                slidesPerView: 6,
                spaceBetween: 60,
            },
            },
        });    
    } 
}); 

// ------------------------------------------------------------------- //
