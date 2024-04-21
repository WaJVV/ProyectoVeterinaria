(async () => {
    try {
        const respuestaDireccionesRaw = await fetch("../controllers/ProductosControllerGrafico.php?op=obtenerProductos");
        const NombreProducto = await respuestaDireccionesRaw.json();

        const respuestaConteoRaw = await fetch("../controllers/ProductosControllerGrafico.php?op=obtenerStockDeProductos");
        const CantidadProductos = await respuestaConteoRaw.json();

        const etiquetas = NombreProducto; 
        const datos = CantidadProductos; 

        const datosProductos = {
            label: "Cantidad de productos por stock",
            data: datos,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1,
        };

        const $grafica = document.querySelector("#grafica2");

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
