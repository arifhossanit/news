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
// side navbar


function openNav() {
  var x=document.getElementById("on");
  if (x.className === "topnav") {
    document.getElementById("hide").style.width = "0px";
    document.getElementById("expand").style.marginLeft = "0px";
    document.getElementById("navexpand").style.marginLeft = "0px";
    x.className = "responsive";
  } else {
    document.getElementById("hide").style.width = "200px";
    document.getElementById("expand").style.marginLeft= "200px";
    document.getElementById("navexpand").style.marginLeft= "200px";
    x.className = "topnav";
  }
}