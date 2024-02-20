const mysql = require("mysql")

const conection = mysql.createConnection({
    host:'localhost',
    user:'root',
    password:'root',
    database:'fallas'
})

conection.connect((err) => {
    if(err) throw err
    console.log('la conexion funciona')
})

conection.query('Select * from tabla_fallas',(err,rows) => 
{
    if(err) throw err
    console.log('los datos solicitados son: ')
    console.log(rows);
    console.log(rows.length);
    const ids = rows[0];
    console.log(`los id son ${ids.id}`);
})
conection.end();
