/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/admin.css';
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
import $ from 'jquery';

import './navbar';
import './fontawesome';


console.log('Hello Webpack Encore! Edit me in assets/app.js');

// $(document).ready(function () {
//     /*
//     Add navbar background color when scrolled
//     */
//     $(window).scroll(function () {
//         if ($(window).scrollTop() > 800) {
//             $(".navbar").addClass("bg-dark");
//         } else {
//             $(".navbar").removeClass("bg-dark");
//         }
//     });
//     // If Mobile, add background color when toggler is clicked
//     $(".navbar-toggler").click(function () {
//         if (!$(".navbar-collapse").hasClass("show")) {
//             $(".navbar").addClass("bg-dark");
//         } else {
//             if ($(window).scrollTop() < 800) {
//                 $(".navbar").removeClass("bg-dark");
//             } else {}
//         }
//     });
// });

$(document).ready(function () {
    $('[data-toggle="popover"]').popover();
});
