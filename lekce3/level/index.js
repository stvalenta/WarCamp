fetch("https://data.cesko.digital/obce/1/obce.json")
  .then(response => response.json())
  .then(data => {
    const pokus = [];
    for(let x=0; x<data.municipalities.length; x++){
      var nedata = data.municipalities[x].adresaUradu.kraj;
      pokus[x] = nedata; 
    }
    console.log(pokus[0]);
    const unique = pokus.filter((kraje, index) => pokus.indexOf(kraje) == index);
    console.log(unique);
    for (let i=0; i<unique.length -1; i++){
      document.getElementById('kraje').innerHTML += "<option value='" + unique[i] + "'>" + unique[i] + "</option>";
      const selectElement = document.querySelector('#kraje');
      selectElement.addEventListener('change', (event) => {
        const result = document.querySelector('.result');
        document.querySelector("#zobraz").innerHTML = "<thead><tr><th>Město</th><th>ID schránky</th></tr></thead><tbody>"
          for(let y=0; y<data.municipalities.length; y++){
            var adata = data.municipalities[y].adresaUradu.kraj;
            if (adata == event.target.value){
                let mesto = data.municipalities[y].adresaUradu.obec;
                let schranka = data.municipalities[y].datovaSchrankaID;
                document.querySelector("#zobraz").innerHTML += "<tr><td>" + mesto + "</td><td>" + schranka + "</td></tr>";
            }
          }
      });
    }
  document.querySelector("#zobraz").innerHTML += "</tbody></table></div>"
  })

    