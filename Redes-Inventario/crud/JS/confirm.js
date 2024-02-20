document.addEventListener("DOMContentLoaded", function() {
    var deleteButton = document.querySelectorAll('input[type="submit"][name="deletor"]');
    deleteButton.forEach(deleteB => {
        deleteB.addEventListener("click", function(event) {
            if (!confirm("Desea dar de baja este producto?")) {
                event.preventDefault();
            }
        });
    });
    
});
