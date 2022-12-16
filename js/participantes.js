window.addEventListener("load",function(){
    const tabla=this.document.getElementById("participantes");
    var cuerpo=this.document.getElementById("cuerpoTabla");
    var cabecera=this.document.getElementById("cabeceraTabla");
  
    //Creamos el objeto Ajax
    const xhttp= new XMLHttpRequest();
    //Abrimos el objeto Ajax
    xhttp.open("GET","http://localhost/dwservidor/concursoRadio/api/participantes.php");
    //Enviamos la petición a la api
    xhttp.send();
    //Definimos la función callback
    xhttp.onreadystatechange=function(){
        //Comprobamos los códigos de status
        if(this.readyState==4 && this.status==200){
            //recogemos los datos
            const datos=JSON.parse(this.responseText);
            //Rellenamos la tabla con los datos

            //creamos filas
            for(let i=0;i<datos.length;i++){
                var fila = document.createElement("tr");
                fila.className="c-fila";
                //añadimos columnas a fila
                for(let j=1;j<Object.keys(datos[i]).length-1;j++){
                    var columna = document.createElement("td");
                    columna.className="c-columna";
                    columna.innerHTML=Object.values(datos[i])[j];
                    fila.appendChild(columna);
                }
                //añadimos la fila al cuerpo
                cuerpo.appendChild(fila);
                //añadimos los botones de borrar y editar
                fila.appendChild(addBorra());
                fila.appendChild(addEdita());
            }
        }
    }



})

/**Método que añade el botoón de borrar a la tabla */
function addBorra() {
  var borra = document.createElement("td");
  var imgBorra = document.createElement("img");
  imgBorra.src = "css/imagenes/iconos/boton-eliminar.png";
  imgBorra.className = "g-icono";
  borra.appendChild(imgBorra);
    //Evento al pulsar
  borra.addEventListener("click",function(){
    var formDatos=new FormData();
    formDatos.append("id", this.parentElement.children[0].innerHTML);
    /*const opciones={
      method:'POST',
      headers:{'Content-Type':'text/plain'},
      body: formDatos
    }*/
    fetch("api/participantes.php",{method:'POST',body: formDatos})
    .then(async data => {
      console.log(await data.text());
      if (!data) {
        return Error(data.status);
       }
        //return data;
        location.reload();
      });
    //creamos fect y se le pasa la url de la api y el body[post, data]

    //Borramos la fila
    //this.parentElement.removeChild(this);
  });
  return borra;
}

/**Método que añade el botón de editar a la tabla */
function addEdita(){
  var edita = document.createElement("td");
  var imgEdita = document.createElement("img");
  imgEdita.src = "css/imagenes/iconos/editar.png";
  imgEdita.className = "g-icono";
  edita.appendChild(imgEdita);
  return edita;
}