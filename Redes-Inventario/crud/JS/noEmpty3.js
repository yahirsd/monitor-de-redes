document.addEventListener("DOMContentLoaded",function(){
    var submitter=document.getElementById("editB");
    submitter.addEventListener("click",function(event){
        var name=document.getElementById("name").value.trim();
        var number=document.getElementById("cant").value.trim();
        if (name==""||number=="" ||desc=="") {
            event.preventDefault();
            alert("Alerta casillas vacias detectadas!");
        }
    });
});