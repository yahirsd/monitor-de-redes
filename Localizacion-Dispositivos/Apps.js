let listaFallas = [];

const objFalla = {
    id: '',
    dispositivo: '',
    ip: '',
    ubicacion: ''
}

let editando = false;

const formulario = document.querySelector("#formulario");
const dispositivoinput = document.querySelector("#dispositivo");
const ipintput = document.querySelector("#ip");
const ubicacioninput = document.querySelector("#ubicacion");
const btnAgrgar = document.querySelector("#btnAgregar");

formulario.addEventListener('submit', validarFormulario);

function validarFormulario(e) {

    e.preventDefault();

    if (dispositivoinput.value === '' || ipintput.value === '' || ubicacioninput.value==='') {
        alert("Todos los campos son obligatorios");
        return;
    }

    if (editando) {
        editarFalla();
        editando = false;

    } else {
        objFalla.id = Date.now();
        objFalla.dispositivo = dispositivoinput.value;
        objFalla.ip = ipintput.value;
        objFalla.ubicacion = ubicacioninput.value;

        agregarFalla();
    }
}

function guardarLocalStorage(listaFallas) {
    localStorage.setItem('fallas', JSON.stringify(listaFallas))
}

function obtenerLocalStorage() {
    if (localStorage.getItem('fallas') !== null) {

        listaFallas = JSON.parse(localStorage.getItem('fallas'));
        mostrarFallas();
    } else {
        alert("no hay datos");
    }
}

function agregarFalla() {
    listaFallas.push({ ...objFalla });

    guardarLocalStorage(listaFallas);
    obtenerLocalStorage();

    formulario.reset();

    limpiarObjeto();
}

function limpiarObjeto() {
    objFalla.id = '';
    objFalla.dispositivo = '';
    objFalla.ip = '';
    objFalla.ubicacion = '';
}
function mostrarFallas() {

    limpiarHTML();

    const divFallas = document.querySelector(".div-fallas");

    listaFallas.forEach(falla => {
        const { id, dispositivo, ip, ubicacion } = falla;
        const parrafo = document.createElement('p');
        parrafo.textContent = `${dispositivo}  -  ${ip}  -   ${ubicacion}  `;
        parrafo.dataset.id = id;

        const editarBoton = document.createElement('button');
        editarBoton.onclick = () => confirmarEditar(falla);
        editarBoton.textContent = 'Editar';
        editarBoton.classList.add('btn', 'btn-editar');
        parrafo.append(editarBoton);
        
        const eliminarBoton = document.createElement('button');
        eliminarBoton.onclick = () => confirmarEliminar(id);
        eliminarBoton.textContent = 'Eliminar';
        eliminarBoton.classList.add('btn', 'btn-eliminar');
        parrafo.append(eliminarBoton);
        
        function confirmarEditar(falla) {
            if (confirm('¿Estás seguro que deseas editar esta falla?')) {
                cargarFalla(falla);
            }
        }
        
        function confirmarEliminar(id) {
            if (confirm('¿Estás seguro que deseas eliminar este dispositivo?')) {
                eliminarFalla(id);
            }
        }
        
        const hr = document.createElement('hr');

        divFallas.appendChild(parrafo);
        divFallas.appendChild(hr);


    });
}

function cargarFalla(falla) {
    const { id, dispositivo, ip, ubicacion } = falla;

    dispositivoinput.value = dispositivo;
    ipintput.value = ip;
    ubicacioninput.value = ubicacion;

     objFalla.id = id;

    formulario.querySelector('button[type="submit"]').textContent = 'Actualizar';

    editando = true;
}

function editarFalla() {

    objFalla.dispositivo = dispositivo.value;
    objFalla.ip = ip.value;
    objFalla.ubicacion = ubicacion.value;

    listaFallas.map(falla => {
        if (falla.id === objFalla.id) {
            falla.dispositivo = objFalla.dispositivo;
            falla.ip = objFalla.ip;
            falla.ubicacion = objFalla.ubicacion;
        }
    });

    //  limpiarHTML();
    //mostrarFallas();
    guardarLocalStorage(listaFallas);
    obtenerLocalStorage();

    formulario.reset();

    formulario.querySelector('button[type="submit"]').textContent = 'Agregar';

    editando = false;
}

function eliminarFalla(id) {
    listaFallas = listaFallas.filter(falla => falla.id !== id);
    guardarLocalStorage(listaFallas);
    obtenerLocalStorage();

    //limpiarHTML();
    //mostrarFallas();
}

function limpiarHTML() {
    const divFallas = document.querySelector('.div-fallas');
    while (divFallas.firstChild) {
        divFallas.removeChild(divFallas.firstChild);
    }
}

function isLocalStorageEmpty() {
    return Object.keys(localStorage).length === 0;
}

obtenerLocalStorage()