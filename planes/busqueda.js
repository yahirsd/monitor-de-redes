function search() {
  var num_cols, display, input, filter, table_body, tr, td, i, txtValue;
  num_cols = 3;
  input = document.getElementById("input-search");
  filter = input.value.toUpperCase();
  table_body = document.getElementById("table-body");
  tr = table_body.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    display = "none";
    for (j = 0; j < num_cols; j++) {
      td = tr[i].getElementsByTagName("td")[j];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          display = "";
        }
      }
    }
    tr[i].style.display = display;
  }
}


// Obtener los elementos necesarios
var modal = document.getElementById("myModal");
var btn = document.getElementById("openModalBtn");
var span = document.getElementsByClassName("close")[0];

// Cuando se haga clic en el botón, mostrar el modal
btn.onclick = function () {
  modal.style.display = "block";
}

// Cuando se haga clic en (x), cerrar el modal
span.onclick = function () {
  modal.style.display = "none";
}

// Cuando se haga clic fuera del modal, cerrarlo
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
