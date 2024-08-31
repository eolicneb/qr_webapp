<?php
// clases y funciones
class DatosAGuardar {
    public $tabla;
    public $campos;
    public $valores;
}

function datosAGuardar($form) {
    // Obtener los datos del formulario recibido
    $datos = new DatosAGuardar();
    foreach($form as $campo => $valor) {
        if ($campo === "tabla") {
            $datos->tabla = htmlspecialchars($valor);
        } else {
            $datos->campos[] = $campo;
            $datos->valores[] = $valor;
        }
    }
    return $datos;
}

function sqlDeInsert($datosAGuardar) {
    if (/* Validar acá los valores recibidos */ $datosAGuardar->tabla === null) {
        echo "Valores invalidos: '" . $datosAGuardar->tabla . "'";
        return null;

    } else {
        $tabla = $datosAGuardar->tabla;
        $campos = implode(", ", $datosAGuardar->campos);
        $valores = implode("', '", $datosAGuardar->valores);

        // Consulta para insertar los datos en la tabla
        $sql = "INSERT INTO $tabla ($campos) VALUES ('$valores')";

        return $sql;
    }
}

function GuardarEnConexion($datosAGuardar, $connVar) {
    // Consulta para insertar los datos en la tabla
    $sql = sqlDeInsert($datosAGuardar);
    if ($sql === null) return;

    if ($connVar->query($sql) === TRUE) {
        echo "";
    } else {
        echo "Error al guardar los datos: " . $connVar->error;
    }
}

// Conexión a la base de datos
require './connection_params.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

$datos = datosAGuardar($_POST);
GuardarEnConexion($datos, $conn);

$conn->close();
?>
