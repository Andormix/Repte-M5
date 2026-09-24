window.onload = function() { 
    mapat();
}

function mapat()
{


// Mapa leaflet
var mymap = L.map('mapid').setView([51.505, -0.09], 13);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(mymap);


setTimeout(function() 
{
    // Inicialització del mapa.
    peticioAJAX__Combobox();
    actualizarMapa();

}, 1000);


// Event listener del mapa
document.getElementById("parroquias").addEventListener('change', function() 
{
    actualizarMapa();
});

// Funció que actualitza la vista del mapa
var marker;
function actualizarMapa() 
{
    var parroquia = document.getElementById("parroquias").value.split(",");

    if (!marker) 
    {
        marker = L.marker([42.46459, 1.491946]).addTo(mymap); 
        mymap.setView([42.46459, 1.491946], 18);
        document.getElementById('longitud-output').value = "42.46459, 1.491946";
        document.getElementById('latitud-output').value = "StudiBlanc";
    } 
    else 
    {
        marker.setLatLng([parroquia[0], parroquia[1]]); 
        document.getElementById('longitud-output').value = parroquia[0]+ "," + parroquia[1];
        document.getElementById('latitud-output').value = parroquia[2];
        mymap.setView([parroquia[0], parroquia[1]], 18);
    }
    
}


/*------------------------------- AJAX SIIUUUU ----------------------------------------*/

 // Crear objecte AJAX 
 function crearObjAJAX()
 { 
    var obj; 
    //Verificacio del navegador 
    if(window.XMLHttpRequest) 
    { 
    obj = new XMLHttpRequest(); // Navegadors actuals 
    } 
    else 
    { 
        //Navegadors antics
        try 
        { 
            obj = new ActiveXObject("Microsoft.XMLHTTP"); 
        } 
        catch (e) 
        { 
            alert('El navegador emprat no suporta AJAX'); 
        } 
    } 
    return obj; 
}

// Funció que carrega les opcions dintre del combobox value[array de info] i text: opció
function llegirDadesJSON()
{ 
    if (oXML.readyState  == 4 && oXML.status == 200) 
    { 
        var DadesJSON=oXML.responseText;
        var DadesParsejades = JSON.parse(DadesJSON); //Conversió a Array Java
        var requadre_input = document.getElementById("parroquias");

        //Recórrer Array, presentar dades
        for (i = 0; i < DadesParsejades.punts.length; i++)
        {  
        var option = document.createElement("option");
        option.text = DadesParsejades.punts[i].nom;
        option.value = DadesParsejades.punts[i].latitud + "," + DadesParsejades.punts[i].longitud + "," + DadesParsejades.punts[i].lloc;
        requadre_input.add(option);
        }
    } 
}   

 //PeticiO AsIncrona 
  function peticioAJAX__Combobox()
  { 
     oXML = crearObjAJAX(); 
     oXML.onreadystatechange = llegirDadesJSON; 
     oXML.open('GET', 'json/punts_recollida.json'); 
     oXML.send(''); 
 } 
 
}