fetch("https://data.cesko.digital/obce/1/obce.json")
  .then(response => response.json())
  .then(data => {
    document.querySelector("#zobraz").innerHTML = "<thead><tr><th>Město</th><th>ID schránky</th></tr></thead><tbody>"
    for(let x=0; x<data.municipalities.length; x++){
      let nedata = data.municipalities[x].adresaUradu.kraj;
      if (nedata == "Jihočeský"){
        let mesto = data.municipalities[x].adresaUradu.obec;
        let schranka = data.municipalities[x].datovaSchrankaID;
        document.querySelector("#zobraz").innerHTML += "<tr><td>" + mesto + "</td><td>" + schranka + "</td></tr>";
      }
    }
  document.querySelector("#zobraz").innerHTML += "</tbody></table></div>"
  document.getElementById("prodleva").style.display = "none";  
  })
    