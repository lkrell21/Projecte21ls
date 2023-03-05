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

// JavaScript source code
