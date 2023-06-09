/**
 * Esta es una función de JavaScript que envía y recupera mensajes de chat mediante XMLHttpRequest y
 * actualiza el cuadro de chat en consecuencia.
 */
const form = document.querySelector(".typing-area"),
incoming_id = form.querySelector(".incoming_id").value,
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

/* El código impide el comportamiento de envío de formulario predeterminado cuando se envía el
formulario y agrega un detector de eventos al campo de entrada para verificar si tiene algún valor.
Si el campo de entrada tiene un valor, agrega la clase "activa" al botón de envío, y si no tiene un
valor, elimina la clase "activa" del botón de envío. */
form.onsubmit = (e)=>{
    e.preventDefault();
}

inputField.focus();
inputField.onkeyup = ()=>{
    if(inputField.value != ""){
        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
}

/* Este código agrega un detector de eventos al botón de envío. Cuando se hace clic en el botón, se
crea un nuevo objeto XMLHttpRequest, se establece el método en POST y la URL en
"php/insert-chat.php". Luego establece una función de carga que verifica si la solicitud se realizó
y si el estado es 200 (OK). Si es así, borra el campo de entrada y se desplaza hasta la parte
inferior del cuadro de chat. Luego crea un nuevo objeto FormData a partir del formulario y lo envía
con el objeto XMLHttpRequest. Este código es responsable de enviar el mensaje de chat al servidor y
actualizar el cuadro de chat con el nuevo mensaje. */
sendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              inputField.value = "";
              scrollToBottom();
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
/* Este código agrega detectores de eventos al elemento chatBox para cuando el mouse ingresa y sale del
elemento. Cuando el mouse ingresa al chatBox, la clase "activa" se agrega al elemento chatBox, y
cuando el mouse sale del chatBox, la clase "activa" se elimina del elemento chatBox. Es probable que
esto se use para mostrar u ocultar ciertos elementos o características del chatBox cuando el usuario
interactúa con él. */
chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}

/* Este código usa la función setInterval para enviar repetidamente una solicitud POST a
"php/get-chat.php" cada 500 milisegundos. La solicitud incluye el valor incoming_id como parámetro.
Cuando se recibe la respuesta, el código actualiza el elemento chatBox con los nuevos datos y se
desplaza hasta la parte inferior del chat si el chatBox no está activo actualmente. Este código se
encarga de actualizar el chat en tiempo real con nuevos mensajes. */
setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            chatBox.innerHTML = data;
            if(!chatBox.classList.contains("active")){
                scrollToBottom();
              }
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("incoming_id="+incoming_id);
}, 500);

/**
 * La función se desplaza hasta la parte inferior de un elemento del cuadro de chat.
 */
function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
  }
  