(async () => {
    try {
        const respuestaDireccionesRaw = await fetch("../controllers/ProveedoresControllerGrafica.php?op=contarProveedoresPorUbicacion");
        const NombreProducto = await respuestaDireccionesRaw.json();

        const respuestaConteoRaw = await fetch("../controllers/ProveedoresControllerGrafica.php?op=obtenerTodasLasDireccionesDeProveedores");
        const CantidadProductos = await respuestaConteoRaw.json();

        const etiquetas = NombreProducto; 
        const datos = CantidadProductos; 

        const datosProductos = {
            label: "Proveedores por ubicacion ",
            data: datos,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1,
        };

        const $grafica = document.querySelector("#grafica3");

        new Chart($grafica, {
            type: 'bar', 
            data: {
                labels: etiquetas,
                datasets: [datosProductos]
            }
        });
    } catch (error) {
        console.error("Error al cargar los datos", error);
    }
})();
