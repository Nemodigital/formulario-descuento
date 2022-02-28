<?php
// Este archivo procesa el formulario del index

// Incluimos la conexion
include_once __DIR__ . "/conexion_sqlite.php";
// configuramos la zona horaria
date_default_timezone_set('Europe/Madrid');

// Insertamos los datos cuando presionamos el botón de registrarse
if(isset($_POST["btnRegistrarse"])) {

    // OBTENEMOS LOS VALORES
    $dni = $_POST["dni"];
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $direccion = $_POST["direccion"];
    $provincia = $_POST["provincia"];
    $ciudad = $_POST["ciudad"];

    // Validar que los campos no estén vacíos
    if(empty($dni) || empty($nombre) || empty($telefono) || empty($email) || empty($direccion) || empty($provincia) || empty($ciudad)){
        // Creamos una variable para recoger el error
        $error = "Error, algunos campos obligatorios están vacíos";
        // mandamos al usuario al inicio y pasamos el error con ?error y lo codificamos con urlencode. En el index tenemos que recoger dicha variable
        header('Location: index.php?error=' . urlencode($error));
        }else {
        // Si no hay error metemos los datos en la BD
        // para saber que la persona está ya registrada lo haremos con el numero del DNI. Si ya está en la BD no puede recoger otro descuento

        // Validamos con el DNI
        $query = "SELECT * FROM registros WHERE dni = :dni";
        // creamos la variable de ejecución del query. Staiment. Y accedo a baseDatos que viene de conexion_sqlite y al método prepare para que me prepare el query
        $stmt = $baseDatos->prepare($query);
        // Llamamos a stmt y pasamos el parámetro :dni y lo vinculamos con la variable $dni y le decimos que es un string
        // con bindParam es donde vinculamos :dni con la variable $dni para que no hagan una inyección de código malicioso
        $stmt->bindParam(":dni", $dni, PDO::PARAM_STR);
        // Creamos una variable resultado y ejecutamos $stmt. Una vez se ejecuta obtenemos el registro del DNI
        $resultado = $stmt->execute();
        // Una vez se ejecuta obtenemos el registro del DNI
        // con fetch obtenemos los datos en un array
        $registroDni = $stmt->fetch(PDO::FETCH_ASSOC);

        // VALIDO SI $registroDni existe
        // Si existe da el error que no se le puede dar un descuento
        if($registroDni) {
            // recogemos el error
            $error = "Error, el D.N.I ya se encuentra registrado en nuestro sistema";
            // mandamos al usuario al inicio y pasamos el error con ?error y lo codificamos con urlencode. En el index tenemos que recoger dicha variable
            header('Location: index.php?error=' . urlencode($error));
        }else {
            // Si no está registrada, registramos TODOS LOS CAMPOS menos la fecha de creación que la agregamos dinámicamente
            // los : son parametros de posición para que no agreguen código malicioso.
            $query = "INSERT INTO registros(dni, nombre, telefono, email, direccion, provincia, ciudad)VALUES(:dni, :nombre, :telefono, :email, :direccion, :provincia, :ciudad)";

            // Preparamos el query
            $stmt = $baseDatos->prepare($query);

            // Debemos paar al bindParam las variables, no podemos pasar el dato directamente.
            // lo hacemos para cada uno de los campos
            $stmt->bindParam(":dni", $dni, PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $direccion, PDO::PARAM_STR);
            $stmt->bindParam(":provincia", $provincia, PDO::PARAM_STR);
            $stmt->bindParam(":ciudad", $ciudad, PDO::PARAM_STR);

            // ejecutamos la consulta
            $resultado = $stmt->execute();

            // Validamos. Si hubo resultado
            if($resultado == true) {
                // validar creación y obtener el último ID que sería el código
                $codigoId = $baseDatos->lastInsertId();
                // Creamos el mensaje que mostraremos en el index
                $mensaje = "Registro creado correctamente";
                // mandamos el mensaje al index con el código creado
                header('Location: index.php?mensaje=' . urlencode($mensaje) . '&codigo=' .urlencode($codigoId));
                // y salimos del programa
                exit();
            }else {
                // si no se pudo insertar por alguna razón, se generaría un error y se envía al index
                $error = "Error, no se pudo crear el registro";
                header('Location: index.php?error=' . urlencode($error));
                // salimos del programa
                exit();
            }

        }

    }
}
