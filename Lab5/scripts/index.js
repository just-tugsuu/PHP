function search(value) {
    let AjaxRequest = new XMLHttpRequest();
    AjaxRequest.onreadystatechange = function() {
        if(AjaxRequest.readyState == 4) {

            document.getElementById("data").innerHTML = AjaxRequest.responseText;
        }
    }
    
    AjaxRequest.open("GET", "search.php?name=" + value, true);
    AjaxRequest.send();
}