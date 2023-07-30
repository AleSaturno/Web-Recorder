function togglePassword() {
    var passwordInput = document.getElementById("password");
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      document.querySelector(".toggle-password").classList.remove("fa-eye");
      document.querySelector(".toggle-password").classList.add("fa-eye-slash");
    } else {
      passwordInput.type = "password";
      document.querySelector(".toggle-password").classList.remove("fa-eye-slash");
      document.querySelector(".toggle-password").classList.add("fa-eye");
    }
  }
  