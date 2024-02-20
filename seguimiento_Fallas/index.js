//PARA LA BASE DE DATOS
const express = require("express");

const app = express();

//app.set("view engine", "ejs");

//app.get('../admonRedes/monitor-de-redes/seguimiento_Fallas/', function(req,res){
 // res.render("../admonRedes/monitor-de-redes/seguimiento_Fallas/Fallas_main");
//});

app.listen(3000,function(){
  console.log("Servidor creado http://localhost:3000");
});


