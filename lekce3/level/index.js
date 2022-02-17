fetch("https://data.cesko.digital/obce/1/obce.json")
  .then(response => response.json())
  .then(data => {
    const pokus = [];
    
    for(let x=0; x<data.municipalities.length; x++){
      var nedata = data.municipalities[x].adresaUradu.kraj;
      pokus[x] = nedata; 
    }
    const unique = pokus.filter((kraje, index) => pokus.indexOf(kraje) == index);
    for (let i=-1; i<unique.length -1; i++){
      document.getElementById('kraje').innerHTML += "<option value='" + unique[i] + "'>" + unique[i] + "</option>";
      const selectElement = document.querySelector('#kraje');
      
      selectElement.addEventListener('change', (event) => {
        output = "<thead><tr><th>Město</th><th>ID schránky</th></tr></thead><tbody>";
        document.getElementById('cekani').style.display = "block";
        
        for(let y=0; y<data.municipalities.length; y++){
          var adata = data.municipalities[y].adresaUradu.kraj;
          if (adata == event.target.value){
              let mesto = data.municipalities[y].adresaUradu.obec;
              let schranka = data.municipalities[y].datovaSchrankaID;
              output += "<tr><td>" + mesto + "</td><td>" + schranka + "</td></tr>";
        

        
          }
        }
        output += "</tbody></table>";
        document.querySelector("#zobraz").innerHTML = output;
        
        document.getElementById('cekani').style.display = "none";
      });
    }
    
  
  });