function search(value) {
    let AjaxRequest = new XMLHttpRequest();
    AjaxRequest.onreadystatechange = function() {
        if(AjaxRequest.readyState == 4) {

            document.getElementById("data").innerHTML = AjaxRequest.responseText;
        }
    }
    let checkbox = document.querySelector('input[name="option"]:checked').value;
    AjaxRequest.open("GET", "search.php?name=" + value + "&checkbox=" + checkbox, true);
    AjaxRequest.send();
}