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


// Anchor
document.querySelector('.hero__anchor').addEventListener('click', function(event) {
  event.preventDefault();
  document.getElementById('auto').scrollIntoView({ behavior: 'smooth' });
});