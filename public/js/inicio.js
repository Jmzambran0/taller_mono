function mostrarFormulario() {
    const seleccion = document.getElementById("filterSelect").value;

    const dateFilter = document.getElementById("dateFilter");
    const empleadoFilter = document.getElementById("empleadoFilter");
    const prioridadFilter = document.getElementById("prioridadFilter");
    const titleFilter = document.getElementById("titleFilter");
    const descFilter = document.getElementById("descFilter");

    empleadoFilter.style.display = "none";
    prioridadFilter.style.display = "none";
    dateFilter.style.display = "none";
    titleFilter.style.display = "none";
    descFilter.style.display = "none";
    switch (seleccion) {
        case "empleadoFilter": empleadoFilter.style.display = "grid";
            break;
        case "prioridadFilter": prioridadFilter.style.display = "grid";
            break;
        case "dateFilter": dateFilter.style.display = "grid";
            break;
        case "titleFilter": titleFilter.style.display = "grid";
            break;
        case "descFilter": descFilter.style.display = "grid";
            break;
    }
}