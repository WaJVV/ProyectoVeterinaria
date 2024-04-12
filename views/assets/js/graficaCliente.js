(async () => {
    try {
        // Llamada a la API para obtener las direcciones (etiquetas para nuestro gráfico)
        const respuestaDireccionesRaw = await fetch("../controllers/clienteControllerGrafica.php?op=obtener_direcciones");
        const direcciones = await respuestaDireccionesRaw.json();

        // Llamada a la API para contar los clientes por ubicación (datos para nuestro gráfico)
        const respuestaConteoRaw = await fetch("../controllers/clienteControllerGrafica.php?op=contar_clientes_por_ubicacion");
        const conteoClientes = await respuestaConteoRaw.json();

        //  "conteoClientes" es un array de objetos con 'direccion' y 'cantidad',
        // y "direcciones" es un array de direcciones únicas.
        const etiquetas = direcciones; // Las direcciones actúan como etiquetas en nuestro gráfico.
        const datos = etiquetas.map(etiqueta => {
            const elemento = conteoClientes.find(el => el.direccion === etiqueta);
            return elemento ? elemento.cantidad : 0; // Si no encuentra la dirección, retorna 0
        });

        // Preparar los datos para Chart.js
        const datosClientes = {
            label: "Cantidad de clientes por dirección",
            data: datos,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1,
        };

        // Referencia al elemento canvas del DOM
        const $grafica = document.querySelector("#grafica");

        // Crear el gráfico
        new Chart($grafica, {
            type: 'bar', 
            data: {
                labels: etiquetas,
                datasets: [datosClientes]
            }
        });
    } catch (error) {
        console.error("Error al cargar los datos", error);
    }
})();