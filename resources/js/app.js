require("./bootstrap");

$(function() {
    $(".fechas").datepicker({
        dateFormat: "yy-mm-dd",
        minDate: new Date()
    });
});

$(document).ready(function() {
    $(".summernote").summernote({
        placeholder: "Ingresar contenido",
        height: 120,
        lang: "es-ES" // default: 'en-US'
    });
});

$(document).ready(function() {
    $("#txtbuscar").on("keyup", function() {
        var value = $(this)
            .val()
            .toLowerCase();
        $("#tablaC tr").filter(function() {
            $(this).toggle(
                $(this)
                    .text()
                    .toLowerCase()
                    .indexOf(value) > -1
            );
        });
    });
});

//GRABAR CIUDAD EVENTO
let cities = document.querySelectorAll(".cities");
if (cities) {
    cities.forEach(element => {
        element.addEventListener("click", e => {
            saveCity(e.target);
        });
    });

    const saveCity = el => {
        let fecha = document.getElementById("date" + el.value);
        if (fecha.value == "" || fecha.value.lenght == 0) {
            alert("Debes ingresar la fecha previamente.");
            el.checked = false;
            return false;
        }
        let url = el.dataset.url;
        let eli = 0;

        if (el.checked == true) {
            eli = 1;
        }

        $.ajax({
            url: url + "/" + fecha.value + "/" + eli,
            method: "GET",
            data: null,
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            async: true,
            success: function(result) {
                console.log(result);
                if (result.code == 1) {
                    let si = document.getElementById("s" + el.value);
                    si.style.visibility = "visible";
                    setTimeout(() => {
                        si.style.visibility = "hidden";
                    }, 1000);
                    if (eli == 0) {
                        fecha.value = "";
                    }
                }
            },
            error: function(data) {
                alert(data);
            }
        });
    };
}

// CELULAR
if (document.getElementById("txtcelular")) {
    document
        .getElementById("txtcelular")
        .addEventListener("keypress", function(e) {
            if (e.keyCode < 47 || e.keyCode > 57) {
                e.preventDefault();
            }
            if (this.value.length != 9) {
                this.style.background = "#ed9f8b";
            } else {
                this.style.background = "#FFF";
                return true;
            }
        });
    document
        .getElementById("txtcelular")
        .addEventListener("change", function(e) {
            if (this.value.length != 10) {
                this.style.background = "#ed9f8b";
            } else {
                this.style.background = "#FFF";
                return true;
            }
        });
    document
        .getElementById("txtcelular")
        .addEventListener("click", function(e) {
            this.value = "09";
            this.style.background = "#ed9f8b";

            return true;
        });
}

//CEDULA
if (document.getElementById("cedulatxt")) {
    document
        .getElementById("cedulatxt")
        .addEventListener("keypress", function(e) {
            if (e.keyCode < 47 || e.keyCode > 57) {
                e.preventDefault();
            }
        });

    document.getElementById("cedulatxt").addEventListener("keyup", function(e) {
        cedulaValida(this.value);
    });
}

const cedulaValida = valor => {
    var cedula = valor;

    //Preguntamos si la cedula consta de 10 digitos
    if (cedula.length == 10) {
        //Obtenemos el digito de la region que sonlos dos primeros digitos
        var digito_region = cedula.substring(0, 2);

        //Pregunto si la region existe ecuador se divide en 24 regiones
        if (digito_region >= 1 && digito_region <= 24) {
            // Extraigo el ultimo digito
            var ultimo_digito = cedula.substring(9, 10);

            //Agrupo todos los pares y los sumo
            var pares =
                parseInt(cedula.substring(1, 2)) +
                parseInt(cedula.substring(3, 4)) +
                parseInt(cedula.substring(5, 6)) +
                parseInt(cedula.substring(7, 8));

            //Agrupo los impares, los multiplico por un factor de 2, si la resultante es > que 9 le restamos el 9 a la resultante
            var numero1 = cedula.substring(0, 1);
            var numero1 = numero1 * 2;
            if (numero1 > 9) {
                var numero1 = numero1 - 9;
            }

            var numero3 = cedula.substring(2, 3);
            var numero3 = numero3 * 2;
            if (numero3 > 9) {
                var numero3 = numero3 - 9;
            }

            var numero5 = cedula.substring(4, 5);
            var numero5 = numero5 * 2;
            if (numero5 > 9) {
                var numero5 = numero5 - 9;
            }

            var numero7 = cedula.substring(6, 7);
            var numero7 = numero7 * 2;
            if (numero7 > 9) {
                var numero7 = numero7 - 9;
            }

            var numero9 = cedula.substring(8, 9);
            var numero9 = numero9 * 2;
            if (numero9 > 9) {
                var numero9 = numero9 - 9;
            }

            var impares = numero1 + numero3 + numero5 + numero7 + numero9;

            //Suma total
            var suma_total = pares + impares;

            //extraemos el primero digito
            var primer_digito_suma = String(suma_total).substring(0, 1);

            //Obtenemos la decena inmediata
            var decena = (parseInt(primer_digito_suma) + 1) * 10;

            //Obtenemos la resta de la decena inmediata - la suma_total esto nos da el digito validador
            var digito_validador = decena - suma_total;

            //Si el digito validador es = a 10 toma el valor de 0
            if (digito_validador == 10) var digito_validador = 0;

            //Validamos que el digito validador sea igual al de la cedula
            if (digito_validador == ultimo_digito) {
                document.getElementById("cedulatxt").style.background = "#fff";
                document.getElementById("btnregistrarfinal").disabled = false;

                return true;
            } else {
                document.getElementById("cedulatxt").style.background =
                    "#ed9f8b";
                document.getElementById("btnregistrarfinal").disabled = true;

                return false;
            }
        } else {
            // imprimimos en consola si la region no pertenece
            document.getElementById("cedulatxt").style.background = "#ed9f8b";
            document.getElementById("btnregistrarfinal").disabled = true;

            return false;
        }
    } else {
        //imprimimos en consola si la cedula tiene mas o menos de 10 digitos
        document.getElementById("cedulatxt").style.background = "#ed9f8b";
        document.getElementById("btnregistrarfinal").disabled = true;
        return false;
    }
};


