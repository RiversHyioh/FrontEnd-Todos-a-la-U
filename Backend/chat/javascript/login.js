/* Este código está manejando el envío del formulario para un formulario de inicio de sesión. Está
evitando el comportamiento predeterminado de envío de formularios y, en su lugar, utiliza
XMLHttpRequest para enviar los datos del formulario a un script PHP para su procesamiento. Si la
respuesta del script PHP es "éxito", el usuario es redirigido a una página "users.php". De lo
contrario, se muestra un mensaje de error en la página. */
const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/login.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                location.href = "users.php";
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