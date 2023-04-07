
//passcode launch Thanks Cathy A Fisher! You're the bestest

function launchAuth() {
	var passcode = prompt("Enter your passcode:");
	deleteCookie("passcode");
	document.cookie = "passcode" + passcode;
	location.reload();
	}
	
function deleteCookie(name){
	document.cookie = name + "=; expires= Thu, 01 Jan 1970 00:00:01 GMT";
	}

// apply different header layout on homepage  
  $(function() {
    var loc = window.location.href; // returns the full URL
    if(window.location.pathname == '/') {
      $('header').removeClass('narrow');
      $('nav a').addClass('button')
    }
  });

// shrink header on scroll
var className = "shrink";
var scrollTrigger = 60;

window.onscroll = function() {
  // We add pageYOffset for compatibility with IE.
  if (window.scrollY >= scrollTrigger || window.pageYOffset >= scrollTrigger) {
    document.getElementsByTagName("header")[0].classList.add(className);
  } else {
    document.getElementsByTagName("header")[0].classList.remove(className);
  }
};


//lightbox
function openModal() {
  document.getElementById('myModal').style.display = "flex";
}

function closeModal() {
  document.getElementById('myModal').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
	
