
fetch("https://data.cesko.digital/obce/1/obce.json")
  .then(response => response.json())
  .then(data => {$(document).ready(function(){
    $('#zobraz').after('<div id="nav"></div>');
    var rowsShown = 10;
    var rowsTotal = $('#zobraz tbody tr').length;
    var numPages = rowsTotal/rowsShown;
    for(i = 0;i < numPages;i++) {
        var pageNum = i + 1;
        $('#nav').append('<a href="#" rel="'+i+'">'+pageNum+'</a> ');
    }
    $('#zobraz tbody tr').hide();
    $('#zobraz tbody tr').slice(0, rowsShown).show();
    $('#nav a:first').addClass('active');
    $('#nav a').bind('click', function(){

        $('#nav a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        $('#zobraz tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
                css('display','table-row').animate({opacity:1}, 300);
    });
});
    let output = "<thead><tr><th>Město</th><th>ID schránky</th></tr></thead><tbody>";
    for(let x=0; x<data.municipalities.length; x++){
      let nedata = data.municipalities[x].adresaUradu.kraj;
      if (nedata == "Jihočeský"){
        let mesto = data.municipalities[x].adresaUradu.obec;
        let schranka = data.municipalities[x].datovaSchrankaID;
        output += "<tr><td>" + mesto + "</td><td>" + schranka + "</td></tr>";
      }
    }
  output += "</tbody></table></div>";
  document.querySelector("#zobraz").innerHTML += output;
  document.getElementById('cekani').style.display = "none";
  document.getElementById('zobraz')
  .addEventListener('click', function (item) {

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
})





    