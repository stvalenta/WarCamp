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
   
    document.getElementById('zobraz').addEventListener('click', function (item) {

      // To get tr tag 
      // In the row where we click
      var row = item.path[1];

      var row_value = "";

      for (var j = 0; j < row.cells.length; j++) {

          row_value += row.cells[j].innerHTML;
          row_value += " | ";
      }

      alert(row_value);
      function download(filename, text) {
        var element = document.createElement('a');
        element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
        element.setAttribute('download', filename);
      
        element.style.display = 'none';
        document.body.appendChild(element);
      
        element.click();
      
        document.body.removeChild(element);
      }
      
      // Start file download.
      download("hello.txt", row_value);

      // Toggle the highlight
      if (row.classList.contains('highlight'))
          row.classList.remove('highlight');
      else
          row.classList.add('highlight');
  }); 
  