if (nedata == "Jihočeský"){
    let mesto = data.municipalities[x].adresaUradu.obec;
    let schranka = data.municipalities[x].datovaSchrankaID;
    document.querySelector("#zobraz").innerHTML += "<tr><td>" + mesto + "</td><td>" + schranka + "</td></tr>";
  }