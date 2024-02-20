const http = require('http');
const fs = require('fs');
const { connectToDatabase } = require('./database');

const PORT = 3000;

const server = http.createServer(async (req, res) => {
    // Manejar las solicitudes aquí
    if (req.url === '/') {
        // Si la solicitud es para la página principal, lee el archivo HTML y envíalo como respuesta
        fs.readFile('index.html', (err, data) => {
            if (err) {
                res.writeHead(404);
                res.end('404 Not Found');
                return;
            }
            res.writeHead(200, { 'Content-Type': 'text/html' });
            res.write(data);
            res.end();
        });
    }
});

// Iniciar el servidor
server.listen(PORT, () => {
    console.log(`Servidor en funcionamiento en http://localhost:${PORT}`);
});


const mysql = require('mysql');

// Configuración de la conexión a la base de datos MySQL
const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: 'Moisescr7',
    database: 'redes'
});

// Conectar a la base de datos
connection.connect((error) => {
    if (error) {
        console.error('Error al conectar a la base de datos', error);
        throw error;
    }
    console.log('Conexión establecida a la base de datos MySQL');
});

// Agregar falla a la base de datos
function agregarFalla() {
    const sql = 'INSERT INTO dispositivos (dispositivo, ip, ubicacion) VALUES (?, ?, ?)';
    const values = [objFalla.dispositivo, objFalla.ip, objFalla.ubicacion];

    connection.query(sql, values, (error, results) => {
        if (error) {
            console.error('Error al agregar falla a la base de datos', error);
            throw error;
        }
        console.log('Falla agregada a la base de datos');
        obtenerFallas(); // Actualizar la lista de fallas después de agregar
    });
}

// Resto de las funciones (editarFalla, eliminarFalla, obtenerFallas) seguirían un patrón similar

// Cierra la conexión a la base de datos cuando la aplicación se detiene
process.on('SIGINT', () => {
    connection.end();
});

