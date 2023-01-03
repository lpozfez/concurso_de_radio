window.addEventListener("load",function(){
    var i=0;
    muestraDiapositivas();

    function muestraDiapositivas(){
        var j;
        const imagenes=document.getElementsByClassName("escena");
        for(j=0; j<imagenes.length;j++){
            imagenes[j].style.display="none";
        }
        i++;
        if(i>imagenes.length){
            i=1
        }
        imagenes[i-1].style.display="block";
        setTimeout(muestraDiapositivas,2000);
    }
})

