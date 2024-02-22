document.addEventListener("DOMContentLoaded",function(){
    var submitter=document.getElementById("edit");
    submitter.addEventListener("click",function(event){
        var name=document.getElementById("name").value.trim();
        var number=document.getElementById("cant").value.trim();
        var desc=document.getElementById("desc").value.trim();
        if (name==""||number=="" ||desc=="") {
            event.preventDefault();
            alert("Alerta casillas vacias detectadas!");
        }
    });
});