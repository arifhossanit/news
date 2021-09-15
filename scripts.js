// show more comment by ajax
$(document).ready(function () {
  var count = 0; 
    $("#clicks").click(function(){
      count+=5;
      var nid =$(this).val();
      $.ajax({
          // you can use both post and get method in this syntax
          method: "POST",
          url:"includes/validation.php", 
          data: {noc: count, newsid: nid}, 
          success: function(result){
          $("#shows").html(result)
      }
      });
  });
});
// user form validation for sign-up
$(document).ready(function () 
  { 
    $('#check').click(validate); 
    function validate() 
    { 
      var dataValid = true;
      $('.required').each(function() 
      { 
        var cur = $(this); 
        cur.next('span').remove(); 
        if (cur.val() == '')  
        { 
          cur.after('<span class="form-text text-danger">Field can\'t empty! </span>'); 
          dataValid = false; 
        } 
      });
      if(!dataValid)  return false;

      $('#email').each(function() { 
          var cur = $(this); 
          cur.next('span').remove(); 
          var emailPattern = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/; 
          if (!emailPattern.test(cur.val()))  
          { 
              cur.after('<span class="form-text text-danger"> Invalid Email Id </span>'); 
              dataValid = false; 
          } 
      });
      if(!dataValid)  return false;

      $('#pass').each(function() { 
          var cur = $(this); 
          cur.next('span').remove(); 
          var passPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&-_\.])[A-Za-z\d@$!%*?&-_\.]{8,}$/; 
          if (!passPattern.test(cur.val()))  
          { 
              cur.after('<span class="form-text text-danger"> Password not strong! </span>'); 
              dataValid = false; 
          } 
      });
      if(!dataValid)  return false;

      $('#confpass').each(function() { 
          var cur = $(this); 
          cur.next('span').remove();  
          if (cur.val() !== $("#pass").val())  
          { 
              cur.after('<span class="form-text text-danger"> Password not match! </span>'); 
              dataValid = false; 
          } 
      });
      if(!dataValid)  return false;
    }
  }
);
// hover effect on news link
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
// bootstrap toast activation
$(document).ready(function(){
  $('.toast').toast('show');
});
// showing sign-in alert if not, before comment
$(document).ready(function(){
  $('#login').click(function () {
    $('#show').removeClass('d-none');
    $('#show').show();
  });
  $('.hide-alert').click(function () {
    $('#show').hide();
  });
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

// poll test
function submitPoll()
{

var radios = $(".poll_sys");
var checked = '';
for (var i = 0; i < radios.length; i++) {
if (radios[i].checked) {
var checked = 'checked';
}}
if(checked == ''){
alert("Please select an Option to participate in the poll");
radios[0].focus();
return false;
}

var radiovalue= $('input[name="poll_option"]:checked').val();
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();

}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}

xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{

document.getElementById("pollDisplay").innerHTML=xmlhttp.responseText;
}

}

xmlhttp.open("GET","poll.php?vote="+radiovalue,true);
xmlhttp.send();
return false;
}



