
  <br><br>
  <button id="hide" type="button" onclick="showResult();"><b>View</b></button>
  <br><br>
  <div class="search">
  <table>
        <tbody id="i6"></tbody>
  </table>
  <script>
      function showResult() {
        let q=document.getElementById("ss").value;
        var xhttp;

        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            const json = JSON.parse(this.responseText);

                        let x = "";
                        x += "<tr>" +
                        "<td>" + "OrderID" + "</td>" + 
                        "<td>" + "Username" + "</td>" + 
                        "<td>" + "MedicineCodes" + "</td>" +
                        "<td>" + "Quantities" + "</td>" + 
                        "<td>" + "GrandTotal" + "</td>" +
                        "</tr>"
                        for (let i = 0; i < json.length; i++) {
                            x += "<tr>" + 
                        "<td>" + json[i].OrderID + "</td>" + 
                        "<td>" + json[i].Username + "</td>" + 
                        "<td>" + json[i].MedicineCodes + "</td>" +
                        "<td>" + json[i].Quantities + "</td>" + 
                        "<td>" + json[i].GrandTotal + "</td>" +
                        "</tr>"
                        }
                        document.getElementById("i6").innerHTML = x;
                        console.log(x);
          }
          else
          {
              document.getElementById("i6").innerHTML = "No such Product!!";
          }
        };
        xhttp.open("GET", "../model/ViewHistory.php?q="+q, true);
        xhttp.send();
      }
  </script>
</div>