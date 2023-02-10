

$(document).ready(function() {
    $('.select2').select2({
    closeOnSelect: true
});
});


function val(){

    var city = document.getElementById('scity').value;
    if(city == "none"){
        document.getElementById("error").innerHTML = "Select a province";
        return false;    // in failure case
    }        
    return true;    // in success case
}