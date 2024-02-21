
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
        editarFalla();
        editando = false;

    } else {
        objFalla.id = Date.now();
        objFalla.nombre = nombreInput.value;
        objFalla.descripcion = descInput.value;

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

    // Maneja la solicitud POST desde el formulario
app.post('/registrar', (req, res) => {
    const { nombre, apellido, email } = req.body;

    // Inserta los datos en la tabla (por ejemplo, 'Suscriptores')
    const sql = `INSERT INTO Suscriptores (nombre, apellido, email) VALUES (?, ?, ?)`;
    db.query(sql, [nombre, apellido, email], (err, result) => {
        if (err) {
            console.error('Error al insertar el registro:', err);
            res.status(500).send('Error al suscribirse');
        } else {
            console.log('Registro insertado correctamente');
            res.status(200).send('¡Gracias por suscribirte!');
        }
    });
});

// Inicia el servidor
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Servidor escuchando en el puerto ${PORT}`);
});

}

function limpiarObjeto() {
    objFalla.id = '';
    objFalla.nombre = '';
    objFalla.descripcion = '';
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
        editarBoton.onclick = () => cargarFalla(falla);
        editarBoton.textContent = 'Editar';
        editarBoton.classList.add('btn', 'btn-editar');
        parrafo.append(editarBoton);

        const eliminarBoton = document.createElement('button');
        eliminarBoton.onclick = () => eliminarFalla(id);
        eliminarBoton.textContent = 'Eliminar';
        eliminarBoton.classList.add('btn', 'btn-eliminar');
        parrafo.append(eliminarBoton);

        const hr = document.createElement('hr');

        divFallas.appendChild(parrafo);
        divFallas.appendChild(hr);


    });
}

function cargarFalla(falla) {
    const { id, nombre, descripcion } = falla;

    nombreInput.value = nombre;
    descInput.value = descripcion;

    objFalla.id = id;

    formulario.querySelector('button[type="submit"]').textContent = 'Actualizar';

    editando = true;
}

function editarFalla() {
    objFalla.nombre = nombreInput.value;
    objFalla.descripcion = descInput.value;

    listaFallas.map(falla => {
        if (falla.id === objFalla.id) {
            falla.id = objFalla.id;
            falla.nombre = objFalla.nombre;
            falla.descripcion = objFalla.descripcion;
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