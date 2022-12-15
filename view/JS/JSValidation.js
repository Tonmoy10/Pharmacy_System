function isValidReg(Reg) 
{
	const FirstName = Reg.FirstName.value;
	const LastName = Reg.LastName.value;
	const Gender = Reg.Gender.value;
	const DateOfBirth = Reg.dateOfBirth.value;
	const Religion = Reg.Religion.value;
	const CurrentAddress = Reg.CurrentAddress.value;
	const PermanentAddress = Reg.PermanentAddress.value;
	const Phone = Reg.Phone.value;
	const Username = Reg.Username.value;
	const Password = Reg.Password.value;
	const Email = Reg.Email.value;
	const Question = Reg.Question.value;
	const Answer = Reg.Answer.value;

	/*console.log(fname + " " + lname);*/

	if (Username===""  || Password==="" || Email==="" || FirstName===""|| LastName===""|| Gender==="" || DateOfBirth===""|| Religion==="" || CurrentAddress===""|| PermanentAddress==="" || Phone===""|| Question==="" || Answer==="") {
		document.getElementById("message").innerHTML = "Please fill up the form properly!";
		return false;
	}

	return true;
}

function isValidLogin(Login) 
{
	const Username = Login.Username.value;
	const Password = Login.Password.value;

	/*console.log(fname + " " + lname);*/

	if (Username===""  || Password==="") {
		document.getElementById("message").innerHTML = "Please fill up the form properly!";
		return false;
	}

	return true;
}

function isValidFP(FP) 
{
	const Username = FP.Username.value;

	/*console.log(fname + " " + lname);*/

	if (Username==="") {
		document.getElementById("message").innerHTML = "Please fill up the form properly!";
		return false;
	}

	return true;
}

function isValidForgetPass(ForgetPass) 
{
	const Answer = ForgetPass.InputAnswer.value;
	const Password = ForgetPass.InputPassword.value;

	/*console.log(fname + " " + lname);*/

	if (Answer===""  || Password==="") {
		document.getElementById("message").innerHTML = "Please fill up the form properly!";
		return false;
	}

	return true;
}

function isValidChangePass(ChangePass)
{
	const Current = ChangePass.CurrentPass.value;
	const NewPass = ChangePass.NewPass.value;
	const Confirm = ChangePass.Confirm.value;

	if (Current===""  || NewPass===""  ||  Confirm==="") {
		document.getElementById("message").innerHTML = "Please fill up the form properly!";
		return false;
	}

	return true;
}

function isValidUpdateProf(Proff) 
{
	const FirstName = Proff.FirstName.value;
	const LastName = Proff.LastName.value;
	const DateOfBirth = Proff.DateOfBirth.value;
	const CurrentAddress = Proff.CurrentAddress.value;
	const PermanentAddress = Proff.PermanentAddress.value;
	const Phone = Proff.Phone.value;
	const Email = Proff.Email.value;

	/*console.log(fname + " " + lname);*/

	if (Email==="" || FirstName===""|| LastName===""|| DateOfBirth===""|| CurrentAddress===""|| PermanentAddress==="" || Phone==="") {
		document.getElementById("message").innerHTML = "Please fill up the form properly!";
		return false;
	}

	return true;
}

function isValidMed(Med)
{
	const MedName = Med.MedName.value;
	const MedCode = Med.MedCode.value;
	const MedStock = Med.MedStock.value;
	const MedPrice = Med.MedPrice.value;
	const Expiry = Med.Expiry.value;

	if (MedName===""  || MedCode===""  ||  MedStock===""  ||  MedPrice===""  ||  Expiry==="") {
		document.getElementById("message").innerHTML = "Please fill up the form properly!";
		return false;
	}

	return true;
}

function isValidUpdatePrice(Price)
{
	const MedC = Price.MedC.value;
	const MedP = Price.MedP.value;

	if (MedC===""  || MedP==="") {
		document.getElementById("message").innerHTML = "Please fill up the form properly!";
		return false;
	}

	return true;
}

function isValidUpdateStock(Stock)
{
	const MedC = Stock.MedC.value;
	const NewS = Stock.NewS.value;


	if (MedC===""  || NewS==="") {
		document.getElementById("message").innerHTML = "Please fill up the form properly!";
		return false;
	}

	return true;
}