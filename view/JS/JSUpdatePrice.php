        <button id="bt" type="button" onclick="UpP();">Update</button>
        <br><br><br>
    <div class="price">
        <table id="t1">
            <tbody id="i2"></tbody>
        </table>
        <script>
            function UpP()
            {
                let MedicineCode=document.getElementById("medc").value;
                let MedicinePrice=document.getElementById("medp").value;
                if (MedicineCode===""  || MedicinePrice==="") {
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
                            document.getElementById("i2").innerHTML = this.responseText;
                            document.getElementById("an").style.display="none";
                        }
                    }
                    xhttp.open("GET", "../model/DatabaseUpdate.php?MedicineCode="+MedicineCode+"&MedicinePrice="+MedicinePrice);
                    xhttp.send();
            }
        </script>
    </div>