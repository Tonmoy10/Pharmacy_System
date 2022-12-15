<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=>, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Reg.css">
    <title>Registration Form</title>
    <style>
        #message {
            color: orangered;
        }
    </style>
    <script src="JS/JSValidation.js"></script>

</head>

<body class="a">

    <form name = "Registration" action="../controller/ProjValidationForm.php" method="POST" onsubmit="return isValidReg(this);">

    <u><h1><div id="head">Registration Form</div></h1></u>   

        <fieldset class="field">

         <legend><b>Basic Information:</b></legend>

         <p><b>First Name : </b><input id="att" type="text" name="FirstName" placeholder=""></p>
         <p><b>Last Name : </b><input id="att" type="text" name="LastName" placeholder=""></p>
         <b>Gender : </b><input id="rb" type="radio" name="Gender" value="Male">Male
                       <input id="rb" type="radio" name="Gender" value="Female">Female
                       <input id="rb" type="radio" name="Gender" value="Others">Others
         <p><b>Date of Birth : </b><input id="att" type="date" name="dateOfBirth" Placeholder="Date of Birth"></p>
         <b>Religion : </b>
         <select id="att" name="Religion">
             <option>Islam</option>
             <option>Hindu</option>
             <option>Christian</option>
             <option>Others</option>
         </select> 
         <br><br> 
         <b>Security Question : </b>
         <select id="att" name="Question">
             <option>Name of your pet?</option>
             <option>Your first nickname?</option>
             <option>Your favorite country?</option>
         </select>
         <p><b>Answer : </b><input id="att" type="text" name="Answer" placeholder=""></p>
         </fieldset>
         <br>
         <fieldset class="field">
             <legend><b>Contact Information : </b></legend>
             <p><b>Present Address:</b></p>
             <textarea id="att" name="CurrentAddress"></textarea>
             <p><b>Permanent Address : </b></p>
             <textarea id="att" name= "PermanentAddress"></textarea>
             <p><b>Phone : </b><input id="att" type="tel" name="Phone" Placeholder=""></p>
             <p><b>Email : </b><input id="att" type="email" name="Email" Placeholder=""></p>
         
        </fieldset>  

         <br>
         <fieldset class="field">
            <legend><b>Account Information:<b></legend>
             
            </textarea>
             <p><b>Username : </b><input id="att" type="text" name="Username" Placeholder=""></p>
             <p><b>Password : </b><input id="att" type="password" name="Password" Placeholder=""></p>
      
         


        </fieldset>
        <br>
        <center><button id="sub" type="Submit">Submit</button></center>
        <br>

    </form>   
    <center><p id="message"></p></center>
    <center>Already registered? <a href="ProjLoginForm.php"> Click here </a> to login.</center>
</body>
</html>