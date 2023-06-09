<?php
while ($row = mysqli_fetch_assoc($query)) {
/* Este código selecciona el último mensaje entre dos usuarios y lo muestra en una lista de chat.
Primero selecciona todos los mensajes en los que la ID del usuario actual coincide con la ID del
mensaje entrante o saliente, y la ID del otro usuario coincide con la ID del mensaje saliente o
entrante. Luego ordena los mensajes por ID en orden descendente y limita el resultado solo al último
mensaje. */
    $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result = "No hay mensajes disponibles";
    (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
    if (isset($row2['outgoing_msg_id'])) {
        ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "Tu: " : $you = "";
    } else {
        $you = "";
    }
    ($row['status'] == "Fuera de Línea") ? $offline = "offline" : $offline = "";
    ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";

/* ` .=` está concatenando el valor de cadena del código HTML a la variable ``. El código
HTML crea un elemento de la lista de chat con la imagen de perfil, el nombre, el último mensaje y el
estado en línea del usuario. El atributo `href` enlaza con la página de chat con el ID de usuario
correspondiente. Las variables `['unique_id']`, `['img']`, `['fname']`, `['lname']`,
``, ` ` y `` se usan para completar dinámicamente el código HTML con los valores
apropiados para cada usuario en la lista de chat. */
    $output .= '<a href="chat.php?user_id=' . $row['unique_id'] . '">
                    <div class="content">
                    <img src="php/images/' . $row['img'] . '" alt="">
                    <div class="details">
                        <span>' . $row['fname'] . " " . $row['lname'] . '</span>
                        <p>' . $you . $msg . '</p>
                    </div>
                    </div>
                    <div class="status-dot ' . $offline . '"><i class="fas fa-circle"></i></div>
                </a>';
}
