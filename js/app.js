// Modal window
document.addEventListener("DOMContentLoaded", function() {
  var modal = document.getElementById("myModal");
  var carModal = document.getElementById("car-modal");
  var span = document.getElementsByClassName("close")[0];
  carModal.onclick = function() {
    modal.style.display = "block";
  }
  span.onclick = function() {
    modal.style.display = "none";
  }
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
});

// Auth modal
document.addEventListener("DOMContentLoaded", function() {
  var authModal = document.getElementById("auth-modal");
  var loginModal = document.getElementById("auth-modal-btn");
  var close = document.getElementsByClassName("login-close")[0]; // Исправлено здесь
  loginModal.onclick = function() {
    authModal.style.display = "block";
  }
  close.onclick = function() {
    authModal.style.display = "none";
  }
  window.onclick = function(event) {
    if (event.target == authModal) {
      authModal.style.display = "none";
    }
  }
});



// Anchor
document.querySelector('.hero__anchor').addEventListener('click', function(event) {
  event.preventDefault();
  document.getElementById('auto').scrollIntoView({ behavior: 'smooth' });
});


// Preview
document.getElementById('photoInput').onchange = function(event) {
  var reader = new FileReader();
  reader.onload = function() {
    var output = document.getElementById('preview');
    output.src = reader.result;
    output.style.display = 'block';
  };
  reader.readAsDataURL(event.target.files[0]);
};