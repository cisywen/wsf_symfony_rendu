/**
 * Created by shuwen on 20/09/2017.
 */
// loads the jquery package from node_modules
var $ = require('jquery');

// import the function from greet.js (the .js extension is optional)
// ./ (or ../) means to look for a local file
var greet = require('./greet');

$(document).ready(function() {
    $('h1').html(greet('john'));
});