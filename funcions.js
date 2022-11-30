function eliminar() {
    document.getElementById("divEliminar").style.display = "block";
    document.getElementById("aceptar").style.display = "none";
    document.getElementById("confirmacionEliminacion").innerHTML = "Segur que vol eliminar?";
    document.getElementById("cancelar").style.display = "block";
    document.getElementById("eliminar2").style.display = "block";
}
function cancelarEliminar() {
    document.getElementById("divEliminar").style.display = "none";
}
function confirmarEliminar() {
    document.getElementById("cancelar").style.display = "none";
    document.getElementById("eliminar2").style.display = "none";
    document.getElementById("aceptar").style.display = "block";
    document.getElementById("confirmacionEliminacion").innerHTML = "S'ha eliminat correctament";
}
// JavaScript source code