let btnnotes = document.querySelectorAll(".asistecj");
if (btnnotes) {
    btnnotes.forEach(element => {
        element.addEventListener("click", e => {
            if (confirm("¿Estás seguro que deseas registrar la asitencia?")) {
                cargarNotas(e.target.dataset.ulr);
            } else {
                return false;
            }
        });
    });
}
const cargarNotas = tema => {
    $.ajax({
        url: tema,
        method: "GET",
        data: null,
        contentType: false,
        cache: false,
        processData: false,
        async: true,
        success: function(result) {
            if (result == 1) {
                alert("Asistencia registrad exitosamente.");
            } else {
                alert(
                    "Se produjo un error, actualice la página e intente nuevamente"
                );
            }
        },
        error: function(data) {
            alert(data);
        }
    });
};



$(document).ready(function(){
  // Add smooth scrolling to all links
  $(".acabe").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});


// let myNav = document.getElementById('nav-principal-evento');
// window.onscroll = function () { 
  
//     if (document.body.scrollTop >= 200) {
//         console.log('object')
//         myNav.classList.add("bg-white");
//         // myNav.classList.remove("nav-transparent");
//     } 
//     else {
//         myNav.classList.remove("bg-white");
//     }
// };

let navbar = document.getElementById('nav-principal-evento');
if (navbar) {
    window.onscroll = () => {
        if (window.scrollY > 300) {
            console.log('object')
            navbar.classList.add('bg-scroll');
            // navbar.classList.add('nav-active');
        } else {
            navbar.classList.remove('bg-scroll');

            // navbar.classList.remove('nav-active');
        }
    };
}

let incio = document.getElementById('fecha_inicio_tm');
if (incio) {
    let end = new Date(incio.value);

    let _second = 1000;
    let _minute = _second * 60;
    let _hour = _minute * 60;
    let _day = _hour * 24;
    let timer;

    function showRemaining() {
        let now = new Date();
        let distance = end - now;
        if (distance < 0) {

            clearInterval(timer);
            document.getElementById('countdown').classList.add('d-none');

            return;
        }
        let days = Math.floor(distance / _day);
        let hours = Math.floor((distance % _day) / _hour);
        let minutes = Math.floor((distance % _hour) / _minute);
        let seconds = Math.floor((distance % _minute) / _second);

        document.getElementById('dia_d').innerHTML = days ;
        document.getElementById('hora_d').innerHTML = hours ;
        document.getElementById('min_d').innerHTML = minutes;
        document.getElementById('seg_d').innerHTML = seconds ;
    }

    timer = setInterval(showRemaining, 1000);
}

let modal = document.getElementById('modalHome');
if (modal) {
     $(window).on('load', function() {
        $('#staticBackdropH').modal('show');
    });
}


let city = document.getElementById('ciudades_home');
if (city) {
    city.addEventListener('change', el => {
        let ciudad = el.target.value;
        let modalidad = document.getElementById('modalidadB').value;
        let tipo = document.getElementById('tipoB').value;
        let mes = document.getElementById('mesB').value;
        let url = document.getElementById('urlB').value;
        let link = `${url}/${ciudad}/${tipo}/${modalidad}/${mes}`;
        window.location.href = link;
    })
}

let mounth = document.getElementById('meses_home');
if (mounth) {
    mounth.addEventListener('change', el => {
        let mes = el.target.value;
        let modalidad = document.getElementById('modalidadB').value;
        let tipo = document.getElementById('tipoB').value;
        let ciudad = document.getElementById('ubiacionB').value;
        let url = document.getElementById('urlB').value;
        let link = `${url}/${ciudad}/${tipo}/${modalidad}/${mes}`;
        window.location.href = link;
    })
}

let eventocbo = document.getElementById("eventocbossss");
if (eventocbo) {
    eventocbo.addEventListener("change", e => {
        let url =
            document.getElementById("urlG").value +
            "/" +
            eventocbo.options[eventocbo.selectedIndex].value;
        window.location.href = url;
    });
}
