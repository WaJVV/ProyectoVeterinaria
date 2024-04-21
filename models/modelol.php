
switch ($_GET["op"]) {
    case 'listar_para_tabla':
        $paciente = new Paciente();
        $pacientes = $paciente->listarTodosDb();
        $data = array();
        foreach ($pacientes as $reg) {
            $data[] = array(
                "0" => $reg->getIdMascota(),
                "1" => $reg->getNombre(),
                "2" => $reg->getRaza(),
                "3" => $reg->getPeso(),
                "4" => $reg->getNacimientoMascota(),
                "5" => $reg->getIdCliente(),
                "6" => ""

                );