// Modal window
document.addEventListener("DOMContentLoaded", function() {
  var modals = document.getElementsByClassName("modal");
  var triggers = document.getElementsByClassName("auto-grid__item");
  var spans = document.getElementsByClassName("close");
  var buttons = document.querySelectorAll(".auto-grid__button");

  // Prevent modal trigger when clicking buttons
  buttons.forEach(function(button) {
    button.addEventListener("click", function(event) {
      event.stopPropagation();
    });
  });

  Array.prototype.forEach.call(triggers, function(trigger) {
    trigger.onclick = function() {
      var id = this.id.replace('modal-trigger-', '');
      var modal = document.getElementById('car-modal-' + id);
      modal.style.display = "block";
    };
  });

  Array.prototype.forEach.call(spans, function(span) {
    span.onclick = function() {
      var modal = this.closest('.modal');
      modal.style.display = "none";
    };
  });

  window.onclick = function(event) {
    if (event.target.classList.contains('modal')) {
      event.target.style.display = "none";
    }
  };
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


// Delete modal
