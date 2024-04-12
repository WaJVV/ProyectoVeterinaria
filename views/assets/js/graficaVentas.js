(async () => {
    try {
        // Llamada a la API para obtener las direcciones (etiquetas para nuestro gráfico)
        const respuestaDireccionesRaw = await fetch("../controllers/productosVendidosControllerGrafica.php?op=obtener_fechas");
        const fechas = await respuestaDireccionesRaw.json();

        // Llamada a la API para contar los clientes por ubicación (datos para nuestro gráfico)
        const respuestaConteoRaw = await fetch("../controllers/productosVendidosControllerGrafica.php?op=contar_ventas_por_fecha");
        const conteoFechas = await respuestaConteoRaw.json();


        const etiquetas = fechas; 
        const datos = conteoFechas;

        // Preparar los datos para Chart.js
        const datosProductos = {
            label: "Cantidad de productos por fecha",
            data: datos,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1,
        };

        // Referencia al elemento canvas del DOM
        const $grafica = document.querySelector("#grafica2");

        // Crear el gráfico
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