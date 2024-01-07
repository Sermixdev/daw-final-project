if (document.getElementById("form")) {
  document.getElementById("form").addEventListener("submit", function (e) {
    e.preventDefault();
    sendForm();
  });
}

const inputNewsletter = document.getElementById("inputNewsletter");

function sendForm() {
  let email = document.querySelector('input[name="email"]').value;

  let formdata = new FormData();
  formdata.append("email", email);

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "app/models/newsletter.php", true);
  xhr.onload = function () {
    if (this.readyState == 4 && xhr.status == 200) {
      let response = JSON.parse(xhr.responseText);
      if (response.success) {
        Swal.fire(
          "¡Suscripción exitosa!",
          "Gracias por suscribirte a nuestra newsletter, " + email + "!",
          "success"
        );
        inputNewsletter.value = "";
      } else {
        Swal.fire("Error", "Por favor, introduce un email válido.", "error");
      }
    }
  };

  xhr.send(formdata);
}
export{};