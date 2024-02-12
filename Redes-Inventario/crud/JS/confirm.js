document.addEventListener("DOMContentLoaded", function() {
    var deleteButton = document.querySelector('input[type="submit"][name="deletor"]');
    
    deleteButton.addEventListener("click", function(event) {
        if (!confirm("Desea dar de baja este producto?")) {
            event.preventDefault();
        }
    });
});
