<?php
/* Este código PHP se utiliza para la autenticación de usuarios. Inicia una sesión, incluye un archivo
de configuración y recupera el correo electrónico y la contraseña ingresados por el usuario a través
de un formulario. Luego verifica si el correo electrónico existe en la base de datos y si la
contraseña coincide con la contraseña cifrada almacenada en la base de datos. Si la autenticación es
exitosa, actualiza el estado del usuario a "Disponible" y establece una variable de sesión con la
identificación única del usuario. Si hay un error en el proceso de autenticación, muestra un mensaje
de error. */
session_start();
include_once "config.php";

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($email) && !empty($password)) {
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");

    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        $user_pass = md5($password);
        $enc_pass = $row['password'];

        if ($user_pass === $enc_pass) {
            $status = "Disponible";
            $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
            
            if ($sql2) {
                $_SESSION['unique_id'] = $row['unique_id'];
                echo "success"; // Devuelve "success" en caso de éxito
            } else {
                echo "Algo salió mal. ¡Inténtalo de nuevo!";
            }
        } else {
            echo "¡Correo electrónico o la contraseña son incorrectos!";
        }
    } else {
        echo "$email - ¡Este correo electrónico no existe!";
    }
} else {
    echo "¡Todos los campos de entrada son obligatorios!";
}
