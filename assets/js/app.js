/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.scss');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
import $ from 'jquery';
window.jQuery = $;
window.$ = $;
require('bootstrap');
require('jquery-countdown');

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');

$(document).ready(function () {
    if($(".videoIframe").length > 0){
       let windowSize=$(window).width();
       if(windowSize<560){
           $(".videoIframe").attr("width",(windowSize-50))
       }
    }
})