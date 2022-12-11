
window.addEventListener("load",function(){
    var cuerpo=this.document.getElementsByTagName("body")[0];
    var principal=this.document.getElementsByTagName("main")[0];
    var getMenu=this.window.location.search;
    var logout=this.document.getElementById("logout");
    var unirme=this.document.getElementById("unirme");

    console.log(logout);
    if(getMenu==='?menu=login'){
        logout.style.visibility="visible";
        unirme.style.visibility="hidden";
    }

})