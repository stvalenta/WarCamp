fetch("https://data.cesko.digital/obce/1/obce.json")
    .then(response => response.json())
    .then(data => {
      for(let x=0; x<data.municipalities.length; x++){
      let nedata = data.municipalities[x].adresaUradu.kraj;
      if (nedata == "Jihočeský"){
        let mesto = data.municipalities[x].adresaUradu.obec;
        let schranka = data.municipalities[x].datovaSchrankaID;

        document.querySelector("#zobraz").innerHTML += "<li>Město: " + mesto + "  Datová schránka: " + schranka + "</li>";

      }
    }
      
    })
    