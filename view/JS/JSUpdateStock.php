<div class="stock">
    <button id="hide" type="button" onclick="UpS();"><b>Update</b></button>
    <br><br>
    <div class="st">
    <table>
        <tbody id="i4"></tbody>
    </table>
    <script>
        function UpS()
        {
            
            //document.getElementById("an").style.display="none";
            let MedicineCode=document.getElementById("medc").value;
            let MedicineStock=document.getElementById("meds").value;
            if (MedicineCode===""  || MedicineStock==="") {
                document.getElementById("message").innerHTML = "Please fill up the form properly!";
                return false;
            }
            else
            {
                document.getElementById("message").style.display="none";
            }

            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {

                if (this.readyState === 4 && this.status === 200) {
                        const json = JSON.parse(this.responseText);

                        let x = "";
                        x += "<tr>" +
                        "<td>" + "MedicineName" + "</td>" + 
                        "<td>" + "MedicineCode" + "</td>" + 
                        "<td>" + "MedicineStock" + "</td>" +
                        "<td>" + "MedicinePrice" + "</td>" + 
                        "<td>" + "ExpiryDate" + "</td>" +
                        "</tr>"
                        for (let i = 0; i < json.length; i++) {
                            x += "<tr>" + 
                        "<td>" + json[i].MedicineName + "</td>" + 
                        "<td>" + json[i].MedicineCode + "</td>" + 
                        "<td>" + json[i].MedicineStock + "</td>" +
                        "<td>" + json[i].MedicinePrice + "</td>" + 
                        "<td>" + json[i].ExpiryDate + "</td>" +
                        "</tr>"
                        }
                        document.getElementById("i4").innerHTML = x;
                        console.log(x);
                    }
                else
                {
                    document.getElementById("i4").innerHTML = "No such Product!!";
                }
                }
                xhttp.open("GET", "../model/StockDatabaseUpdate.php?MedicineCode="+MedicineCode+"&MedicineStock="+MedicineStock,true);
                xhttp.send();
        }
    </script>
    </div>
</div>