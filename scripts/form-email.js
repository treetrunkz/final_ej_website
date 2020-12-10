// Catches when form submitted
document.getElementById("form-submit").addEventListener("click", validateEmailAlert);

// Checks for email/phone null if null -> shows warning message
function validateEmailAlert() {

  //Check email/phone for null
  let emailRequired = document.getElementById("invalid-email");
  let phoneRequired = document.getElementById("invalid-number");
  let email = document.getElementById("form-email").value;
  let phone = document.getElementById("form-phone").value;
  let alertContact = document.getElementById("alert-contact");
  let emailRegex = /^(?=.*@)(?=.*.)/;
  
  // Flips error for corresponding email/phone element
  if (!email.match(emailRegex)){
      console.log("test1");
      emailRequired.style.display = "inline-block";
      alertContact.style.display = "block";
  }
  
  if (email === "") {
    emailRequired.style.display = "inline-block"; 
    alertContact.style.display = "block";
  } 
  
  if (phone === "") {
    phoneRequired.style.display = "inline-block"; 
    alertContact.style.display = "block"; 
  } 

  if ((phone !== "" && email === "") || (email !== "" && phone === "") || (email !== ""  & phone !== "")) {
    phoneRequired.style.display = "none";
    emailRequired.style.display = "none";
    alertContact.style.display = "none";
  } 



  /* TODO - NUMBER VALIDATION
  var validNumber = /^\d{10}$/;
  if((inputtxt.value.match(validNumber)) {

  } else {

  } */

}