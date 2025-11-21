document.getElementById("registroForm").addEventListener("submit", function(e) {
  e.preventDefault();
  const email = document.getElementById("email1");
  const email2 = document.getElementById("email2");
  const pass = document.getElementById("pass1");
  const pass2 = document.getElementById("pass2");
  const mensaje = document.getElementById("mensaje");

  // Resetear clases previas
  [email, email2, pass, pass2].forEach(input => input.classList.remove("error-shake"));

  if (email.value !== email2.value) {
    mensaje.textContent = "⚠️ Los emails no coinciden";
    email2.classList.add("error-shake");
    return;
  }
  if (pass.value !== pass2.value) {
    mensaje.textContent = "⚠️ Las contraseñas no coinciden";
    pass2.classList.add("error-shake");
    return;
  }
  mensaje.textContent = "✅ Registro completado con éxito";
});
