

$(document).ready(function() {
   $("#home").click(function() {
        $("#main").load("home.php")
   })
   $("#klienci").click(function() {
        $("#main").load("klienci.php")
})
    $("#operacje").click(function() {
        $("#main").load("operacje.php")
})
    $("#towary").click(function() {
        $("#main").load("towary.php")
})
});