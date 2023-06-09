/* Este código maneja el envío de formularios usando AJAX. Selecciona el elemento de formulario del
documento HTML, evita el comportamiento de envío de formulario predeterminado y agrega un detector
de eventos de clic al botón de envío. Cuando se hace clic en el botón, crea un objeto
XMLHttpRequest, establece el método HTTP en POST y especifica la URL a la que se enviarán los datos
del formulario. Luego establece una función de devolución de llamada que se ejecutará cuando se
reciba la respuesta del servidor. Si el estado de respuesta es 200 y los datos de respuesta son
"éxito", redirige al usuario a la página "users.php". De lo contrario, muestra un mensaje de error
en la página. Finalmente, crea un nuevo objeto FormData a partir de los datos del formulario y lo
envía al servidor utilizando el objeto XMLHttpRequest. */
const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                location.href="users.php";
              }else{
                errorText.style.display = "block";
                errorText.textContent = data;
              }
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}