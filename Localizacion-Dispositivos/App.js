function addData() {
    var device = document.getElementById("device").value;
    var ip = document.getElementById("ip").value;
    var location = document.getElementById("location").value;

    // Crear una nueva fila en la cuadrícula
    var gridContainer = document.getElementById("divListado");
    var newRow = document.createElement("div");
    newRow.classList.add("grid-row");

    var gridContainer = document.getElementById("divListado");
    var newRow = document.createElement("div");
    newRow.classList.add("grid-row");

    gridContainer.appendChild(newRow);

    var hr = document.createElement("hr");
    newRow.appendChild(hr);

    // Crear elementos para cada celda en la fila
    var deviceCell = document.createElement("div");
    deviceCell.classList.add("grid-cell");
    deviceCell.textContent = "Dispositivo: " + device;
    deviceCell.style.color = "white"; // Cambiar el color del texto a blanco

    var ipCell = document.createElement("div");
    ipCell.classList.add("grid-cell");
    ipCell.textContent = "Dirección IP: " + ip;
    ipCell.style.color = "white"; // Cambiar el color del texto a blanco

    var locationCell = document.createElement("div");
    locationCell.classList.add("grid-cell");
    locationCell.textContent = "Ubicación: " + location;
    locationCell.style.color = "white"; // Cambiar el color del texto a blanco

    // Crear botones de editar y borrar
    var editButton = document.createElement("button");
    editButton.textContent = "Editar";
    editButton.classList.add("btn", "btn-editar");
    editButton.addEventListener("click", function() {
        // Aquí puedes implementar la lógica para editar el elemento
        function editData(deviceElement) {
            var deviceCell = deviceElement.querySelector(".device-cell");
            var newName = prompt("Ingrese el nuevo nombre para el dispositivo:", deviceCell.textContent.replace("Dispositivo: ", ""));
            if (newName !== null && newName.trim() !== "") {
                deviceCell.textContent = "Dispositivo: " + newName;
            }
        }
        alert("Editar elemento: " + device);
    });

    var deleteButton = document.createElement("button");
    deleteButton.textContent = "Borrar";
    deleteButton.classList.add("btn", "btn-eliminar");
    deleteButton.addEventListener("click", function() {
        // Aquí puedes implementar la lógica para borrar el elemento
        function deleteData(deviceElement) {
            var confirmDelete = confirm("¿Estás seguro que deseas borrar este dispositivo?");
            if (confirmDelete) {
                deviceElement.remove();
            }
        }
        
        alert("Borrar elemento: " + device);
    });

    // Agregar celdas y botones a la fila
    newRow.appendChild(deviceCell);
    newRow.appendChild(ipCell);
    newRow.appendChild(locationCell);
    newRow.appendChild(editButton);
    newRow.appendChild(deleteButton);

    // Agregar la fila a la cuadrícula
    gridContainer.appendChild(newRow);

    // Limpiar el formulario después de agregar los datos
    document.getElementById("data-form").reset();
}
// Función para editar un elemento


// Función para borrar un elemento
