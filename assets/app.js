/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';
// import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
import $ from 'jquery';

require('@fortawesome/fontawesome-free/css/all.min.css');
require('@fortawesome/fontawesome-free/js/all.js');


// import './navbar';
// import './fontawesome';

// import 'bootstrap.min.js';
// import 'jquery-3.5.1.slim.min.js';
// import 'popper.js';

// console.log('Hello Webpack Encore! Edit me in assets/app.js');

$(document).ready(function () {
    /*
    Add navbar background color when scrolled
    */
    $(window).scroll(function () {
        if ($(window).scrollTop() > 1000) {
            $(".navbar").addClass("bg-dark");
        } else {
            $(".navbar").removeClass("bg-dark");
        }
    });
    // If Mobile, add background color when toggler is clicked
    $(".navbar-toggler").click(function () {
        if (!$(".navbar-collapse").hasClass("show")) {
            $(".navbar").addClass("bg-dark");
        } else {
            if ($(window).scrollTop() < 1000) {
                $(".navbar").removeClass("bg-dark");
            } else {}
        }
    });
});

$(document).ready(function () {
    $('[data-toggle="popover"]').popover();
});
$(document).ready(function () {
    $('[data-toggle="popover"]').popover();
});

$('.carousel').carousel();

document.addEventListener("DOMContentLoaded", function () {
  let letter = 0;
  const text = " Raphaël Maillard Développeur Web";
  function typeText() {
    if (letter < text.length) {
      document.getElementById("type-js").innerHTML += text.charAt(letter);
      letter++;
      let speed = Math.floor(Math.random() * 150) + 75;
      setTimeout(typeText, speed);
    }
  }
  typeText();
});