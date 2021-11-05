$(document).ready(function() {
    $("button").click(function(){
        $("#table-data").load("fetch.php", {
             searchItem: document.getElementById("petname").value
        });
        document.getElementById("petname").value = " "
        return false;
    });
});