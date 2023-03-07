function eliminar() {
    document.getElementById("divEliminar").style.display = "block";
    //document.getElementById("aceptar").style.display = "none";
   // document.getElementById("confirmacionEliminacion").innerHTML = "Segur que vol eliminar?";
    document.getElementById("cancelar").style.display = "block";
    document.getElementById("eliminar2").style.display = "block";
}
function cancelarEliminar() {
    document.getElementById("divEliminar").style.display = "none";
    document.getElementById("divEliminar").style.display = "none";
}
function confirmarEliminar() {
    document.getElementById("cancelar").style.display = "none";
    document.getElementById("eliminar2").style.display = "none";
    document.getElementById("aceptar").style.display = "block";
    //document.getElementById("confirmacionEliminacion").innerHTML = "S'ha eliminat correctament";
    
}
function aceptarEliminarProteina(){
    document.getElementById("divEliminar").style.display = "none";
    location.href = "proteinas.php";
}
function aceptarEliminarFarmaco(){
    document.getElementById("divEliminar").style.display = "none";
    location.href = "farmacos.php";
}
function eliminarUsuarios(){
    document.getElementById("titulo").innerHTML="Eliminar usuarios";
    document.getElementById("divConsultas").style.display = "none";
    document.getElementById("divInputs").style.display = "flex";
    document.getElementById("btnEliminarUsuarios").style.display="block";
    document.getElementById("enviar").value = "2";
    document.getElementById("modificar").style.display="none";
    document.getElementById("eliminar").style.display="block";
    document.getElementById("divCrearUsuario").style.display = "none";
    /*var arrayOfElements=document.getElementsByClassName('eliminarUsuarios');
    var lengthOfArray=arrayOfElements.length;
    for (var i=0; i<lengthOfArray;i++){
        arrayOfElements[i].style.display='block';
    }
    var arrayOfElements=document.getElementsByClassName('modificarUsuarios');
    var lengthOfArray=arrayOfElements.length;
    for (var i=0; i<lengthOfArray;i++){
        arrayOfElements[i].style.display='none';
    }*/
    //document.querySelectorAll("modificarUsuarios").forEach(a=>a.style.display = "none");
    //document.querySelectorAll("eliminarUsuarios").forEach(a=>a.style.display = "block");
}
function modificarUsuarios(){
    document.getElementById("eliminar").style.display="none";
    document.getElementById("titulo").innerHTML="Modificar usuarios";
    document.getElementById("modificar").style.display="block";
    document.getElementById("btnEliminarUsuarios").style.display="none";
    document.getElementById("enviar").value = "1";
    document.getElementById("divInputs").style.display = "flex";
    document.getElementById("divConsultas").style.display = "none";
    document.getElementById("divCrearUsuario").style.display = "none";
    /*var arrayOfElements=document.getElementsByClassName('modificarUsuarios');
    var lengthOfArray=arrayOfElements.length;
    for (var i=0; i<lengthOfArray;i++){
        arrayOfElements[i].style.display='block';
    }
    var arrayOfElements=document.getElementsByClassName('eliminarUsuarios');
    var lengthOfArray=arrayOfElements.length;
    for (var i=0; i<lengthOfArray;i++){
        arrayOfElements[i].style.display='none';
    }*/
    
}
function consultarUsuarios(){
    document.getElementById("titulo").innerHTML="Listado de usuarios";
    document.getElementById("btnEliminarUsuarios").style.display="none";
    document.getElementById("enviar").value = "0";
    document.getElementById("divInputs").style.display = "none";
    document.getElementById("divConsultas").style.display = "flex";
    document.getElementById("divCrearUsuario").style.display = "none";
}
function crearUsuario(){
    document.getElementById("titulo").innerHTML="Crear nuevo usuario";
    document.getElementById("btnEliminarUsuarios").style.display="none";
    document.getElementById("enviar").value = "0";
    document.getElementById("divInputs").style.display = "none";
    document.getElementById("divConsultas").style.display = "none";
    document.getElementById("divCrearUsuario").style.display = "flex";
}
function reloadP(){
    window.addEventListener("load", (event) => {
        window.location.href = "listaUsers.php";
        crearUsuario();// already declared somewhere else
    });
    //document.location.reload();
    
}
function reload(){
    window.location.href = "listaUsers.php";
    crearUsuario();
}
//window.onload = function() {
 //   var reloading = sessionStorage.getItem("reloading");
   // if (reloading) {
     //   sessionStorage.removeItem("reloading");
       // myFunction();
    //}
//}
// JavaScript source code
