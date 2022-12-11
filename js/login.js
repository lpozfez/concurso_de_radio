//En la página de Login la cabecera y el ie no se muestran
window.addEventListener("load",function(){
    //capturamos body
    var cuerpo=this.document.getElementsByTagName("body")[0];
    //capturamos main
    var principal=this.document.getElementsByTagName("main")[0];
    //capturamos el lugar donde nos encontramos
    var getMenu=this.window.location.search;
    // Si el lugar en el que nos encontramos es Login, cambiamos el layout de main
    if(getMenu==='?menu=login'){
        principal.style.gridColumnEnd='1';
        principal.style.gridColumnEnd='3';
        cuerpo.style.gridTemplateAreas='"main" "main" "main"'; 
    }
})