// summernote script
jQuery('#summernote').summernote({
    placeholder: 'Write news description',
    tabsize: 2,
    height: 100
  });

// Scripts

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

// password visibility toggle
function showPass() {
    var x = document.getElementById("myPass");
    var y = document.getElementById("iconPass");
    if (x.type === "password") {
      x.type = "text";
      y.className="fas fa-eye";
    } else {
      x.type = "password";
      y.className="fas fa-eye-slash";
    }
  }
