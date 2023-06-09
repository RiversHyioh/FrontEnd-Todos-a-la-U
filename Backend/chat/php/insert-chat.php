<?php 
/* Este código PHP es responsable de insertar un nuevo mensaje en la tabla de la base de datos
`mensajes`. Primero inicia una sesión y verifica si la variable de sesión `unique_id` está
configurada. Si está configurado, incluye el archivo `config.php` que contiene los detalles de la
conexión a la base de datos. Luego recupera los valores `incoming_id` y `message` de la matriz
`` y los desinfecta usando la función `mysqli_real_escape_string()` para evitar ataques de
inyección SQL. Luego inserta el mensaje en la tabla `mensajes` usando una consulta SQL. Si el valor
del `mensaje` está vacío, no inserta nada. Si la variable de sesión `unique_id` no está configurada,
redirige al usuario a la página de inicio de sesión. */
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
        }
    }else{
        header("location: ../login.php");
    }


    
?>