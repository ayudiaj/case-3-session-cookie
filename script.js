    document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault();

    const email = document.getElementById("email").value.trim(); 
    const password = document.getElementById("password").value;

    // Client-side validation
    if (!validateEmail(email) || !validatePassword(password)) {
        showSwal("error","Email atau password invalid");
    } else {
        const formData = new FormData(this);
        fetch('login.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showSwal("success", data.message);
            } else {
                showSwal("error", data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showSwal("error","An error occurred. Please try again later.");
        });
    }
    });

function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function validatePassword(password) {
    return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_\-])[A-Za-z\d!@#$%^&*()_\-]{8,}$/.test(password);
}


(function($) {
    showSwal = function(type, message) {
      'use strict';
      if (type === "success") {
        
        Swal.fire({
            title: 'Login Berhasil!',
            text: message,
            icon: 'success',
            timer: 2000,
            timerProgressBar: true,
            showConfirmButton: false
          }).then(function() {
                window.location.href = "profil.php";
          });
  
      } else {
        Swal.fire({
          title: 'Error!',
          text: message,
          icon: 'error'
        });
      }
    }
  })(jQuery);
