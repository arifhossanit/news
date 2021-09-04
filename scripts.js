$(function(){
  $('.hover-link').hover(function () {
    $(this).addClass("black-link");
    }, function () {
      $('.hover-link').removeClass("black-link");
    }
  );
})
$(function(){
  $('.hover-light').hover(function () {
    $(this).addClass("white-link");
    }, function () {
      $('.hover-light').removeClass("white-link");
    }
  );
})

$(document).ready(function(){
  $('.toast').toast('show');
});
// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the navbar
var navbar = document.getElementById("sticky-nav");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky");
    navbar.classList.remove("container");
  } else {
    navbar.classList.remove("sticky");
    navbar.classList.add("container");
  }
}

// Code for changing active link on clicking
var btns = $("#sticky-nav .navbar-nav .nav-link");

for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click",function () {
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
    });
}





