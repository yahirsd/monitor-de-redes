document.addEventListener("DOMContentLoaded", function() {
    var deleteButton = document.querySelectorAll('input[type="submit"][name="deletor"]');
    deleteButton.forEach(deleteB => {
        deleteB.addEventListener("click", function(event) {
            if (!confirm("Desea dar de baja este producto?")) {
                event.preventDefault();
            }
        });
    }); 
    var downB = document.querySelectorAll('input[type="submit"][name="deletorB"]');
    downB.forEach(down => {
        down.addEventListener("click", function(event) {
            if (!confirm("El prestador devolvio el dispositivo?\nOk para confirmar\nCancelar si no se ha devuelto el dispositivo")) {
                event.preventDefault();
            }
        });
    }); 
});