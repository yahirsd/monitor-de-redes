let listaFallas = [];

const objFalla = {
    id: '',
    nombre: '',
    descripcion: ''
}

let editando = false;

const formulario = document.querySelector("#formulario");
const nombreInput = document.querySelector("#nombre");
const descInput = document.querySelector("#descripcion");
const btnAgrgar = document.querySelector("#btnAgregar");

formulario.addEventListener('submit', validarFormulario);

function validarFormulario(e) {
    
    e.preventDefault();

    if (nombreInput.value === '' || descInput.value === '') {
        alert("Todos los campos son obligatorios");
        return;
    }

    if (editando) {
        //editarFalla();
        editando = false;

    } else {
        objFalla.id = Date.now();
        objFalla.nombre = nombreInput.value;
        objFalla.descripcion = descInput.value;

        agregarFalla();
    }
}

function agregarFalla() {
    listaFallas.push({ ...objFalla })

    mostrarFallas();

    formulario.reset();
}

function mostrarFallas() {

    limpiarHTML();

    const divFallas = document.querySelector(".div-fallas");

    listaFallas.forEach(falla => {
        const { id, nombre, descripcion } = falla;
        const parrafo = document.createElement('p');
        parrafo.textContent = `${id} - ${nombre} - ${descripcion} - `;
        parrafo.dataset.id = id;

        const editarBoton = document.createElement('button');
        // editarBoton.onclick = () => cargarFalla(falla);
        editarBoton.textContent = 'Editar';
        editarBoton.classList.add('btn', 'btn-editar');
        parrafo.append(editarBoton);

        const eliminarBoton = document.createElement('button');
        // eliminarBoton.onclick = () => eliminarFalla(id);
        eliminarBoton.textContent = 'Eliminar';
        eliminarBoton.classList.add('btn', 'btn-eliminar');
        parrafo.append(eliminarBoton);

        const hr = document.createElement('hr');

        divFallas.appendChild(parrafo);
        divFallas.appendChild(hr);


    });
}
function limpiarHTML() {
    const divFallas = document.querySelector('.div-fallas');
    while (divFallas.firstChild) {
        divFallas.removeChild(divFallas.firstChild);
    }
}